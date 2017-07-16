<?php
include_once '../../base/includes/db.php';

$query = "SELECT longitude,latitude FROM maps LIMIT 1";
$result = mysqli_query($con, $query);

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}




if (!$result) {
    die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
    // Add to XML document node
    echo '<marker ';
    echo 'lat="' . $row['longitude'] . '" ';
    echo 'lng="' . $row['latitude'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';
?>