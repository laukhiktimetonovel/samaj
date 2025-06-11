<?php

namespace App\Http\Controllers;

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
}
