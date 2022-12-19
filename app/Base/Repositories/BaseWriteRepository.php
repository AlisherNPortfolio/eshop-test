<?php

namespace App\Base\Repositories;

use App\Base\Repositories\Contracts\IBaseWriteRepository;
use Illuminate\Database\Eloquent\Model;

class BaseWriteRepository extends BaseRepository implements IBaseWriteRepository
{


    public function create(array $form): Model
    {
        return $this->model::query()->create($form);
    }

    public function update(array $form, $id): bool
    {
        $model = $this->findModel($id);

        return $model->update($form);
    }

    public function delete(int $id): bool
    {
        $model = $this->findModel($id);

        return $model->delete();
    }
}
