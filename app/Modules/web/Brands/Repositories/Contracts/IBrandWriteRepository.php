<?php

namespace App\Modules\web\Brands\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IBrandWriteRepository
{

    public function create(array $form): Model;

    public function update(array $form, $id): bool;

    public function delete(int $id): bool;
}
