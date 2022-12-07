<?php
namespace App\Modules\V1\Home\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\V1\Home\Http\Controllers';

    protected $apiPrefix = '/api/v1/';

    protected $defer = 'false'; // 'defer' nima ish qilishini aniqlash

    public function boot()
    {
        $this->registerConfig();
        $this->routes();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }

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
            "home" // merging config key in global config
        );
    }

    protected function registerMigrations()
    {
        // shu module-ning migration-larini yuklab olish
        $this->loadMigrationsFrom(__DIR__ . "/../database/migrations");
    }

    public function routes()
    {
        Route::prefix($this->apiPrefix)
            ->namespace($this->namespace)
            ->middleware('api')
            ->group(__DIR__ . "/../routes/route.php");
    }
}
