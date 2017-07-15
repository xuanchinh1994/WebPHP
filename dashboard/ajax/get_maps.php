<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 13/07/2017
 * Time: 10:15 AM
 */
include_once '../../base/includes/db.php';
$longitude='';
$latitude='';
//if(isset($_GET['longitude'])){
//    $longitude = $_GET['longitude'];
//}
//if(isset($_GET['latitude'])){
//$latitude = $_GET['latitude'];

//$query_1 = "UPDATE maps SET longitude = ".$_GET["longitude"].",latitude = ".$_GET["latitude"];


$query = "SELECT longitude,latitude FROM maps LIMIT 1";
$result = mysqli_query($con, $query);
$get = mysqli_fetch_assoc($result);
$longitude = $get['longitude'];
$latitude = $get['latitude'];

$data = array(
    'longitude' => $longitude,
    'latitude' => $latitude
);
echo json_encode($data);


?>