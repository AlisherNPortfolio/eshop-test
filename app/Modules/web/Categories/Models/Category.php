<?php

namespace App\Modules\web\Categories\Models;

use App\Traits\Models\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['lft', 'rgt', 'parent_id', 'unique_name'];

    public $timestamps = false;
}
