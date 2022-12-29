<?php

namespace App\Modules\web\Categories\Repositories;

use App\Base\Helper;
use App\Base\Repositories\BaseRepository;
use App\Modules\web\Categories\Models\Category;
use App\Modules\web\Categories\Repositories\Contracts\ICategoryReadRepository;
use App\Modules\web\Products\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryReadRepository extends BaseRepository implements ICategoryReadRepository
{
    public function __construct(Category $model)
    {
        parent::__constructor($model);
    }

    public function list(): Collection
    {
        return $this->model::query()->get();
    }

    public function getById(int $id): Model
    {
        return $this->findModel($id);
    }

    public function getAsMenu(): array
    {
        $parent_id = 1;
        $lang_code = "en";

        $sql = <<<SQL
        WITH RECURSIVE category_menu AS (
                    select id,
                    unique_name,
                    parent_id,
                    status
                    FROM categories
                    where parent_id = ?

                    UNION ALL

                    select child.id,
                    child.unique_name,
                    child.parent_id,
                    child.status
                    FROM categories AS child
                    JOIN category_menu AS parent ON parent.id = child.parent_id
                )
                select
                category_menu.id as id,
                category_menu.unique_name as cat_name,
                category_menu.parent_id as parent_id,
                category_menu.status as status,
                ct.name as menu_name
                from category_menu
                join category_translations ct on category_menu.id = ct.category_id
                where ct.lang_code = ? AND category_menu.status = 1
                order by parent_id asc;
SQL;

        $categories = DB::select(DB::raw($sql), [$parent_id, $lang_code]);

        $menu = Helper::buildMenu($categories, 1);

        return $menu;
    }

    public function homeRecommends(): array
    {
        // $second1 = Carbon::now();
        $p = $this->model::query()
            ->has('recommendeds')
            ->get()
            ->toArray();

        $categoryProducts = [];

        foreach ($p as $item) {
            $product = Product::query()->select(DB::raw("
                products.id as id,
                products.unique_name,
                products.price,
                product_images.url as img,
                product_translations.name
            "))
                ->join("product_images", "products.id", "=", "product_images.product_id")
                ->join("product_translations", "products.id", '=', "product_translations.product_id")
                ->where("product_images.is_main", true)
                ->where("product_translations.lang_code", '=', 'en')
                ->where("products.category_id", '=', $item['id'])
                ->limit(4)
                ->get();


            array_push($categoryProducts, [...$item, 'products' => $product->toArray()]);
        }

        // $second2 = Carbon::now();
        // dd($categoryProducts, $second2->diffInMilliseconds($second1));
        return $categoryProducts;
    }
}
