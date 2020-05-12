<?php

namespace App\Providers;

use App\Api;
use Spatie\Valuestore\Valuestore;
use Illuminate\Support\Facades\Storage;
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
        $this->app->singleton('valuestore', function () {
            Storage::makeDirectory('storage');

            return Valuestore::make(storage_path('settings.json'));
        });
    }
}
