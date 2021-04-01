

<?php

session_start();

$idea_id = $_SESSION['idea'];

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$sql = "SELECT Idea_Employee, Idea_Title, Employee_Name, Employee_Id FROM idea INNER JOIN employee ON idea.Idea_Employee = employee.employee_Id WHERE Idea_Id = '".$idea_id."'";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0){
    foreach($result as $row)
    {
        $info [] = array(
            'title' => $row['Idea_Title'],
            'name' => $row['Employee_Name'],
            'id' => $row['Employee_Id']
        );
    }
}else{
    $info = [];
}

if(isset($_POST['submitreport'])) {

    $reason = $_POST['reason'];

    $sql2 = "INSERT INTO InappropriateIdeas (InappropriateIdeas_Reason, InappropriateIdeas_EmployeeId, InappropriateIdeas_Postname, InappropriateIdeas_IdeaId)
            VALUES ('".$reason."','".$info[0]['id']."','".$info[0]['title']."','".$idea_id."')";

    if ($conn->query($sql2) === TRUE) {
        $msg = "Report Submitted";

    } else {
        $msg = "Error: " . $sql2 . "<br>" . $conn->error;
    }
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
						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Log out</a>
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
				
			<div class="container" style="text-align: center; margin-top: 200px;">
				       <form class="form-horizontal" method="post" enctype="multipart/form-data">
				           <div class="form-group">
				               <label for="name" class="col-sm-3 control-label">Idea:</label>
				               <div class="col-sm-9">
				               <input type="text" name="name" class="form-control" value="<?php echo $info[0]['title']; ?>" id="name">
				               </div>
				           </div>
						   <div class="form-group">
						       <label for="name" class="col-sm-3 control-label">Idea Publisher:</label>
						       <div class="col-sm-9">
						       <input type="text" name="name" class="form-control" value="<?php echo $info[0]['name']; ?>" id="name">
						       </div>
						   </div>
				           <div class="form-group">
				               <label for="reason" class="col-sm-3 control-label">Reason:</label>
				               <div class="col-sm-9 text-left">
				                   <select class="form-control" name="reason">
				                           <option>Swearing</option>
				                           <option>slander</option>
				                           <option>discrimination </option>
				                       </select>  
				               </div>
				           </div>

                           <form class="form-horizontal" method="post">
                               <div class="col-sm-offset-3 col-sm-9">
                                   <button name="submitreport" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Report</button>
                               </div>
                           </form>
                       </form>
			</div>

			<footer style="margin-top: 100px;">
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
