<?php

namespace App\Providers;

use App\Modules\api\V1\Home\Providers\APIHomeServiceProvider;
use App\Modules\web\Home\Providers\HomeServiceProvider;
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
    }

    protected function bootApiServiceProviders()
    {
        $this->app->register(APIHomeServiceProvider::class);
    }
}
