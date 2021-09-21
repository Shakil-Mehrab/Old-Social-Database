<?php

namespace App\Providers;

use App\Platform\Platform;
use Illuminate\Support\ServiceProvider;

class PlatformServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePlatforms();
    }

    private function configurePlatforms()
    {
        Platform::platform('youtube', 'Youtube');
        Platform::platform('facebook', 'Facebook');
        Platform::platform('website', 'Website');
    }
}