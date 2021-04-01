<?php
session_start();
$department = $_SESSION['department'];
$user = $_SESSION['username'];
$idea =  $_SESSION['idea'];

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$msg="";
$depID = 0;
$ideaEmail = "";

$sqlName = "SELECT Employee_Id FROM employee WHERE Employee_Email = '".$user."'";
$result = mysqli_query($conn,$sqlName);
$resultcheck = mysqli_num_rows($result);


if ($resultcheck > 0){
    foreach($result as $row)
    {
        $depID =  $row['Employee_Id'];

    }
}

$sqlEmail = "SELECT Employee_Email FROM employee INNER JOIN idea ON Employee_Id = idea_Employee WHERE Idea_Id = '".$idea."'";
$result = mysqli_query($conn,$sqlEmail);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0){
    foreach($result as $row)
    {
        $ideaEmail =  $row['Employee_Email'];
    }
}

if(isset($_POST['submit'])) {

    $text = $_POST['newComment'];

    $answer = $_POST['radio'];
    if ($answer == "Yes") {
        $sql = "INSERT INTO comment (Comment_Details, Comment_employee, Comment_Idea, Comment_Time, comment_anon)
            VALUES ('".$text."','".$depID."','".$idea."','now()', '1')";
    }
    else {
        $sql = "INSERT INTO comment (Comment_Details, Comment_employee, Comment_Idea, Comment_Time)
            VALUES ('".$text."','".$depID."','".$idea."','CURRENT_TIMESTAMP')";
    }

    if ($conn->query($sql) === TRUE) {
        $msg = "There is a new comment on your idea";

        $msg = wordwrap($msg,70);

        mail($ideaEmail,"New Comment on your Idea",$msg);

        $msg =  "New record created successfully";

    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }
    echo $msg;


}
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>

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
						<a class="btn btn-primary btn-sm" href="login.html" role="button" style="background-color: #606EB2;">Logout</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation"><a href="personalInfo.html.php" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="Mainpage.html.php" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
			</ul>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-6 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-body">
							<form class="panel-heading fz-18" method="post">New Comment
								<div class="list-group">
                                    <textarea name="newComment" class="textinput" placeholder="Comment"></textarea>
								</div>
                                <div class="list-group"> Anonymous?
                                    <input type="radio" name="radio" value="Yes">Yes
                                    <input type="radio" name="radio" value="No">No
                                </div>
                                <div class="middle flex-center">
								    <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;margin:5px;">Add Comment</button>

                                    <button name="submit" href="javascript:history.go(-1)" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Back</button>
                                </div>
                            </form>
						</div>
                    </form>
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
