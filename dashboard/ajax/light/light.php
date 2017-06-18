<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 17/06/2017
 * Time: 6:38 PM
 */
include_once '../../../base/includes/db.php';
$query = "UPDATE light SET value = ".$_GET["value"];
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>