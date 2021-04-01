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

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $password = $_POST['password'];
    $password = md5($password);
    $depOption = $_POST['depOption'];

    $gender = "";

    if($sex == 1){
        $gender = "Male";
    }else if($sex == 2){
        $gender = "Female";
    }else if($sex == 3){
        $gender = "X";
    }

    if($depOption == "COMP"){
        $depOption = 1;
    }else if($depOption == "STAFF"){
        $depOption = 2;
    }

    $sql = "INSERT INTO employee (Employee_name, Employee_Gender, Employee_Password, Employee_Email, Employee_Department, Employee_Identity, BLOCK)
            VALUES ('".$name."','".$gender."','".$password."','".$email."','".$depOption."',2,1)";

    if ($conn->query($sql) === TRUE) {
        $msg =  "New record created successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
	<body style="background-color: #F6F6F6;">
		<div class="container" id="linear">
			<header style="background-color: white">
				<div class="flex-between">
					<img src="./img/logo.PNG" style="width: 170px; height: 70px;">
					<h3 class="Topicfont">Registration</h3>
					<div class="right flex-center">
						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Login</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
			</ul>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-6 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-heading fz-18">Register</div>
						<div class="panel-body">
                            <form method="post">
							<form class="form">
                                <div class="form-group">
                                    <label class="font-weight">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="name"required>
                                </div>
								<div class="form-group">
									<label class="font-weight">University Email</label>
									<input type="text" name="email" class="form-control" placeholder="email"required>
								</div>
								<div class="form-group">
									<label class="font-weight">Password</label>
									<input name="password" class="form-control" type="password" placeholder="Password"required>
								</div>
								<div class="form-group">
									<label class="font-weight">Confirm Password</label>
									<input name="confirm_password" class="form-control" type="password" placeholder="Password"required>
								</div>
								<div class="form-group">
									<label class="font-weight">Gender</label>
									<div class="radio">
										<label class="radio-inline">
											<input type="radio" name="sex" value="1"> Male
										</label>
										<label class="radio-inline">
											<input type="radio" name="sex" value="2"> Female
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="font-weight">Department</label>
									<select class="form-control" name="depOption">
										<option>COMP</option>
										<option>STAFF</option>
									</select>
								</div>
								<div class="form-group">
								</div>
                                    <button name="register" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Register</button>
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
