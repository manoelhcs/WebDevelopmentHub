
<?php

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");
/*if($conn)
echo "connected";
else
echo "Note Connected";*/

$sql = "SELECT Comment_Details, Comment_Employee FROM comment";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);

/*if ($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row ['Idea_Title'] . "<br>";
        echo $row ['Employee_Name'] . "  ";
        echo $row ['Idea_content'] . "<br>";

    }
}*/
foreach($result as $row)
{
    $ideas [] = array(
        'comment' => $row['Comment_Details'],
        'user' => $row['Comment_Employee'],
    );
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
		<link rel="stylesheet" type="text/css" href="css/topic.css" />
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
						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Logout</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation" class="active"><a href="#" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="Mainpage.html" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
			</ul>
			<div class="details-title">
			</div>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-heading fz-18">Idea Topic</div>
						<div class="panel-body">
							<div class="list-group">
								<a class="list-group-item">
									<div class="fz-16 textCenter fz-weight">Brief description of ideas：xxxxxx</div>
									<div class="flex-between">
										<div>Department：xxxx</div>
										<div>
											<p>Number of comments：10</p>
										</div>
									</div>
									<p class="fz-16">Idea content：</p>
									
									    <p style="font-size: 2rem;">
									    	style style style style style style style style style style style style
									    </p>
								</a>
                                <?php foreach ($ideas as $idea): ?>
								<a class="list-group-item">
									<div class="flex">
										<div class="details-box">
											<p class="fz-16 fz-weight">User：<?php echo $idea['user']; ?></p>
											<p>Comment：<?php echo $idea['comment']; ?></p>
										</div>
									</div>
								</a>
                                <?php endforeach; ?>
							</div>
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
