<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 15/06/2017
 * Time: 9:21 AM
 */
include_once '../../base/includes/db.php';
$data= array();
if(isset($_GET['getData'])){

//    $data = $_GET['getData'];
    $query = "SELECT value FROM temperature ORDER BY ID DESC LIMIT 1;";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($result);
    $result = $result['value'];
    $data[] = array('result' => $result);
    $query = "SELECT value FROM humidity ORDER BY ID DESC LIMIT 1;";
    $result1 = mysqli_query($con, $query);
    $result1 = mysqli_fetch_assoc($result1);
    $result1 = $result1['value'];
    $data[] = array('result1' => $result1);
    echo json_encode(array('data'=>$data));
//    echo $result;
}

?>
