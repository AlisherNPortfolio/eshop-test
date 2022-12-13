<?php

namespace App\Providers;

use App\Modules\api\V1\Home\Providers\APIHomeServiceProvider;
use App\Modules\web\Brands\Providers\BrandsServiceProvider;
use App\Modules\web\Categories\Providers\CategoriesServiceProvider;
use App\Modules\web\Home\Providers\HomeServiceProvider;
use App\Modules\web\Products\Providers\ProductServiceProvider;
use App\Modules\web\Settings\Providers\SettingsServiceProvider;
use Illuminate\Support\ServiceProvider;

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
        $this->bootWebServiceProviders();
        // $this->bootApiServiceProviders(); // uncomment on API only
    }

    protected function bootWebServiceProviders()
    {
        $this->app->register(HomeServiceProvider::class);
        $this->app->register(CategoriesServiceProvider::class);
        $this->app->register(BrandsServiceProvider::class);
        $this->app->register(ProductServiceProvider::class);
        $this->app->register(SettingsServiceProvider::class);
    }

    protected function bootApiServiceProviders()
    {
        $this->app->register(APIHomeServiceProvider::class);
    }
}
