<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ChildTranslatable {

    public function parent(): BelongsTo
    {
        return $this->belongsTo(
            $this->getParentClass()
        );
    }

    private function getParentClass()
    {
        $reflection = new \ReflectionClass($this);
        $classNameArr = explode('\\', $reflection->name);
        $className = array_pop($classNameArr);
        $className = str_replace('Translation', '', $className);
        return implode("\\", $classNameArr) . "{$className}";
    }
}
