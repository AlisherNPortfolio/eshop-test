<?php

namespace App\Base\Repositories;

use App\Base\Repositories\Contracts\IBaseReadRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseReadRepository extends BaseRepository implements IBaseReadRepository
{
    public function list(): Collection
    {
        return $this->model::query()->get();
    }

    public function getById(int $id): Model
    {
        return $this->findModel($id);
    }
}
