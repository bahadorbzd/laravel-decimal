<?php

namespace Bzd\laravelDecimal;

use Decimal\Decimal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DecimalObjectCast implements CastsAttributes
{
    private int $places;

    private int $precision;

    /**
     * @param int $places
     * @param int $precision
     */
    public function __construct(int $places = 0, int $precision = Decimal::DEFAULT_PRECISION)
    {
        $this->places = $places;
        $this->precision = $precision;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value->toFixed($this->places);
    }

    public function get($model, string $key, $value, array $attributes)
    {
        return new Decimal($value, $this->precision);
    }
}