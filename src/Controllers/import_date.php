<?php

namespace App\Controllers;

require_once realpath('./../../vendor/autoload.php');

ini_set('max_execution_time', 0); 

$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = gspn";
$credentials = "user = postgres password=123456";

$conn = pg_connect( "$host $port $dbname $credentials"  );
if(!$conn) {
    echo "Error : Unable to open database\n";
} else {
    echo "Opened database successfully\n";
}

// DIR 

$dir='D:\\kamali\\csv\\';

$csv_file_array=[];
// read list of file
if (is_dir($dir)) {
    // echo 'is_dir';
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $count++;
            // echo "filename: .".$file."<br />";
            array_push($csv_file_array,$file);
            // $csv_file_array[]=substr($file,0,-4);
        }
        closedir($dh);
    }
    // var_dump($csv_file_array);
}
$file_open='D:\\kamali\\csv\\';


// insert into 
foreach($csv_file_array as $kay=>$value){
  if (($handle = fopen(($file_open.$value), "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
        $num = count($data);

        $result = pg_query($conn, "INSERT INTO new_gspn_6000 (old_serial,imei,sku,new_serial,filename) VALUES ('{$data[0]}', '{$data[1]}', '{$data[2]}','{$data[3]}','$value');");
    }
    fclose($handle);
    if (!unlink($file_open.$value)) { 
      echo ("$value cannot be deleted due to an error").'<br>';
  } 
  else { 
      echo ("$value has been deleted").'<br>'; 
  } 

}

}
die('finish');
//  Read file





