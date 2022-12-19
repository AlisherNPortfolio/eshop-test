<?php

namespace App\Base\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IBaseReadRepository
{
    public function list(): Collection;

    public function getById(int $id): Model;
}
