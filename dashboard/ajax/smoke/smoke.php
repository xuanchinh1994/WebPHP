<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 18/06/2017
 * Time: 1:57 AM
 */
include_once '../../../base/includes/db.php';
$query = "UPDATE smoke SET value = ".$_GET["value"];
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>