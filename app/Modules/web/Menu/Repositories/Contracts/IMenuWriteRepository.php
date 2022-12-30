<?php

namespace App\Modules\web\Menu\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IMenuWriteRepository
{

    public function create(array $form): Model;

    public function update(array $form, $id): bool;

    public function delete(int $id): bool;
}
