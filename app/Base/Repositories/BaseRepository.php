<?php

namespace App\Base\Repositories;

use App\Base\Repositories\Contracts\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function __constructor(Model $model)
    {
        return $this->model = $model;
    }

    protected function findModel(int $id): ?Model
    {
        $model = $this->model::query()->find($id);

        abort_if(!$model, 404);

        return $model;
    }
}
