<?php

namespace App\Controllers;

use App\Exceptions\ExceptionParameterInvalid;
use App\Models\CircleClass;
use App\Models\RectangleClass;
use App\Models\SquareClass;
use App\Models\TriangleClass;

require_once realpath('./../../vendor/autoload.php');


$dir='\\\\192.168.0.6\\it\\developer\\csv';
// $dir='\\\\192.168.0.1\\it\\developer';
// $dir='\\\\192.168.0.1\\it\\developer\\csv';
// echo $dir;

$csv_file_array=[];

if (is_dir($dir)) {
    // echo 'is_dir';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $count++;
            // echo "filename: .".$file."<br />";
            array_push($csv_file_array,substr($file,0,-3));
            // $csv_file_array[]=substr($file,0,-4);
        }
        closedir($dh);
    }
    // var_dump($csv_file_array);
}


 
$script_path='\\\\192.168.0.6\\it\\developer\\script';
$script_file_array=[];
$count=0;
if (is_dir($script_path)) {
    // echo 'is_dir';
    if ($dh = opendir($script_path)) {
        // echo 'is_dir';
        while (($file = readdir($dh)) !== false) {
            if(!in_array(substr($file,0,-3),$csv_file_array)){
                // echo "filename-name: .".$file."<br />";
                CreateFile($file);
                $count++;
                // echo "filename-Script: .".substr($file,0,-3)."<br />";
                // array_push($script_file_array,$file);
            }
            // $script_file_array[]=$file;
        }
        closedir($dh);
    }
    // var_dump($script_file_array);
}

echo $count;



function CreateFile($filename){
    $path='\\\\192.168.0.6\\it\\developer\\script\\'.$filename;
    $dis_path='\\\\192.168.0.6\\it\\developer\\remaining\\'.$filename;
    $new_otp="XO4F9";
    // echo $filename;

    $myfile = fopen($path, "r") or die("Unable to open file!");
    $content= fread($myfile,filesize($path));
    fclose($myfile);

    $content=str_replace("('#masterOTP').val('589LB');","('#masterOTP').val('".$new_otp."');",$content);
    $content=str_replace("await sleep(2000);","await sleep(3000);",$content);
    $fp = fopen($dis_path,"wb");
    fwrite($fp,$content);
    fclose($fp);
}

