<?php

namespace App\Modules\web\Categories\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Base\Repositories\Contracts\IBaseWriteRepository;
use App\Modules\web\Categories\Models\Category;
use Illuminate\Database\Eloquent\Model;

class BaseWriteRepository extends BaseRepository implements IBaseWriteRepository
{
    public function __construct(Category $model)
    {
        parent::__constructor($model);
    }

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
