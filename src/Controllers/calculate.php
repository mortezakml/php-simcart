<?php

namespace App\Controllers;

use App\Exceptions\ExceptionParameterInvalid;
use App\Models\CircleClass;
use App\Models\RectangleClass;
use App\Models\SquareClass;
use App\Models\TriangleClass;

require_once realpath('./../../vendor/autoload.php');

$result = 'NAN';

if (isset($_POST['shape'])  and isset($_POST['type'])) {
    try {
        switch ($_POST['shape']) {
            case "square":
                if (isset($_POST['h'])) {

                    $square = new SquareClass($_POST['h']);
                    $result = $_POST['type'] == 'perimeter' ? $square->GetPerimeter() : $square->GetArea();
                }

                break;
            case "rectangle":
                if (isset($_POST['h'])  and isset($_POST['w'])) {

                    $rectangle = new RectangleClass($_POST['h'], $_POST['w']);
                    $result = $_POST['type'] == 'perimeter' ? $rectangle->GetPerimeter() : $rectangle->GetArea();
                }
                break;


            case "circle":
                if (isset($_POST['r'])) {

                    $circle = new CircleClass($_POST['r']);
                    $result = $_POST['type'] == 'perimeter' ? $circle->GetPerimeter() : $circle->GetArea();
                }
                break;


            case "triangle":
                if (isset($_POST['h'])  and isset($_POST['b'])  and isset($_POST['s1']) and isset($_POST['s2'])) {

                    $triangle = new TriangleClass($_POST['h'], $_POST['b'], $_POST['s1'], $_POST['s2']);
                    $result = $_POST['type'] == 'perimeter' ? $triangle->GetPerimeter() : $result = $triangle->GetArea();
                }
                break;
        }
    } catch (\Throwable $th) {
        $result = $th->getMessage();
    }
}

echo $result;
