<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            // dd("called");

        // Define a basic auth guard for admin
        // Auth::viaRequest('admin-basic', function ($request) {
        //     $username = $request->getUser();
        //     $password = $request->getPassword();

        //     if ($username === env('ADMIN_USERNAME', 'admin') && $password === env('ADMIN_PASSWORD', 'secret')) {
        //         // Return a simple user array or model instance
        //         return ['id' => 1, 'name' => 'Admin'];
        //     }
        //     return null; // Authentication failed
        // });
    }
}
