<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class CheckBanner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip middleware for banner-related routes
        if ($request->is('banner') || $request->is('banner/close')) {
            return $next($request);
        }

        if ($request->query('show_banner') === 'true') {
            $request->session()->put('intended_url', $request->fullUrl());
            return redirect()->route('banner');
        }
        
        // Check if banner_seen cookie exists
        if (Cookie::get('banner_seen')) {
            return $next($request);
        }

        // Store the requested URL in session
        $request->session()->put('intended_url', $request->fullUrl());

        // Redirect to banner page
        return redirect()->route('banner');
    }
}
