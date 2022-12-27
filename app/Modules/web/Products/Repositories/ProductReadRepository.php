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
    }
}
