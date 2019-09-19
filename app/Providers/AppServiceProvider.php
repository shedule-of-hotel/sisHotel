<?php

namespace AguaymantoHotel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //importamos Schema para solucionar el error de creacion de tablas en mysql con migraciones

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);//lina de codigo para solucionar error de creacion de tabla en mysql con migraciones
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
