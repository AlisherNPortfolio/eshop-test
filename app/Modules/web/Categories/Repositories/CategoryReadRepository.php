<?php

namespace App\Modules\web\Categories\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Base\Repositories\Contracts\IBaseReadRepository;
use App\Modules\web\Categories\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseReadRepository extends BaseRepository implements IBaseReadRepository
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
}
