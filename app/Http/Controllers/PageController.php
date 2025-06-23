<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function help()
    {
        return view('pages.help');
    }

    public function villageHistory()
    {
        return view('pages.village-history');
    }

    public function massMarriageInformation()
    {
        return view('pages.mass-marriage-information');
    }

    public function importantNumbers()
    {
        return view('pages.important-numbers');
    }

    public function snehmilanInformation()
    {
        return view('pages.snehmilan-information');
    }
    public function findBusiness(Request $request)
    {
        $uniqueBusinesses = Member::select('business_name')
            ->whereNotNull('business_name')
            ->distinct()
            ->pluck('business_name')
            ->filter()
            ->values();

        $members = null;

        if ($request->filled('business_select')) {
            $business = $request->input('business_select');
            $members = Member::where('business_name', $business)->get();
        }
        return view('pages.find-business', compact('members', 'uniqueBusinesses'));
    }
    public function addProduct(Request $request)
    {
        $farmer = Auth::check() ? Auth::user()->farmer : null;
        $uniqueProducts = Farmer::select('products')
            ->get()
            ->pluck('products')
            ->flatten()
            ->unique()
            ->filter()
            ->values();

        if ($request->isMethod('post')) {
            $products = array_filter(
                array_map('trim', $request->input('product', [])),
                fn($p) => !empty($p)
            );
            $data = [
                'name' => $request->input('name'),
                'mobile' => $request->input('number'),
                'address' => $request->input('address'),
                'products' => array_unique($products), // Ensure unique products
            ];
            if (!Auth::check()) {
                return redirect()->route('login')->with('error_in', 'કૃપા કરીને લૉગિન કરો.');
            }

            if ($farmer) {
                // Update existing farmer
                $farmer->update($data);
                return redirect()->route('pages.farmer')->with('success_in', 'ખેડૂતની માહિતી અપડેટ થઈ.');
            } else {
                // Create new farmer
                $data['member_id'] = Auth::id();
                Farmer::create($data);
                return redirect()->route('pages.farmer')->with('success_in', 'ખેડૂતની માહિતી સેવ થઈ.');
            }
        }
        return view('pages.farmer', compact('farmer', 'uniqueProducts'));
    }
    public function productReport(Request $request)
    {
        $uniqueProducts = Farmer::select('products')
            ->get()
            ->pluck('products')
            ->flatten()
            ->unique()
            ->filter()
            ->values();

        $farmers = null;

        if ($request->filled('product_select')) {
            $product = $request->input('product_select');
            $farmers = Farmer::whereJsonContains('products', $product)->get();
            // $farmers = Farmer::whereRaw("JSON_CONTAINS(products, '\"$product\"')")->get();
        }
        return view('pages.product-report', compact('farmers', 'uniqueProducts'));
    }
    public function matrimonyReport(Request $request)
    {
        $parents = null;

        // Check if form is submitted (any filter is present)
        if ($request->filled(['search'])) {
            $parents = Member::whereNull('parent_id') // Parents only
                ->whereHas('children', function ($query) use ($request) {
                    $query->marriageEligible(); // Unmarried or divorced
                    if ($request->filled('age_from')) {
                        $query->where('birth_date', '<=', now()->subYears($request->age_from));
                    }
                    if ($request->filled('age_to')) {
                        $query->where('birth_date', '>=', now()->subYears($request->age_to + 1));
                    }
                    if ($request->filled('gender')) {
                        $query->where('gender', $request->gender);
                    }
                })
                ->with(['children' => function ($query) use ($request) {
                    $query->marriageEligible();
                    if ($request->filled('age_from')) {
                        $query->where('birth_date', '<=', now()->subYears($request->age_from));
                    }
                    if ($request->filled('age_to')) {
                        $query->where('birth_date', '>=', now()->subYears($request->age_to + 1));
                    }
                    if ($request->filled('gender')) {
                        $query->where('gender', $request->gender);
                    }
                }])
                ->get();
        }

        return view('pages.matrimony', compact('parents'));
    }
}
