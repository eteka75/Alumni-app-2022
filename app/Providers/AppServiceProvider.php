<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Categorie;
use App\Models\Activite;
use App\Models\GalerieVideo;

class AppServiceProvider extends ServiceProvider
{
    static $site="PARAKOU";
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
        
    }
}
