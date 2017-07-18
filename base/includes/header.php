<?php include_once 'db.php'; ?>
<?php
session_start();
if(!$_SESSION['username']){
    session_destroy();
    session_unset();
    header("Location: ../index.php");
	die();
}
?>

<?php
ob_start();
$module = null;
$menu = null;
if(isset($_GET['mod'])){
    $module=$_GET['mod'];
}
if(isset($_GET['menu'])){
    $menu=$_GET['menu'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SMART CUBE</title>
        <!-- Favicon -->
        <link rel="icon" href="https://i.imgur.com/7KH7Xci.png" type="image/x-icon" />
        <!-- Bootstrap Core CSS -->
        <link href="../base/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../base/css/custom.css" rel="stylesheet">
        <link href="../base/css/guages.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet"> 
        <!-- Slider -->
        <link href="../base/css/slider/freshslider.min.css" rel="stylesheet">
		<!-- jQuery -->
        <script src="../base/js/jquery.js"></script>
		<!-- Chart js library -->
        <script src="../base/js/chart/Chart.js"></script>
		<!-- datatables -->
		<link href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
		
		<!-- SWITCH SECTION -->
        <link href="../base/css/switch/bootstrap-switch.css" rel="stylesheet">
        <script src="../base/js/switch/highlight.js"></script>
        <script src="../base/js/switch/bootstrap-switch.js"></script>
        <script src="../base/js/switch/main.js"></script>

        <link rel="stylesheet" type="text/css" href="../base/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../base/css/owl.transitions.css"/>
        <link rel="stylesheet" type="text/css" href="../base/css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="../base/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="../base/css/main.css"/>


<!--        <script type="text/javascript" src="../base/js/jquery.js"></script>-->
        <script type="text/javascript" src="../base/js/ajaxchimp.js"></script>
        <script type="text/javascript" src="../base/js/scrollTo.js"></script>
        <script type="text/javascript" src="../base/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="../base/js/wow.js"></script>
        <script type="text/javascript" src="../base/js/parallax.js"></script>
        <script type="text/javascript" src="../base/js/nicescroll.js"></script>
        <script type="text/javascript" src="../base/js/main.js"></script>
    </head>
    
    <body>
        <div id="wrapper">