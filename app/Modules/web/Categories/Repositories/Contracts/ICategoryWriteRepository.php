<?php

namespace App\Modules\web\Categories\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ICategoryWriteRepository {

    public function create(array $form): Model;

    public function update(array $form, $id): bool;

    public function delete(int $id): bool;
}
