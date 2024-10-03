<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        // Bagikan status user ke semua view
        // Bagikan status user ke semua view
        View::composer('*', function ($view) {
            if (Auth::check()) {
                // Dapatkan status user yang sedang login
                $status_user = getStatus(Auth::user()->status);
                $view->with('status_user', $status_user);
            }

            // Jika ada soal, kirim jenis soal
            if (isset($view->soal)) {
                $jenis_soal = getJenisSoal($view->soal->jenis);
                $view->with('jenis_soal', $jenis_soal);
            }
        });
        Schema::defaultStringLength(191);
    }
}
