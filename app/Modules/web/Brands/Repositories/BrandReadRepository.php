<?php

namespace App\Modules\web\Brands\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Modules\web\Brands\Repositories\Contracts\IBrandReadRepository;
use App\Modules\web\Brands\Models\Brand;

class BrandReadRepository extends BaseRepository implements IBrandReadRepository
{
    public function __construct(Brand $model)
    {
        parent::__constructor($model);
    }

    public function homeBrands(): array
    {
        $brands = $this->model::query()->withCount(['products'])->get();
        return $brands->toArray();
    }
}
