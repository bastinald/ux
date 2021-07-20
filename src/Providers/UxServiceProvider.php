<?php

namespace Bastinald\Ux\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Bastinald\Ux\Commands\LogClearCommand::class,
                \Bastinald\Ux\Commands\MakeAModelCommand::class,
                \Bastinald\Ux\Commands\MakeAuthCommand::class,
                \Bastinald\Ux\Commands\MakeCrudCommand::class,
                \Bastinald\Ux\Commands\MigrateAutoCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'ux');

        $this->publishes([__DIR__ . '/../../config/ux.php' => config_path('ux.php')], ['ux', 'ux:config']);
        $this->publishes([__DIR__ . '/../../resources/stubs' => resource_path('stubs/vendor/ux')], ['ux', 'ux:stubs']);
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/ux')], ['ux', 'ux:views']);

        Livewire::component('loader', \Bastinald\Ux\Components\Loader::class);
        Livewire::component('modal', \Bastinald\Ux\Components\Modal::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/ux.php', 'ux');
    }
}
