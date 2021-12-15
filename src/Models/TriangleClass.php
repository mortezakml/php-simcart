<?php

namespace App\Models;

use App\Contracts\ShapeInterface;
use App\Exceptions\ExceptionParameterNegative;

class TriangleClass implements ShapeInterface
{

    private float $height;
    private float $base;
    private float $s1;
    private float $s2;

    public function __construct(float $height, float $base, float $s1, float $s2)
    {

        if ($height < 0 || $base < 0 || $s1 < 0 || $s2 < 0) {
            throw new ExceptionParameterNegative("مقدار ورودی نمی تواند منفی باشد");
        }
        // The variable  should be positive
        $this->height = $height;
        $this->base = $base;
        // طول ضلع اول
        $this->s1 = $s1;
        // طول ضلع دوم
        $this->s2 = $s2;
    }

    public function GetPerimeter()
    {
        return $this->s1 + $this->s2 + $this->base;
    }

    public function GetArea()
    {
        return ($this->base * $this->height) / 2;
    }
}
