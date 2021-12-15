<?php

namespace App\Models;

use App\Contracts\ShapeInterface;
use App\Exceptions\ExceptionParameterInvalid;
use App\Exceptions\ExceptionParameterNegative;

class SquareClass implements ShapeInterface
{

    private float $height;

    public function __construct(float $height)
    {
        // try {
        //     $ddd=1/0;
        // } catch (\Throwable $th) {
        //     throw new ExceptionParameterInvalid();
        // }
        if ($height < 0) {
            throw new ExceptionParameterNegative();
        }

        // The variable  should be positive
        $this->height = $height;
    }

    public function GetPerimeter()
    {
        return 4 * $this->height;
    }

    public function GetArea()
    {
        return pow($this->height, 2);
    }
}
