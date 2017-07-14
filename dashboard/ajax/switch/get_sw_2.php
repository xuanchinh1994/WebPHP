<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 14/07/2017
 * Time: 12:55 PM
 */

include_once '../../../base/includes/db.php';
$query = "SELECT sw2 FROM sw_status LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['sw2'];
echo $result;
?>