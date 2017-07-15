<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 16/07/2017
 * Time: 12:40 AM
 */
include_once '../../base/includes/db.php';

//if(isset($_GET['getData'])){

//    $data = $_GET['getData'];
$query = "SELECT value FROM temperature_1 ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];
//$data[] = array('temp' => $result);
$query = "SELECT value FROM humidity_1 ORDER BY ID DESC LIMIT 1;";
$result1 = mysqli_query($con, $query);
$result1 = mysqli_fetch_assoc($result1);
$result1 = $result1['value'];
//$data[] = array('hum' => $result1);
$query = "SELECT value_1 FROM light ORDER BY ID DESC LIMIT 1;";
$result2 = mysqli_query($con, $query);
$result2 = mysqli_fetch_assoc($result2);
$result2 = $result2['value_1'];
//$data[] = array('light' => $result2);
$query = "SELECT value_1 FROM smoke ORDER BY ID DESC LIMIT 1;";
$result3 = mysqli_query($con, $query);
$result3 = mysqli_fetch_assoc($result3);
$result3 = $result3['value_1'];
//$data[] = array('smoke' => $result3);

//$data[] = array('sw2' => $result5);
$data = array(
    'temp' => $result,
    'hum' => $result1,
    'fire' => $result2,
    'smoke' => $result3,
);
echo json_encode($data);

?>