<?php
session_start();
include_once('base/includes/db.php');
error_reporting(1);

$username = '';
$password = '';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$remember = $_POST['remember'];
	
	if($con === false){
		if($username=="admin" && $password == "admin"){
			$_SESSION['username']=$username;
			if($_SESSION['username'] == $username){
				header("Location: config/index.php?mod=base&menu=db&edit=true");
				die();
			}
		}else{
				header("Location: index.php");
				die();
			}
	}else{
		// CHECK USER IN DATABASE
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$query = "SELECT * FROM users";
		$result = mysqli_query($con, $query);
		// SET COOCKIES
		if(isset($_POST['remember'])){
			setcookie("username", $username, time() + (86400 * 30), "/");
			setcookie("password", $password, time() + (86400 * 30), "/");
		}
		
		
		while($row = mysqli_fetch_assoc($result)){
			if($row['name'] == $username && $row['password']==$password){
				$_SESSION['username'] = $row['name'];
				$_SESSION['user_id'] = $row['id'];
				$module = $_GET['mod'];
                $menu = $_GET['menu'];
				$link = 'dashboard' . '/index.php?mod=in';
				header("Location: $link");
				die();
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0">
		<link rel="icon" href="https://i.imgur.com/7KH7Xci.png" type="image/x-icon" />
		<title>SMART CUBE</title>
		<!-- Bootstrap core CSS -->
		<link href="base/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="base/css/signin.css" rel="stylesheet">

        <link rel="stylesheet" href="base/css/style.css">

        <style>

        body{
        margin: 0;
        padding: 0;
        background: #fff;

        color: #fff;
        font-family: Arial;
        font-size: 12px;
        }

        .body{
        position: absolute;
        top: -20px;
        left: -20px;
        right: -40px;
        bottom: -40px;
        width: 100%;
        height: 100%;
        background-image: url(base/img/spkt.jpg);
        background-size: cover;
        -webkit-filter: blur(5px);
        z-index: 0;
        }

        </style>
    </head>

	<body>
    <div class="body"></div>
    <div class="wrapper">
            <img class="left_spkt" width="500px"  src="base/img/logo-news.png">
            <img class="right_spkt" width="300px" src="base/img/CLC.png">
<!--        </div>-->
		<div class="container">
            <div class="col-lg-12">

                <h1>ĐỒ ÁN TỐT NGHIỆP</h1>
                <h2>Smart Cube</h2>
            </div>

			<form class="form" action="" method="post">
					  <input <?php if(isset($_COOKIE['username'])) echo "value='".$_COOKIE['username']."'"; ?> type="text" name="username"  placeholder="Username">
					  <input <?php if(isset($_COOKIE['password'])) echo "value='".$_COOKIE['password']."'"; ?> type="password" name="password"  placeholder="Password">
				      <button type="submit" name="submit">Enter</button>
				<?php
					if(!$con){
						echo '<div class="alert alert-info" role="alert">DB Connection failed! Use <b>admin/admin</b> to enter DB configuration mode!</div>';
					}
				?>
			</form>
		</div> <!-- /container -->
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
  </body>
</html>
