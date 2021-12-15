<?php

namespace Tests\Unit;

use App\Contracts\ShapeInterface;
use App\Exceptions\ExceptionParameterInvalid;
use App\Exceptions\ExceptionParameterNegative;
use App\Models\CircleClass;
use App\Models\RectangleClass;
use App\Models\SquareClass;
use App\Models\TriangleClass;
use PHPUnit\Framework\TestCase;

class Test extends TestCase{


    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassImplementsCheckCalculatePerimeterAndArea($height,$width){
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }

   

    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculateArea($height,$width){
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertIsNumeric( $rectangleClass->GetArea());
    }

    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculatePerimeter($height,$width){
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertIsNumeric( $rectangleClass->GetPerimeter());
    }

    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculatePerimeterNotNegetive($height,$width){
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertGreaterThanOrEqual(0,$rectangleClass->GetPerimeter());
    }
    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculateAreaNotNegetive($height,$width){
        
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertGreaterThanOrEqual(0,$rectangleClass->GetArea());
    }


    // کاملش رو برای موارد پایین ننوشتم 
    
    /**
     *  @dataProvider dataProviderSquareAndCircle
    */
    public function  testSquareClassImplementsCheckCalculatePerimeterAndArea($height){
        $rectangleClass= new SquareClass($height);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }


    /**
     *  @dataProvider dataProviderSquareAndCircle
    */
    public function  testCircleClassImplementsCheckCalculatePerimeterAndArea($redius){
        $rectangleClass= new CircleClass($redius);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }

    /**
    *  @dataProvider dataProviderTriangle
    */
    public function  testTriangleClassImplementsCheckCalculatePerimeterAndArea($height,$base,$s1,$s2){
        $rectangleClass= new TriangleClass($height,$base,$s1,$s2);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }



    public function dataProviderRectangle()
    {
        return [
            [2,3],
            [0,3],
            // [2,-10],
            [2,3],
            [2,3],
        ];
    }
    public function dataProviderSquareAndCircle()
    {
        return [
            [2],
            [0],
            // [-2],
            [0],
            [30],
        ];
    }

    public function dataProviderTriangle()
    {
        return [
            [2,3,2,3],
            [2,3,2,3],
            [2,3,2,3],
            [2,3,2,3],
            [2,3,2,3],
            [2,3,2,3],
        ];
    }


}

