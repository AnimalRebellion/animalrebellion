<?php

namespace App\Providers;

use App\Models\Event;
use App\Observers\EventObserver;
use Illuminate\Support\ServiceProvider;
use OpenCage\Geocoder\Geocoder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        //** Register OpenCage Geocoder class */
        $this->app->bind('Geocoder', function () {
            return new Geocoder(config('services.opencage.api_key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Event::observe(EventObserver::class);
    }
}
