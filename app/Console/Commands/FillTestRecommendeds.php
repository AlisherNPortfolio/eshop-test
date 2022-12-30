<?php

namespace App\Console\Commands;

use App\Models\Recommended;
use App\Modules\web\Categories\Models\Category;
use App\Modules\web\Products\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDOException;

class FillTestRecommendeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:recommended';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill recommendedable one to many table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();

        try {
            $products = Product::query()->whereIn('id', [1, 2, 3, 4, 5, 6])->get();

            foreach ($products as $product) {
                $recommended = new Recommended;
                $product->recommendeds()->save($recommended);
            }

            $categories = Category::query()->whereIn('id', [2, 3, 4, 5])->get();

            foreach ($categories as $category) {
                $recommended = new Recommended;
                $category->recommendeds()->save($recommended);
            }

            DB::commit();

            return Command::SUCCESS;
        } catch (PDOException $e) {
            DB::rollBack();

            Log::info($e->getMessage());
            return Command::INVALID;
        }
    }
}
