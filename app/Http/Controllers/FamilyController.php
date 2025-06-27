<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FamilyController extends Controller
{
    public function index()
    {
        // Group members by village_name and count them
        $gams = Member::select('village_name', DB::raw('count(*) as total'))->whereNull('parent_id')
            ->groupBy('village_name')
            ->orderBy('village_name')
            ->get();

        $advertisements = Advertisement::where('is_active', true)->get();
        return view('pages.pariwarni-yadi', compact('gams', 'advertisements'));
    }

    // Show all members of one gam
    public function show($gam)
    {
        $members = Member::where('village_name', $gam)->whereNull('parent_id')
                         ->orderBy('full_name')
                         ->get();

        return view('pages.family_book', compact('members', 'gam'));
    }

    // Show all members of one gam
    public function familyMember($member)
    {
        $member = Member::with('parent')->findOrFail($member);
        $children = $member->children()->orderBy('sequence')->get();

        return view('pages.family_members', compact('member', 'children'));
    }

    /**
     * Search members by name or mobile.
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        $results = collect();
        if ($q) {
            $results = Member::where('full_name', 'like', "%{$q}%")
                             ->orWhere('mobile', 'like', "%{$q}%")
                             ->orderBy('full_name')
                             ->get();
        }

        return view('pages.family_search', [
            'results' => $results,
            'q'       => $q,
        ]);
    }

    
    // Show login form
    public function showLoginForm()
    {
        // If already logged in, redirect to profile
        if( Auth::guard('family')->check()) {
            return redirect()->route('family.profile');
        }
        return view('family.login');
    }

    // Send OTP to a main member
    public function sendOtp(Request $req)
    {
        $req->validate(['mobile'=>'required|digits:10']);
        $member = Member::where('mobile',$req->mobile)
                        ->whereNull('parent_id')
                        ->first();
        if(!$member) {
            return back()->withErrors(['mobile'=>'આ મોબાઇલ નંબર ધરાવતો કોઈ સભ્ય મળ્યો નથી.']);
        }

        // generate & cache OTP for 5m
        $otp = rand(100000,999999);
        $otp = '000000';
        
        $member->update([
            'otp_code'    => $otp,
            'otp_sent_at' => Carbon::now(),
        ]);
        
        // $response = Http::get("https://2factor.in/API/V1/".env('TWOFACTOR_KEY')."/SMS/{$member->mobile}/{$otp}/TALPADA");
        // Cache::put("otp:{$req->mobile}", $otp, now()->addMinutes(5));

        // TODO: integrate SMS provider here (e.g. Twilio)
        // SMS::send($req->mobile, "Your OTP is {$otp}");

        Session::flash('mobile', $req->mobile);
        return redirect()->route('login')
                         ->with('status','કૃપા કરીને '.$req->mobile . ' માં ઓટીપી તપાસો.');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mobile' => 'required|digits:10',
            'password' => 'required|string',
        ]);

        $member = Member::where('mobile', $credentials['mobile'])->first();

        if ($member && Hash::check($credentials['password'], $member->password)) {
            // Custom authentication logic (since Laravel's Auth might not use mobile)
            Auth::guard('family')->login($member);
            return redirect()->route('family.profile');
        }

        return back()->withErrors(['password' => 'મોબાઇલ અને પાસવર્ડ ખોટા છે.'])->withInput();
    }

    // Verify OTP
   
    public function verifyOtp(Request $req)
    {
        $req->validate([
            'mobile'=>'required|digits:10',
            'otp'    =>'required|digits:6',
        ]);

        $member = Member::where('mobile',$req->mobile)
                        ->whereNull('parent_id')
                        ->first();

        // check code and expiration (5 minutes)
        if ($member->otp_code === $req->otp
            && $member->otp_sent_at
               ->gt(now()->subMinutes(5)))
        {
            // Success: clear OTP and log in
            $member->update(['otp_code'=>null,'otp_sent_at'=>null]);
            Auth::guard('family')->login($member);
            return redirect()->route('family.profile');
        }

        return back()->withErrors(['otp'=>'Invalid or expired OTP']);
    }

    // Logout
    public function logout()
    {
        $member = Auth::logout();
        return redirect()->route('login');
    }

    // Show profile settings (after login)
    public function profile()
    {
        $member = Auth::guard('family')->user();
        $children = $member->children()->orderBy('sequence')->get();
        return view('family.profile', compact('member','children'));
    }

    
    // Show form to edit the main (parent) member
    public function editMain()
    {
        $parent = Auth::guard('family')->user();
        $gamOptions = Member::select('village_name')->whereNotNull('village_name')->distinct()->pluck('village_name')->toArray();
        return view('family.main_edit', compact('parent','gamOptions'));
    }

    // Handle submission of main member edits
    public function updateMain(Request $request)
    {
        $parent = Auth::guard('family')->user();

        $data = $request->validate([
            'photo' => 'nullable',
            'full_name'        => 'required|string|max:255',
            'mobile'           => [
                'nullable',
                'string',
                'digits:10',
                // Custom validation to allow sharing within family but unique outside
                function ($attribute, $value, $fail) use ($parent) {
                    $exists = Member::where('mobile', $value)
                        ->where('id', '!=', $parent->id) // Ignore parent's own record
                        ->where(function ($query) use ($parent) {
                            $query->whereNull('parent_id') // Other parents
                                  ->orWhere('parent_id', '!=', $parent->id); // Other families
                        })
                        ->exists();

                    if ($exists) {
                        $fail($attribute . ' નંબર તમારા પરિવારની બહારના કોઈ વ્યક્તિ દ્વારા પહેલેથી જ ઉપયોગમાં લેવાયો છે.');
                    }
                },
            ],
            'birth_date'       => 'nullable|date',
            'village_name'     => 'nullable|string|max:255',
            'current_address'  => 'nullable|string',
            'village_address'  => 'nullable|string',
            'business_name'    => 'nullable|string|max:255',
            'business_address' => 'nullable|string',
            'education'        => 'nullable|string|max:255',
            'blood_group'      => 'nullable|string|max:5',
            'gender'           => 'required|in:પુરુષ,સ્ત્રી,અન્ય',
            'marital_status'   => 'nullable|string|max:50',
            'mosal_name'       => 'nullable|string|max:255',
            'mosal_branch'     => 'nullable|string|max:255',
            'mosal_village'    => 'nullable|string|max:255',
            'gam_select'          => 'nullable|string',
            'gam_other'           => 'nullable|string',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Optionally delete old one:
            if ($parent->photo_url) {
                $oldPath = str_replace(asset('storage').'/', '', $parent->photo_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo_url'] = $path;
        }
        $data['village_name'] = $data['gam_select'] === 'other'
            ? $data['gam_other']
            : $data['gam_select'];

        $parent->update($data);

        return redirect()->route('family.profile')
                         ->with('status', 'મુખ્ય સભ્યની માહિતી સફળતાપૂર્વક સુધારાઈ.');
    }
    public function createChild()
    {
        // Just show the blank form
        return view('family.child_create');
    }

    public function storeChild(Request $request)
    {
        $parent = auth('family')->user();

        $data = $request->validate([
            'relation'         => 'required|string',
            'full_name'        => 'required|string',
            'mobile'           => 'nullable|string|digits:10',
            'birth_date'       => 'nullable|date',
            // 'village_name'     => 'nullable|string',
            // 'current_address'  => 'nullable|string',
            // 'village_address'  => 'nullable|string',
            'business_name'    => 'nullable|string',
            'business_address' => 'nullable|string',
            'education'        => 'nullable|string',
            'blood_group'      => 'nullable|string',
            'gender'           => 'required|string',
            'marital_status'   => 'nullable|string',
            'mosal_name'       => 'nullable|string',
            'mosal_branch'     => 'nullable|string',
            'mosal_village'    => 'nullable|string',
        ]);

        $maxSequnce = Member::where('parent_id',$parent->id)->max('sequence');
        $data['sequence'] = $maxSequnce !== null ? $maxSequnce + 1 : 0;
        // set parent_id
        $data['parent_id'] = $parent->id;
        if($data['mobile']) {
            number_to_image($data['mobile']);
        }
        \App\Models\Member::create($data);

        return redirect()->route('family.profile')
                        ->with('status','Child member added successfully');
    }

    // Show form to edit a child member
    public function editChild(Member $child)
    {
        $parentId = Auth::guard('family')->id();
        abort_unless($child->parent_id == $parentId, 403);
        return view('family.child_edit', compact('child'));
    }

    // Handle submission of child member edits
    public function updateChild(Request $request, Member $child)
    {
        $parentId = Auth::guard('family')->id();
        abort_unless($child->parent_id == $parentId, 403);

        $data = $request->validate([
            'relation'         => 'required|string|max:50',
            'full_name'        => 'required|string|max:255',
            'mobile'           => 'nullable|string|digits:10',
            'birth_date'       => 'nullable|date',
            // 'village_name'     => 'nullable|string|max:255',
            // 'current_address'  => 'nullable|string',
            // 'village_address'  => 'nullable|string',
            'business_name'    => 'nullable|string|max:255',
            'business_address' => 'nullable|string',
            'education'        => 'nullable|string|max:255',
            'blood_group'      => 'nullable|string|max:5',
            'gender'           => 'required|in:પુરુષ,સ્ત્રી,અન્ય',
            'marital_status'   => 'nullable|string|max:50',
            'mosal_name'       => 'nullable|string|max:255',
            'mosal_branch'     => 'nullable|string|max:255',
            'mosal_village'    => 'nullable|string|max:255',
        ]);

        $child->update($data);
        if($data['mobile']) {
            number_to_image($data['mobile']);
        }

        return redirect()->route('family.profile')
                         ->with('status', 'માન્ય સભ્યની માહિતી સફળતાપૂર્વક સુધારાઈ.');
    }


    // Save reordered sequence
    public function saveOrder(Request $req)
    {
        $orderJson = $req->input('order'); // e.g. [childId1, childId2,...]
        // Decode into a PHP array
        $sequence = json_decode($orderJson, true);

        foreach ($sequence as $i => $id) {
            Member::where('id',$id)->update(['sequence'=>$i]);
        }
        return back()->with('status','Order saved');
    }

    /**
     * Delete a child member (only if they belong to the authenticated family).
     */
    public function destroyChild(Member $child)
    {
        $parentId = Auth::guard('family')->id();

        // Ensure this child actually belongs to the logged-in parent
        abort_unless($child->parent_id == $parentId, 403);

        $child->delete();

        return redirect()
            ->route('family.profile')
            ->with('status', 'સભ્ય સફળતાપૂર્વક કાઢી પાડ્યો.');
    }

    
    public function report()
    {
        // Fetch distinct villages
        $villages = Member::select('village_name')
            ->distinct()
            ->pluck('village_name')
            ->filter()
            ->toArray();

        // Member count per village
        $reportData = [];
        $grandTotalSadasy = 0;

        // foreach ($villages as $village) {
        //     $members = Member::where('village_name', $village)->get();
        //     $maleCount = $members->where('gender', 'પુરુષ')->count();
        //     $femaleCount = $members->where('gender', 'સ્ત્રી')->count();
        //     $villageTotal = $maleCount + $femaleCount;

        //     $reportData[$village] = [
        //         'male' => $maleCount,
        //         'female' => $femaleCount,
        //         'total' => $villageTotal,
        //     ];

        //     $grandTotalSadasy += $villageTotal;
        // }


        
        $members = Member::with('parent')->get();

        // Group members by effective village name
        foreach ($members as $member) {
            // Determine village name
            $village = $member->parent_id && $member->parent ? $member->parent->village_name : $member->village_name;

            // Skip if village name is null or empty
            if (empty($village)) {
                continue;
            }

            // Initialize village data if not set
            if (!isset($reportData[$village])) {
                $reportData[$village] = [
                    'male' => 0,
                    'female' => 0,
                    'total' => 0,
                ];
            }

            // Increment counts based on gender
            if ($member->gender === 'પુરુષ') {
                $reportData[$village]['male']++;
            } elseif ($member->gender === 'સ્ત્રી') {
                $reportData[$village]['female']++;
            }

            $reportData[$village]['total']++;
            $grandTotalSadasy++;
        }

        // Blood group chart data
        $bloodGroups = Member::select('blood_group')
            ->distinct()
            ->pluck('blood_group')
            ->filter()
            ->toArray();

        $bloodGroupData = [];
        $totalKnownBloodGroups = Member::whereNotNull('blood_group')
            ->where('blood_group', '!=', 'જાણ નથી')
            ->count();

        foreach ($bloodGroups as $group) {
            $count = Member::where('blood_group', $group)->count();
            $percentage = $grandTotalSadasy > 0 ? round(($count / $grandTotalSadasy) * 100, 2) : 0;
            $bloodGroupData[$group] = [
                'count' => $count,
                'percentage' => $percentage,
            ];
        }

        // Gender ratio data
        $maleTotal = Member::where('gender', 'પુરુષ')->count();
        $femaleTotal = Member::where('gender', 'સ્ત્રી')->count();
        $genderRatio = [
            'male' => [
                'count' => $maleTotal,
                'percentage' => $grandTotalSadasy > 0 ? round(($maleTotal / $grandTotalSadasy) * 100, 2) : 0,
            ],
            'female' => [
                'count' => $femaleTotal,
                'percentage' => $grandTotalSadasy > 0 ? round(($femaleTotal / $grandTotalSadasy) * 100, 2) : 0,
            ],
            'ratio' => $maleTotal > 0 ? round(($femaleTotal / $maleTotal) * 100, 2) : 0,
        ];

        return view('pages/members_report', compact('reportData', 'grandTotalSadasy', 'bloodGroupData', 'genderRatio'));
    }
}
