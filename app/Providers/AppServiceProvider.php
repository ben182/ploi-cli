<?php

namespace App\Providers;

use App\Api;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Spatie\Valuestore\Valuestore;

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
        $this->app->singleton('valuestore', function() {
            Storage::makeDirectory('storage');
            return Valuestore::make(storage_path('settings.json'));
        });
    }
}
