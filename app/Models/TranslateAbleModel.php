<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

abstract class TranslateAbleModel extends Model
{

    /**
     * @return array<string,bool>
     */
    public abstract function getTranslatedFields(): array;

    public function __get($key)
    {
        $field = Str::snake(Str::replaceStart("translated", "", $key));

        if (Arr::has($this->getTranslatedFields(), $field))
            return $this->getTranslatedValueFor($field);

        return parent::__get($key);
    }

    public function getTranslatedValueFor($field): mixed
    {
        $dicValue = json_decode($this->attributes[$field], true);
        return Arr::get($dicValue, app()->getLocale(), Arr::first($dicValue));
    }
}
