<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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

        Blade::if('permission', function ($permission) {
            /** @var User|null $user */
            $user = Auth::user();

            return $user && $user->hasPermission($permission);
        });

        // Global data for all views
        View::composer('*', function ($view) {
            $generalSetting = GeneralSetting::first() ?? null;
            $contact = Contact::first() ?? null;

            $view->with([
                'generalSetting' => $generalSetting,
                'contact' => $contact,
            ]);
        });
    }
}
