<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 13/07/2017
 * Time: 11:41 AM
 */
include_once '../../../base/includes/db.php';
$query = "UPDATE maps SET longitude = ".$_GET["longitude"].",latitude = ".$_GET["latitude"];
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>