<?php

namespace App\Modules\web\Products\database\seeders;

use App\Modules\web\Products\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDOException;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['N', 'S', 'O'];
        $products = collect([]);
        $name = null;

        for ($i = 0; $i < 100000; $i++) {
            shuffle($statuses);
            $name = fake()->word() . $i;

            $products->push([
                'sku' => "p" . $i,
                'in_stock_qty' => rand(5, 1000),
                'stock_status' => $statuses[0],
                'brand_id' => rand(1, 10),
                'category_id' => rand(2, 17),
                'price' => rand(10000, 1000000),
                'unique_name' => Str::slug($name)
            ]);
        }

        DB::beginTransaction();

        try {

            foreach ($products->chunk(100) as $product) {
                foreach ($product as $item) {
                    $model = Product::query()->create($item);
                    $model->translations()->insert([
                        [
                            'product_id' => $model->id,
                            'name' => $name . " uz",
                            'description' => fake()->text() . " uz",
                            'lang_code' => 'uz'
                        ],
                        [
                            'product_id' => $model->id,
                            'name' => $name . " en",
                            'description' => fake()->text() . " en",
                            'lang_code' => 'en'
                        ]
                    ]);

                    $model->photos()->insert([
                        [
                            'product_id' => $model->id,
                            'url' => "/resources/images/shop/product". rand(7, 12) .".jpg",
                            'is_main' => true
                        ],
                        [
                            'product_id' => $model->id,
                            'url' => "/resources/images/shop/product". rand(7, 12) .".jpg",
                            'is_main' => false
                        ],
                        [
                            'product_id' => $model->id,
                            'url' => "/resources/images/shop/product". rand(7, 12) .".jpg",
                            'is_main' => false
                        ]
                    ]);
                }
            }

            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
