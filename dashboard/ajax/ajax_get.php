<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 18/06/2017
 * Time: 1:58 AM
 */
include_once '../../base/includes/db.php';
$query = "SELECT value FROM light LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];

$query_1 = "SELECT value FROM smoke LIMIT 1";
$result_1 = mysqli_query($con, $query_1);
$result_1 = mysqli_fetch_assoc($result_1);
$result_1 = $result_1['value'];

echo $result.',',$result_1;

?>