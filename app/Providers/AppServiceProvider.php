<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // Blade directive for permissions
        Blade::if('permission', function ($permission) {
            /** @var \App\Models\User|null $user */
            $user = Auth::user();
            return $user && $user->hasPermission($permission);
        });

        // Share general settings with all views
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $generalSettings = \App\Models\GeneralSetting::first();

            // Fallback to a "dummy" GeneralSetting if none exists
            if (!$generalSettings) {
                $generalSettings = new \App\Models\GeneralSetting([
                    'header_logo' => 'default-logo.png', // replace with your default path
                    'site_name' => 'My Site',
                ]);
            }

            $view->with('generalSettings', $generalSettings);
        });
    }
}