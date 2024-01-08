<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Test\TestFacade;

class TestFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('test-facade', function () {
            return new TestFacade();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
