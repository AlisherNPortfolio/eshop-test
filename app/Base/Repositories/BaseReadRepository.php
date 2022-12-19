<?php

namespace App\Base\Repositories;

use App\Base\Repositories\Contracts\IBaseReadRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseReadRepository implements IBaseReadRepository
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function list(): Collection
    {
        return $this->model::query()->get();
    }

    public function getById(int $id): Model
    {
        return $this->model::query()->find($id);
    }
}
