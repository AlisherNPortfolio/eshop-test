<?php

namespace App\Modules\web\Brands\Models;

use App\Modules\web\Products\Models\Product;
use App\Traits\Models\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['unique_name'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
