<?php

namespace App\Traits\Models;

trait Translatable
{

    public $translatableModel = null;

    public $langIdName = 'code';

    public function translations()
    {
        return $this->hasMany(
            $this->getChildClass()
        )->where('lang_code', '=', 'en');
    }

    public function scopeLang($q, $langId)
    {
        return $q->with('translations')->where("{$this->langIdName}", $langId);
    }

    private function getChildClass()
    {
        $reflection = new \ReflectionClass($this);
        $classNameArr = explode('\\', $reflection->name);
        $className = array_pop($classNameArr);

        $classNamespace = implode("\\", $classNameArr);

        return $this->translatableModel ?? "{$classNamespace}\\{$className}Translation";
    }
}
