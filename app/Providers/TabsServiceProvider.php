<?php

namespace App\Providers;

use App\Services\TabsService;
use Illuminate\Support\ServiceProvider;

class TabsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('tabsService', function () {
            return new TabsService();
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
