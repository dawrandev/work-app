<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        if (request()->route()) {
            $locale = request()->route()->parameter('locale');
            if ($locale) {
                app()->setLocale($locale);
                URL::defaults(['locale' => $locale]);
            }
        }

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
