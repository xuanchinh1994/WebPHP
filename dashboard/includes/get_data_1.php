<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 16/07/2017
 * Time: 1:06 AM
 */
include_once '../../base/includes/db.php';
$temp = '';
$name_temp = '';
$humidity = '';
$name_hum = '';
$value1_light='';


if(isset($_GET['temp'])){
    $temp = $_GET['temp'];
}
if(isset($_GET['name_temp'])){
    $name_temp = $_GET['name_temp'];
}
$query_temp = "INSERT INTO temperature_1 (value, name, date) VALUES ({$temp}, '{$name_temp}', now());";
$result_temp = mysqli_query($con, $query_temp);


if(isset($_GET['humidity'])){
    $humidity = $_GET['humidity'];
}
if(isset($_GET['name_hum'])){
    $name_hum = $_GET['name_hum'];
}

$query_hum = "INSERT INTO humidity_1 (value, name, date) VALUES ({$humidity}, '{$name_hum}', now());";
$result_hum = mysqli_query($con, $query_hum);

$query_light = "UPDATE light SET value_1 = ".$_GET["value1_fire"];

$query_smoke = "UPDATE smoke SET value_1 = ".$_GET["value1_smoke"];
//echo $query;
//$query_s1 = "UPDATE sw_status SET sw1 = ".$_GET["switch_1"];
//
//$query_s2 = "UPDATE sw_status SET sw2 = ".$_GET["switch_2"];


//$query_sw = "SELECT sw1,sw2 FROM sw_status LIMIT 1";
//$result_sw = mysqli_query($con, $query_sw);
//$result_sw = mysqli_fetch_assoc($result_sw);
//$result_sw1 = $result_sw['sw1'];
//$result_sw2 = $result_sw['sw2'];
//echo 'a'.$result_sw1.',s'.$result_sw2;

if (mysqli_query($con, $query_temp)&&mysqli_query($con, $query_hum)&&mysqli_query($con, $query_light)&&mysqli_query($con, $query_smoke)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
};
?>
