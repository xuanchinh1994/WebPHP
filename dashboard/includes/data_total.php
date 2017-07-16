<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 15/06/2017
 * Time: 9:21 AM
 */
include_once '../../base/includes/db.php';

//if(isset($_GET['getData'])){

//    $data = $_GET['getData'];
$query = "SELECT value FROM temperature ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];
//$data[] = array('temp' => $result);
$query = "SELECT value FROM humidity ORDER BY ID DESC LIMIT 1;";
$result1 = mysqli_query($con, $query);
$result1 = mysqli_fetch_assoc($result1);
$result1 = $result1['value'];
//$data[] = array('hum' => $result1);
$query = "SELECT value,value_1 FROM light ORDER BY ID DESC LIMIT 1;";
$result_light = mysqli_query($con, $query);
$result_light = mysqli_fetch_assoc($result_light);
$result2 = $result_light['value'];
$result8 = $result_light['value_1'];
//$data[] = array('light' => $result2);
$query = "SELECT value,value_1 FROM smoke ORDER BY ID DESC LIMIT 1;";
$result_smoke = mysqli_query($con, $query);
$result_smoke= mysqli_fetch_assoc($result_smoke);
$result3 = $result_smoke['value'];
$result9 = $result_smoke['value_1'];
//$data[] = array('smoke' => $result3);
$query = "SELECT sw1 FROM sw_status ORDER BY ID DESC LIMIT 1;";
$result4 = mysqli_query($con, $query);
$result4 = mysqli_fetch_assoc($result4);
$result4 = $result4['sw1'];
//$data[] = array('sw1' => $result4);
$query = "SELECT sw2 FROM sw_status ORDER BY ID DESC LIMIT 1;";
$result5 = mysqli_query($con, $query);
$result5 = mysqli_fetch_assoc($result5);
$result5 = $result5['sw2'];
$query = "SELECT value FROM temperature_1 ORDER BY ID DESC LIMIT 1;";
$result6 = mysqli_query($con, $query);
$result6 = mysqli_fetch_assoc($result6);
$result6 = $result6['value'];
$query = "SELECT value FROM humidity_1 ORDER BY ID DESC LIMIT 1;";
$result7 = mysqli_query($con, $query);
$result7 = mysqli_fetch_assoc($result7);
$result7 = $result7['value'];

//$data[] = array('sw2' => $result5);
$data = array(
    'temp' => $result,
    'hum' => $result1,
    'light' => $result2,
    'smoke' => $result3,
    'sw1' => $result4,
    'sw2' => $result5,
    'temp1' => $result6,
    'hum1' => $result7,
    'fire' => $result8,
    'smoke1' => $result9
);
echo json_encode($data);
//    echo $result;
//}

?>
