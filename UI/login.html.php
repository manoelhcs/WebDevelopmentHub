<!DOCTYPE html>
<?php session_start(); ?>
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
<?php


$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$msg="";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $usertype = $_POST['userType'];

    $sql = "SELECT * FROM employee WHERE Employee_Email='".$username."' AND Employee_Password='".$password."' AND Employee_Department='".$usertype."'";
    $result = mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($result);

    session_regenerate_id();
    //$_SESSION['username'] = $emp;


    if ($result->num_rows > 0) {

        $_SESSION['username'] = $username;
        $_SESSION['role'] = $usertype;

        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["Employee_name"]. "department: " . $row["Employee_Department"]. " - Name: " . $row["Employee_Gender"]. " " . $row["Employee_Email"]. "<br>";
        }
    }

    session_write_close();

    if($result->num_rows==1 && $_SESSION['role']=="1"){
        header("location:/pages/comp.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="2"){
        /*header("location:/pages/acad.html.php");*/
        header("location:/pages/Mainpage.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="3"){
        header("location:/pages/acco.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="4"){
        header("location:/pages/envt.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="5"){
        header("location:/pages/law.html.php");
    }
    else{
        $msg = "your Username, Password or Department is incorrect. Please try again!";
    }
}

?>
	<body style="background-color: #F6F6F6;">
		<div class="container" id="linear">
			<header style="background-color: white">
				<div class="flex-between">
					<img src="./img/logo.PNG" style="width: 170px; height: 70px;">
					<h3 class="Topicfont">Idea Forum</h3>
					<div class="right flex-center">
<!--						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Login</a>-->
<!--						<a class="btn btn-primary btn-sm" href="logout.php" role="button" style="background-color: #606EB2;">Log out</a>-->
						<a class="btn btn-primary btn-sm" href="register.html.php" role="button" style="background-color: #606EB2;">register</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<!--<li role="presentation"><a href="#" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="#" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="#" class=" color-000">Reset Password</a></li>-->
			</ul>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-6 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-heading fz-18">Login</div>
						<div class="panel-body">
						    <form method="post">
							<form class="form">
								<div class="form-group">
									<label class="font-weight">Account</label>
									<input type="text" name="username" class="form-control" placeholder="Username"required>
								</div>
								<div class="form-group">
									<label class="font-weight">Password</label>
									<input type="text" name="password" class="form-control" type="password" placeholder="Password"required>
								</div>
								<div class="form-group">
									<label class="font-weight">Department</label>
                                    <input type="radio" name="userType" value="1" class="custom-radio" required>&nbsp;COMP |
                                    <input type="radio" name="userType" value="2" class="custom-radio" required>&nbsp;ACAD |
                                    <input type="radio" name="userType" value="3" class="custom-radio" required>&nbsp;ACCO |
                                    <input type="radio" name="userType" value="3" class="custom-radio" required>&nbsp;ENVT |
                                    <input type="radio" name="userType" value="3" class="custom-radio" required>&nbsp;LAW  |
								</div>
								<button name="login" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Login</button>
							</form>
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
<h5 class="text-danger text-center"><?= $msg; ?></h5>


		<!-- jQuery.js -->
		<script src="./lib/jQuery/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap.js -->
		<script src="./lib/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

