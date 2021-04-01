
<?php

session_start();

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$idea_id = $_GET['idea_id'];
$_SESSION['idea'] = $idea_id;


$sql = "SELECT Comment_Details, Comment_Employee, comment_anon FROM comment WHERE Comment_idea = '".$idea_id."'";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0){
    foreach($result as $row)
    {
        if($row['comment_anon'] == 1){
            $ideas [] = array(
                'comment' => $row['Comment_Details'],
                'user' => "Anonymous",
            );
        }else{
            $ideas [] = array(
                'comment' => $row['Comment_Details'],
                'user' => $row['Comment_Employee'],
            );
        }


    }
}else{
    $ideas = [];
}


$sql = "SELECT COUNT(Comment_Id) FROM comment WHERE Comment_idea = '".$idea_id."'";
$result = mysqli_query($conn,$sql);
$data= mysqli_fetch_array($result);
$number_comments =  $data[0];

$sql = "SELECT Idea_content, Department_Name, Idea_Title FROM idea INNER JOIN department ON Idea_Department = Department_Id WHERE Idea_Id = '".$idea_id."'";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);


if ($resultcheck > 0){
    foreach($result as $row)
    {
        $ideaInfo [] = array(
            'ideaText' => $row['Idea_content'],
            'department' => $row['Department_Name'],
            'ideaTitle' => $row['Idea_Title']
        );
    }
}else{
    $ideaInfo = [];
}

$_SESSION['department'] = $ideaInfo[0]['department'];

session_write_close();

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
				<li role="presentation"><a href="personalInfo.html.php" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="Mainpage.html.php" class=" color-000">Mainpage</a></li>
				<li role="presentation" class="active"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
			</ul>
			<div class="details-title">
			</div>
			<div class="row flex-between kill-margin">
				<div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
					<div class="login panel panel-info">
						<div class="panel-heading fz-18">Idea</div>
						<div class="panel-body">
							<div class="list-group">
								<a class="list-group-item">
									<div class="fz-16 textCenter fz-weight"><?php echo $ideaInfo[0]['ideaTitle']; ?></div>
									<div class="flex-between">
										<div>Department：<?php echo $ideaInfo[0]['department']; ?></div>
										<div>
											<p>Number of comments：<?php echo $number_comments; ?></p>
										</div>
									</div>
									<p class="fz-16">Idea content：<?php echo $ideaInfo[0]['ideaText']; ?></p>

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
                            <div class="list-group">
                                <button onclick="location.href = 'addComment.html.php?test=15&grape=5'" name="addComment" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Add Comment</button>
                                <div class="flex ideas-box">
                                    <p> </p>
                                </div>
                            </div>
                            <div class="info-btn flex-between">
                                <button onclick="location.href = 'InappropriateReport.html.php'" name="addComment" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Report</button>
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
