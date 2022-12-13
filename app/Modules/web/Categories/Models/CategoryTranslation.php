<?php

namespace App\Modules\web\Categories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'lang_id'];

    public $timestamps = false;
}
