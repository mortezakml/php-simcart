<?php

namespace App\Models;

use App\Contracts\ShapeInterface;
use App\Exceptions\ExceptionParameterNegative;


class RectangleClass implements ShapeInterface
{

    private float $height;
    private float $width;

    public function __construct(float $height, float $width)
    {
        if ($height < 0 || $width < 0) {
            throw new ExceptionParameterNegative("مقدار ورودی نمی تواند منفی باشد");
        }
        // The variable  should be positive
        $this->height = $height;
        $this->width = $width;
    }

    public function GetPerimeter()
    {
        return 2 * ($this->height + $this->width);
    }

    public function GetArea()
    {
        return ($this->height * $this->width);
    }
}
