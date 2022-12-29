<?php

namespace App\Modules\web\Products\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Modules\web\Products\Models\Product;
use App\Modules\web\Products\Repositories\Contracts\IProductReadRepository;

class ProductReadRepository extends BaseRepository implements IProductReadRepository
{
    public function __construct(Product $model)
    {
        parent::__constructor($model);
    }

    public function featureProducts()
    {
        return $this->model::query()
            ->with(['translations' => function ($query) {
                $query->where('lang_code', '=', "en");
            }, 'photos' => function ($query) {
                $query->where('is_main', true);
            }])
            ->orderByDesc('created_at')
            ->limit(6)
            ->get()
            ->toArray();
    }

    public function homeRecommends(): array
    {
        return $this->model::query()
            ->has('recommendeds')
            ->with([
                'photos' => function ($q) {
                    $q->where('is_main', true);
                },
                'translations' => function ($q) {
                    $q->where('lang_code', '=', 'en');
                }
            ])
            ->get()
            ->toArray();
    }
}
