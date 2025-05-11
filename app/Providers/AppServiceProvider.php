<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register a custom Blade directive to check if the user has a specific role or permission use in blade @roleOrPermission ['admin', 'edit-posts']

        // Blade::if('roleOrPermission', function ($role, $permission) {
        //     $user = auth()->user();
        //     return $user && ($user->hasRole($role) || $user->can($permission));
        // });
    }
}
