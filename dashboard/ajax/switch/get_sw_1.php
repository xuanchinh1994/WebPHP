<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 18/06/2017
 * Time: 2:11 AM
 */
include_once '../../../base/includes/db.php';
$query = "SELECT sw1 FROM sw_status LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['sw1'];
echo $result;
?>