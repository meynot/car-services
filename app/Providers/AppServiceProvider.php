<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
        // Set locale from session
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        // Share theme and locale with all views
        View::composer('*', function ($view) {
            $currentLocale = Session::has('locale') ? Session::get('locale') : App::getLocale();
            $view->with([
                'currentTheme' => Session::get('theme', 'light'),
                'currentLocale' => $currentLocale,
                'isRTL' => in_array($currentLocale, ['ar']),
            ]);
        });
    }
}