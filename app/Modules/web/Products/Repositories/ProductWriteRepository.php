<?php

namespace App\Modules\web\Products\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Modules\web\Products\Models\Product;
use App\Modules\web\Products\Repositories\Contracts\IProductWriteRepository;
use Illuminate\Database\Eloquent\Model;

class ProductWriteRepository extends BaseRepository implements IProductWriteRepository
{
    public function __construct(Product $model)
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
