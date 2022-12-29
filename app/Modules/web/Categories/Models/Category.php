<?php

namespace App\Modules\web\Categories\Models;

use App\Models\Recommended;
use App\Modules\web\Products\Models\Product;
use App\Traits\Models\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['parent_id', 'unique_name', 'status'];

    public $timestamps = false;

    public function recommendeds()
    {
        return $this->morphMany(Recommended::class, 'recommendedable');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
