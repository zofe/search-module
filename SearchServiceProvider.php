<?php

namespace App\Modules\Search;



use Illuminate\Support\ServiceProvider;



class SearchServiceProvider extends ServiceProvider
{

    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/scout.php' => config_path('scout.php'),
            ], 'config');

        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/scout.php', 'scout');

    }
}
