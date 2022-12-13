<?php

namespace App\Modules\web\Settings\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'locale', 'name'];

    public $timestamps = false;

    protected $keyType = 'string';

    public $incrementing = false;
}
