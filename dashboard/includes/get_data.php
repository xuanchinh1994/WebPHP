<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 11/07/2017
 * Time: 5:51 PM
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
$query_temp = "INSERT INTO temperature (value, name, date) VALUES ({$temp}, '{$name_temp}', now());";
$result_temp = mysqli_query($con, $query_temp);


if(isset($_GET['humidity'])){
    $humidity = $_GET['humidity'];
}
if(isset($_GET['name_hum'])){
    $name_hum = $_GET['name_hum'];
}

$query_hum = "INSERT INTO humidity (value, name, date) VALUES ({$humidity}, '{$name_hum}', now());";
$result_hum = mysqli_query($con, $query_hum);

$query_light = "UPDATE light SET value = ".$_GET["value1_light"];

$query_smoke = "UPDATE smoke SET value = ".$_GET["value1_smoke"];
//echo $query;
if (mysqli_query($con, $query_temp)&&mysqli_query($con, $query_hum)&&mysqli_query($con, $query_light)&&mysqli_query($con, $query_smoke)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
};
?>
