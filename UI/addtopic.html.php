<!DOCTYPE html>
<?php
$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

if(isset($_POST['establish'])){
$topiccategory = $_POST['topiccat'];
$deadline = $_POST['deadline'];
$employee= $_SESSION['username'];
    $sql1="SELECT Employee_Id FROM employee WHERE Employee_Email='".$employee."'";
    $result1 = mysqli_query($conn,$sql1);
    $resultcheck1 = mysqli_num_rows($result1);
    $eid= $row['Employee_Id'];
    $sql = "INSERT INTO topic (Topic_Name, Topic_Employee,Topic_Deadline) VALUES('".$topiccategory."','".$eid."','".$deadline."')";
    $result = mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($result);
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
		<link rel="stylesheet" type="text/css" href="css/control.css" />
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
						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Login</a>
						<a class="btn btn-primary btn-sm" href="logout.php" role="button" style="background-color: #606EB2;">Log out</a>
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
						<div class="panel-body">
							<form method="post">
							    <form class="form">
								    <div class="form-group">
									    <label class="font-weight">Topic category</label>
									    <input name="topiccat" class="form-control"required>
								    </div>
								    <div class="form-group">
								    	<label class="font-weight">Deadline</label>
								    	<input name="deadline" class="form-control"required>
								    </div>
								        <button name="establish" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Establish</button>
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



		<!-- jQuery.js -->
		<script src="./lib/jQuery/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap.js -->
		<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

		<script>


		</script>

	</body>
</html>
