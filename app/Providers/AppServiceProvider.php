<?php

namespace App\Providers;

use App\Services\ChapaService;
use App\Services\Interfaces\ChapaServiceInterface;
use App\Services\Interfaces\EleicaoServiceInterface;
use App\Services\EleicaoService;
use App\Services\Interfaces\VotoServiceInterface;
use App\Services\VotoService;
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
       $this->app->bind(
         ChapaServiceInterface::class,
         ChapaService::class
       );
       $this->app->bind(
         EleicaoServiceInterface::class,
         EleicaoService::class
       );
       $this->app->bind(
         VotoServiceInterface::class,
         VotoService::class
       );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
