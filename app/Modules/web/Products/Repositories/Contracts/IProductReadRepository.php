<?php

namespace App\Modules\web\Products\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IProductReadRepository
{
    public function featureProducts();

    public function homeRecommends(): array;
}
