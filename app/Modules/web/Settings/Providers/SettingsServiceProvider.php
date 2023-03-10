<?php

namespace App\Modules\web\Settings\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    protected $name = 'settings';

    protected $namespace = 'App\Modules\web\Settings\Http\Controllers';

    protected $defer = 'false'; // 'defer' nima ish qilishini aniqlash

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
        $this->registerConfig();
        $this->routes();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }

        $this->registerViews();

        $this->loadingRepositories();
    }

    public function loadingRepositories()
    {
        // repository-larni ularning interfeysi bilan bind qilish
        // $this->app->bind(Interface::class, ConcreteClass::class);
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/../config/config.php", // config path
            "{$this->name}" // merging config key in global config
        );
    }

    protected function registerMigrations()
    {
        // shu module-ning migration-larini yuklab olish
        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . "/../views", "{$this->name}");
    }

    public function routes()
    {
        Route::namespace($this->namespace)
            ->middleware('web')
            ->group(__DIR__ . "/../routes/route.php");
    }
}
