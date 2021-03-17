<?php 

session_start();
    
    if(!isset($_SESSION['username']) || $_SESSION['role']!="MANAGER"){
        header("location:accessdenied.html.php");
    }

?>
<!DOCTYPE html>
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
			<div class="info-head flex">
				<img src="img/avatar.jpg">
				<div>
					<p>User：xxx</p>
					<p>Name：xxx</p>
					<p>Department：xxx</p>
				</div>
			</div>
			<div class="info-btn flex-between">
				<input class="btn btn-primary btn-sm" type="button" value="change the password"  style="background-color: #606EB2;">
				<input class="btn btn-primary btn-sm" type="button" value="Data"  style="background-color: #606EB2;">
				<input class="btn btn-primary btn-sm" type="button" value="Change information"  style="background-color: #606EB2;">
			</div>
			<div class="data-table flex-around">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Topic</th>
							<th>Modify</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>xxx</td>
							<td>
								<input class="btn btn-primary btn-sm" type="button" value="Modify" style="background-color: #606EB2;">
							</td>
						</tr>
						<tr>
							<td>xxx</td>
							<td>
								<input class="btn btn-primary btn-sm" type="button" value="Modify"  style="background-color: #606EB2;">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="data-table flex-around">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>NO.</th>
							<th>Comment</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>xxxxxxxxxx</td>
						</tr>
						<tr>
							<td>2</td>
							<td>xxxxxxxx</td>
						</tr>
					</tbody>
				</table>
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
