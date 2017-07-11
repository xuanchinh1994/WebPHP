<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 15/06/2017
 * Time: 9:21 AM
 */
include_once '../../base/includes/db.php';
$data = array();
//if(isset($_GET['getData'])){

//    $data = $_GET['getData'];
$query = "SELECT value FROM temperature ORDER BY ID DESC LIMIT 1;";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];
$data[] = array('temp' => $result);
$query = "SELECT value FROM humidity ORDER BY ID DESC LIMIT 1;";
$result1 = mysqli_query($con, $query);
$result1 = mysqli_fetch_assoc($result1);
$result1 = $result1['value'];
$data[] = array('hum' => $result1);
$query = "SELECT value FROM light ORDER BY ID DESC LIMIT 1;";
$result2 = mysqli_query($con, $query);
$result2 = mysqli_fetch_assoc($result2);
$result2 = $result2['value'];
$data[] = array('light' => $result2);
$query = "SELECT value FROM smoke ORDER BY ID DESC LIMIT 1;";
$result3 = mysqli_query($con, $query);
$result3 = mysqli_fetch_assoc($result3);
$result3 = $result3['value'];
$data[] = array('smoke' => $result3);
$query = "SELECT sw1 FROM sw_status ORDER BY ID DESC LIMIT 1;";
$result4 = mysqli_query($con, $query);
$result4 = mysqli_fetch_assoc($result4);
$result4 = $result4['sw1'];
$data[] = array('sw1' => $result4);
$query = "SELECT sw2 FROM sw_status ORDER BY ID DESC LIMIT 1;";
$result5 = mysqli_query($con, $query);
$result5 = mysqli_fetch_assoc($result5);
$result5 = $result5['sw2'];
$data[] = array('sw2' => $result5);
echo json_encode(array('data' => $data));
//    echo $result;
//}

?>
