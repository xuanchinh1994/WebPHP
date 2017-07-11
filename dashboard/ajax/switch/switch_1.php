<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 17/06/2017
 * Time: 6:11 PM
 */
echo($_GET["checked"]);
$checked = 2;
if ($_GET["checked"] == "1"){
    $checked = 1;
}
if ($_GET["checked"] == "2"){
    $checked = 2;
}
include_once '../../../base/includes/db.php';
$query = "UPDATE sw_status SET sw1 = ".$checked;
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>