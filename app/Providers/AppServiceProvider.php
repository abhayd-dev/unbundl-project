<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;

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

        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            if (Schema::hasTable('settings')) {
                $settings = Setting::pluck('value', 'key')->toArray();
                $view->with('settings', $settings);
            }
        });
    }
}
