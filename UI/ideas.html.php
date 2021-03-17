<title>Ideas</title>


<?php

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");
/*if($conn)
echo "connected";
else
echo "Note Connected";*/

$sql = "SELECT employee.Employee_Name, idea.Idea_content, idea.Idea_Title , idea.Idea_ThumbsUP_Number, idea.Idea_ThumbsDOWN_Number, idea.Idea_Time, department.Department_Name
FROM ((idea
INNER JOIN employee ON Idea_Employee = employee.Employee_Id) INNER JOIN department ON Idea_Department = department.Department_Id)";
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
    'ideatitle' => $row['Idea_Title'],
    'employeename' => $row['Employee_Name'],
    'ideacontent' => $row['Idea_content'],
    'ideathumbup' => $row['Idea_ThumbsUP_Number'],
    'ideathumbdown' => $row['Idea_ThumbsDOWN_Number'],
    'ideatime' => $row['Idea_Time'],
    'department' => $row['Department_Name']
    );
}
?>
<!-- into a table -->

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
	<title>Ideas</title>
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
				<li role="presentation"><a href="Mainpage.html" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="#" class=" color-000">Reset Password</a></li>
			</ul>
			<?php foreach ($ideas as $idea): ?>
			<!-- a tag list group -->
			<div class="list-group">
				<a href="#" class="list-group-item">
					<div>
						<h6 name="ideas" class="fz-18"><?php echo $idea['ideatitle']; ?></h6>
						<div class="flex-between">
							<div>
								<span>Department：<?php echo $idea['department']; ?></span>
								<span>Deadline：<?php echo $idea['ideatime']; ?></span>
							</div>
							<button class="btn btn-primary btn-sm" type="button"  style="background-color: #606EB2;">Post a topic</button>
						</div>
					</div>
				</a>
				<a class="list-group-item">
					<div class="flex">
						
						<div>
							<div class="flex ideas-box">
							    
								<span class="fz-18">User: <?php echo $idea['employeename']; ?></span>
								<span class="fz-14">Idea：<?php echo $idea['ideacontent']; ?></span>
							</div>
							<div class="flex-around">
								<p class="fz-12">Number of comments：10</p>
								<div class="pointer">
									<span>file download</span>
									<span class="glyphicon glyphicon-download-alt mar-right fz-16" aria-hidden="true"></span>
									<span>10</span>
									<span class="glyphicon glyphicon-comment mar-right fz-16" aria-hidden="true"></span>
									<span><?php echo $idea['ideathumbup']; ?></span>
									<span class="glyphicon glyphicon-thumbs-up mar-right fz-16" aria-hidden="true"></span>
									<span><?php echo $idea['ideathumbdown']; ?></span>
									<span class="glyphicon glyphicon-thumbs-down fz-16" aria-hidden="true"></span>
								</div>
							</div>
						</div>
					</div>
				</a>
				<?php endforeach; ?>
			</div>
			<nav>
				<ul class="pager">
					<li><a>Previous page</a></li>
					<li><a>Next page</a></li>
				</ul>
			</nav>


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
			$('.glyphicon-thumbs-up').click(function() {
				$('.glyphicon-thumbs-down').css("color", "#555");
				$('.glyphicon-thumbs-up').css("color", "red");
			});
			$('.glyphicon-thumbs-down').click(function() {
				$('.glyphicon-thumbs-up').css("color", "#555");
				$('.glyphicon-thumbs-down').css("color", "red");
			});
		</script>
	</body>
</html>
