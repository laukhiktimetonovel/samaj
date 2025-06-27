<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BasicAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Grab the HTTP Basic credentials from the request
        $user = $request->getUser();
        $pass = $request->getPassword();

        // Pull in your expected creds
        $expectedUser = env('ADMIN_USERNAME');
        $expectedPass = env('ADMIN_PASSWORD');

        // If they don’t match, ask for auth
        if (!hash_equals($expectedUser, $user) || !hash_equals($expectedPass, $pass)) {
            return response('Authentication Required', 401, [
                'WWW-Authenticate' => 'Basic realm="Admin Area"'
            ]);
        }
        
        // Auth::viaRequest('admin', function ($request) {
        //     $username = $request->getUser();
        //     $password = $request->getPassword();
        //     dd("called");

        //     if ($username === env('ADMIN_USERNAME', 'admin') && $password === env('ADMIN_PASSWORD', 'secret')) {
        //         // Return a simple user array or model instance
        //         return ['id' => 1, 'name' => 'Admin'];
        //     }
        //     return null; // Authentication failed
        // });
        return $next($request);
    }
}
