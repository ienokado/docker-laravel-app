<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SpotifyService;
use App\Services\AppleMusicService;

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
        //
        $this->app->bind('SpotifyService', SpotifyService::class);
        $this->app->bind('AppleMusicService', AppleMusicService::class);
    }
}
