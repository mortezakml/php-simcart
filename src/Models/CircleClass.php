<?php

namespace App\Models;

use App\Contracts\ShapeInterface;
use App\Exceptions\ExceptionParameterInvalid;
use App\Exceptions\ExceptionParameterNegative;


class CircleClass implements ShapeInterface
{

    private float $radius;
    const P = 3.14;

    public function __construct(float $radius)
    {

        if ($radius < 0) {
            throw new ExceptionParameterNegative("مقدار ورودی نمی تواند منفی باشد");
        }
        // The variable  should be positive
        $this->radius = $radius;
    }

    public function GetPerimeter()
    {
        return 2 * self::P * $this->radius;
    }

    public function GetArea()
    {
        return self::P * pow($this->radius, 2);
    }
}
