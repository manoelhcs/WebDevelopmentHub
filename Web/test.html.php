<!DOCTYPE html>
<?php
session_start();

$conn = new mysqli("FastCompet","am9244a","am9244a","mdb_am9244a");

$msg="";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $userType = $_POST['userType'];
    
    $sql = "SELECT * FROM employee WHERE Employee_Email=? AND Employee_Password=? AND Employee_Department=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$username,$password,$userType);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    session_regenerate_id();
    $_SESSION['username'] = $row['email'];
    $_SESSION['role'] = $row['usertype'];
    session_write_close();
    
    if($result->num_rows==1 && $_SESSION['role']=="1"){
        header("location:../*COMP*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="2"){
        header("location:../*ACAD_Page*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="3"){
        header("location:../*ACCO_Page*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="4"){
        header("location:../*ENVT_Page*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="5"){
        header("location:../*LAW_Page*.html.php");
    }
    else{
        $msg = "username or password is incorrect";
    }
}

?>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>

		<!-- Bootstrap.css -->
		<link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/public.css" />
		<style>

		</style>
	</head>

	<body style="background-color: #F6F6F6;">
		<div class="container" id="linear">
			<header style="background-color: white">
				<div class="flex-between">
					<img src="./img/logo.PNG" style="width: 170px; height: 70px;">
					<h3 class="Topicfont">Idea Forum</h3>
					<div class="right flex-center">
						<a class="btn btn-primary btn-sm" href="login.html" role="button" style="background-color: #606EB2;">Login</a>
						<a class="btn btn-primary btn-sm" href="register.html" role="button" style="background-color: #606EB2;">Log out</a>
						<a class="btn btn-primary btn-sm" href="register.html" role="button" style="background-color: #606EB2;">register</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation" class="active"><a href="#" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="#" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="#" class=" color-000">Reset Password</a></li>
			</ul>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-6 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-heading fz-18">Login</div>
						<div class="panel-body">
							<form class="form">
								<div class="form-group">
									<label class="font-weight">Account</label>
									<input class="form-control">
								</div>
								<div class="form-group">
									<label class="font-weight">Password</label>
									<input class="form-control" type="password">
								</div>
								<button class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<h4 class="textCenter">Copyright:XXX</h4>
				<h5 class="textCenter">Contant:XXX</h5>
			</footer>
		</div>



		<!-- jQuery.js -->
		<script src="./lib/jQuery/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap.js -->
		<script src="./lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
