<?php

namespace App\Providers;

use App\Api;
use App\Helper\Bash;
use App\Helper\Config;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Api::class);
        $this->app->singleton(Bash::class);
        $this->app->singleton(Config::class, function () {
            return new Config();
        });
    }
}
