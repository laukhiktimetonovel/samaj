<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('parent')->orderBy('sequence')->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $parents = Member::whereNull('parent_id')->orderBy('sequence')->get();
        $gamOptions = Member::select('village_name')->whereNotNull('village_name')->distinct()->pluck('village_name')->toArray();
        return view('members.create', compact('parents','gamOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // 'parent_id' => 'nullable|exists:members,id',
            // 'sequence'  => 'required|integer|min:0',
            // 'relation'  => 'required|string',
            'photo' => 'required',
            'full_name' => 'required|string',
            // 'village_name' => 'required|string',
            'mobile'    => 'required|digits:10|unique:members,mobile',
            'birth_date'=> 'nullable|date',
            'business_name'    => 'nullable|string',
            'business_address' => 'nullable|string',
            'education'        => 'nullable|string',
            'blood_group'      => 'nullable|string',
            'gender'           => 'required|in:પુરુષ,સ્ત્રી,અન્ય',
            'marital_status'   => 'nullable|in:પરિણીત,અપરિણીત,ગંગા સ્વરૂપ,વિધુર,છૂટાછેડા,સગાઈ કરેલ છે.',
            'mosal_name' => 'nullable|string',
            'mosal_branch'      => 'nullable|string',
            'mosal_village'      => 'nullable|string',
            'gam_select'          => 'nullable|string',
            'gam_other'           => 'nullable|string',
            'village_address'     => 'nullable|string',
            'current_address'     => 'nullable|string',
        ]);

        // choose village_name from dropdown or custom
        $data['village_name'] = $data['gam_select'] === 'other'
            ? $data['gam_other']
            : $data['gam_select'];

        // $data['village_name'] = "કિયાદરા";

        unset($data['gam_select'], $data['gam_other']);
        // handle photo upload
        if ($request->hasFile('photo')) {
            // stores in storage/app/public/photos
            $path = $request->file('photo')->store('photos','public');
            $data['photo_url'] = $path;
        }

        Member::create($data);

        return redirect()->route('members.index')
                         ->with('success','Member created successfully');
    }

    // (Optionally edit/update/destroy methods)
}
