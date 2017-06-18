<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 18/06/2017
 * Time: 1:58 AM
 */
include_once '../../../base/includes/db.php';
$query = "SELECT value FROM smoke LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];
echo $result;
?>