<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 28/06/2017
 * Time: 12:07 AM
 */
include_once '../../../base/includes/db.php';
$query = "SELECT value_1 FROM smoke LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value_1'];
echo $result;
?>