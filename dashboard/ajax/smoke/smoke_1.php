<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 28/06/2017
 * Time: 12:07 AM
 */
include_once '../../../base/includes/db.php';
$query = "UPDATE smoke SET value_1 = ".$_GET["value_1"];
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>