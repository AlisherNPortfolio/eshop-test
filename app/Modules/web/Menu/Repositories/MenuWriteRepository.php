<?php

namespace App\Modules\web\Menu\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Modules\web\Menu\Models\Menu;
use App\Modules\web\Menu\Repositories\Contracts\IMenuWriteRepository;
use Illuminate\Database\Eloquent\Model;

class MenuWriteRepository extends BaseRepository implements IMenuWriteRepository
{
    public function __construct(Menu $model)
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
