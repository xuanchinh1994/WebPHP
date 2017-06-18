<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 17/06/2017
 * Time: 6:54 PM
 */
include_once '../../../base/includes/db.php';
$query = "SELECT value FROM light LIMIT 1";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);
$result = $result['value'];
echo $result;
?>