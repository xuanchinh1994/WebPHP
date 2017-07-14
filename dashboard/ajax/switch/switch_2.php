<?php
/**
 * Created by PhpStorm.
 * User: chinh
 * Date: 18/06/2017
 * Time: 2:02 AM
 */
echo($_GET["checked"]);
$checked = 2;
if ($_GET["checked"] == "true"){
    $checked = 1;
}
if ($_GET["checked"] == "false"){
    $checked = 2;
}
include_once '../../../base/includes/db.php';
$query = "UPDATE sw_status SET sw2 = ".$checked;
if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
?>