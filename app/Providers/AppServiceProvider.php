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
        // Blade::if('roleOrPermission', function ($role, $permission) {
        //     $user = auth()->user();
        //     return $user && ($user->hasRole($role) || $user->can($permission));
        // });
    }
}
