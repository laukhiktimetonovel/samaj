<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        return view('partials.banner');
    }

    public function close(Request $request)
    {
        // Set banner_seen cookie for 30 days
        Cookie::queue('banner_seen', '1', 30 * 24 * 60); // 30 days in minutes

        // Get intended URL from session or default to home
        $intendedUrl = $request->session()->pull('intended_url', route('home'));

        return redirect($intendedUrl);
    }
}
