<?php

namespace App\Modules\web\Products\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IProductWriteRepository
{

    public function create(array $form): Model;

    public function update(array $form, $id): bool;

    public function delete(int $id): bool;
}
