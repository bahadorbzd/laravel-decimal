<?php

namespace Bzd\laravelDecimal;

use Decimal\Decimal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DecimalObjectCast implements CastsAttributes
{
    public function set($model, string $key, $value, array $attributes)
    {
        return $value->toFixed();
    }

    public function get($model, string $key, $value, array $attributes)
    {
        return new Decimal($value);
    }
}