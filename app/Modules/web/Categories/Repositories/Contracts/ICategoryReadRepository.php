<?php

namespace App\Modules\web\Categories\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ICategoryReadRepository
{

    public function list(): Collection;

    public function getById(int $id): Model;

    public function getAsMenu(): array;

    public function homeRecommends(): array;
}
