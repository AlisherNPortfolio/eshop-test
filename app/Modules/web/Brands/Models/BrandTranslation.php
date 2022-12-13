<?php

namespace App\Modules\web\Brands\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'name', 'lang_id'];

    public $timestamps = false;
}
