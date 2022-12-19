<?php

namespace App\Modules\web\Categories\Providers;

use App\Modules\web\Categories\Repositories\CategoryReadRepository;
use App\Modules\web\Categories\Repositories\CategoryWriteRepository;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryWriteRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    protected $name = 'categories';

    protected $namespace = 'App\Modules\web\Categories\Http\Controllers';

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
        $this->app->bind(ICategoryReadRepository::class, CategoryReadRepository::class);
        $this->app->bind(ICategoryWriteRepository::class, CategoryWriteRepository::class);
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
