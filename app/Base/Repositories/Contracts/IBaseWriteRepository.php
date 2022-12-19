<?php

namespace App\Base\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IBaseWriteRepository
{
    public function create(array $form): Model;

    public function update(array $form, $id): bool;

    public function delete(int $id): bool;
}
