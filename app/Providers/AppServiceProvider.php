<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Slider; // ganti model sesuai kebutuhan



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
        View::composer('*', function ($view) {
            $view->with(
                'globalSliders',
                Slider::where('status', 0)
                    ->where('kategori', 'banner') // ← ganti sesuai kategori kamu
                    ->latest()
                    ->get()
            );
        });
    }
}
