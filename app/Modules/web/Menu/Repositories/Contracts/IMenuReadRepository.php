<?php

namespace App\Modules\web\Menu\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IMenuReadRepository
{

    public function list(): Collection;

    public function getById(int $id): Model;

    public function getAsMenu(): array;
}
