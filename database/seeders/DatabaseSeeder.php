<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Modules\web\Brands\database\seeders\BrandSeeder;
use App\Modules\web\Categories\database\seeders\CategorySeeder;
use App\Modules\web\Products\database\seeders\ProductSeeder;
use App\Modules\web\Settings\database\seeders\LanguageSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
