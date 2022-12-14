<?php

namespace App\Modules\web\Categories\Models;

use App\Traits\Models\ChildTranslatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryTranslation extends Model
{
    use HasFactory, ChildTranslatable;

    protected $fillable = ['category_id', 'name', 'lang_id'];

    public $timestamps = false;
}
