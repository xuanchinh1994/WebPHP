<?php include_once '../base/includes/header.php'; ?>
<!-- navbar -->
<?php include_once '../base/includes/navbar.php'; ?>
<!-- Sidebar -->    
<?php include_once '../base/includes/sidebar.php'; ?>
<!-- sidebar-wrapper -->
<?php include_once '../base/includes/page_title.php' ?>
<!-- page title -->

<?php
if($module == "in")
{
    include_once 'includes/in.php';
}
if($module == "home")
{
    include_once 'includes/home.php';
}


?>

<?php //include_once 'includes/in.php'; ?>
<!---->
<?php //include_once 'includes/home.php'; ?>

<?php include_once '../base/includes/footer.php'; ?>