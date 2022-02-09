<?php

namespace App\Controllers;

use App\Exceptions\ExceptionParameterInvalid;
use App\Models\CircleClass;
use App\Models\RectangleClass;
use App\Models\SquareClass;
use App\Models\TriangleClass;

require_once realpath('./../../vendor/autoload.php');


$csv_file_array=[];
$slice=22;
$start_filename=9900; 
$new_otp="V1Y2M";

// connect to database

ini_set('max_execution_time', 0); 

$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = gspn";
$credentials = "user = postgres password=123456";

$conn = pg_connect( "$host $port $dbname $credentials"  );
if(!$conn) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully<br>";
}


$sql = "delete from gspn where serial in (select serial from gspn GROUP BY serial having count(*)>1);";
$result = pg_query($conn, $sql);

$sql = "select imei2.serial as imei from imei2 left join gspn on gspn.imei=imei2.serial where gspn.imei is null";
$result = pg_query($conn, $sql);

$row_number=0;
    while ($row = pg_fetch_row($result)) {
    $row_number++;
    array_push($csv_file_array,$row[0]);
  }

  for($i=0;$i<=$row_number;$i+=$slice){

    $imei_list=json_encode(array_slice($csv_file_array, $i, $slice));
    CreateFile($imei_list,$start_filename,$new_otp,$second=3);
    $start_filename++;
    }

echo $row_number;






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
