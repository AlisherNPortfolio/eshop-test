<?php

namespace App\Modules\web\Brands\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface IBrandReadRepository
{
    public function homeBrands(): array;
}
