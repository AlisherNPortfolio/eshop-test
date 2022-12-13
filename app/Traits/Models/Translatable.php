<?php

namespace App\Traits\Models;

trait Translatable {

    public $translatableModel = null;

    public $langIdName = 'code';

    public function translations()
    {
        $reflection = new \ReflectionClass($this);
        $modelName = $this->translatableModel ?? "{$reflection->name}Translation";

        return $this->hasMany($modelName::class);
    }

    public function scopeLang($q, $langId)
    {
        return $q->with('translations')->where("{$this->langIdName}", $langId);
    }
}
