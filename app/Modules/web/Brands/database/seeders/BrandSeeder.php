<?php

namespace App\Modules\web\Brands\database\seeders;

use App\Modules\web\Brands\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $name = fake()->unique()->word();
            Brand::query()->create([
                'name' => $name,
                'unique_name' => Str::slug($name),
                'logo' => '/images/brand_logo.png',
            ]);
        }
    }
}
