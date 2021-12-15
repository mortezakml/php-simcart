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

class ExceptionTest extends TestCase{


    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassImplementsCheckCalculatePerimeterAndArea($height,$width){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }


    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculateArea($height,$width){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertIsNumeric( $rectangleClass->GetArea());
    }

    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculatePerimeter($height,$width){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertIsNumeric( $rectangleClass->GetPerimeter());
    }

    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculatePerimeterNotNegetive($height,$width){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertGreaterThanOrEqual(0,$rectangleClass->GetPerimeter());
    }
    /** 
    *  @dataProvider  dataProviderRectangle
    */
    public function  testRectangleClassCheckResultCalculateAreaNotNegetive($height,$width){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new RectangleClass($height,$width);
        $this->assertGreaterThanOrEqual(0,$rectangleClass->GetArea());
    }


    // کاملش رو برای موارد پایین ننوشتم 
    
    /**
     *  @dataProvider dataProviderSquareAndCircle
    */
    public function  testSquareClassImplementsCheckCalculatePerimeterAndArea($height){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new SquareClass($height);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }


    /**
     *  @dataProvider dataProviderSquareAndCircle
    */
    public function  testCircleClassImplementsCheckCalculatePerimeterAndArea($redius){

        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new CircleClass($redius);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }

    /**
    *  @dataProvider dataProviderTriangle
    */
    public function  testTriangleClassImplementsCheckCalculatePerimeterAndArea($height,$base,$s1,$s2){
        $this->expectException(ExceptionParameterNegative::class);
        $rectangleClass= new TriangleClass($height,$base,$s1,$s2);
        $this->assertInstanceOf(ShapeInterface::class,$rectangleClass);
    }

    /** @test */
    function test_exception()
    {
        $this->expectException(\Exception::class);

        throw new \Exception('blah');
    }

    public function dataProviderRectangle()
    {
        return [
            [2,-10],
        ];
    }
    public function dataProviderSquareAndCircle()
    {
        return [
            [-2],
        ];
    }

    public function dataProviderTriangle()
    {
        return [
            [2,-3,2,3],
            [2,3,-2,0],
        ];
    }


}

