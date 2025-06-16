<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

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
    public function findBusiness()
    {
        return view('pages.find-business');
    }
     public function addProduct()
    {
        return view('pages.add-product');
    }
    public function productReport()
    {
        return view('pages.product-report');
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
