<?php

namespace App\Modules\web\Brands\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Modules\web\Brands\Repositories\Contracts\IBrandWriteRepository;
use App\Modules\web\Brands\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class BrandWriteRepository extends BaseRepository implements IBrandWriteRepository
{
    public function __construct(Brand $model)
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
