<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommended extends Model
{
    use HasFactory;

    protected $fillable = ['recommendedable_id', 'recommendedable_type'];

    // public $timestamps = false;

    public function recommendedable()
    {
        return $this->morphTo();
    }
}
