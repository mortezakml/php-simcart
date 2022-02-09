<?php

namespace App\Controllers;

use App\Exceptions\ExceptionParameterInvalid;
use App\Models\CircleClass;
use App\Models\RectangleClass;
use App\Models\SquareClass;
use App\Models\TriangleClass;

require_once realpath('./../../vendor/autoload.php');


$csv_file='D:\\\\kamali\\Temp\\remaining\\serial_no_28.csv';
$csv_file_array=[];
$slice=160;
$start_filename=9760; 
$new_otp="V1Y2M";


$row = 0;
if (($handle = fopen($csv_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 500000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        if($data[0]!='imei'){
            array_push($csv_file_array,$data[0]);
        }
        // if($row){}
    }
    echo $row;
    fclose($handle);
}

for($i=0;$i<=$row;$i+=$slice){
    // echo json_encode(array_slice($csv_file_array, $i, $slice));
    $imei_list=json_encode(array_slice($csv_file_array, $i, $slice));
    CreateFile($imei_list,$start_filename,$new_otp,$second=3);
    $start_filename++;
    // echo $imei_list;
    // die();
}



function CreateFile($imei,$file_name,$new_otp,$second=3){
    $path='D:\\\\kamali\\Temp\\remaining\\template.js';
    $dis_path='D:\\\\kamali\\Temp\\remaining\\new\\'.$file_name.'.txt';
    // echo $filename;

    $myfile = fopen($path, "r") or die("Unable to open file!");
    $content= fread($myfile,filesize($path));
    fclose($myfile);

    $content=str_replace("##otp##",$new_otp,$content);
    $content=str_replace("##file_name##",$file_name,$content);
    $content=str_replace("##imei##",$imei,$content);

    // $content=str_replace("await sleep(2000);","await sleep(3000);",$content);
    $fp = fopen($dis_path,"wb");
    fwrite($fp,$content);
    fclose($fp);
}
