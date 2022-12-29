<?php

namespace App\Modules\web\Products\Models;

use App\Models\Recommended;
use App\Traits\Models\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Translatable;

    public const STOCK_STATUS_NEW = "N";
    public const STOCK_STATUS_SALE = "S";
    public const STOCK_STATUS_ORDINARY = "O";

    protected $fillable = [
        "sku", "in_stock_qty", "stock_status", "brand_id",
        "category_id", "price", "unique_name", "status"
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function photos()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function recommendeds()
    {
        return $this->morphMany(Recommended::class, 'recommendedable');
    }
}
