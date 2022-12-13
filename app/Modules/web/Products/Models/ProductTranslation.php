<?php

namespace App\Modules\web\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'name', 'description', 'lang_id'];

    public $timestamps = false;
}
