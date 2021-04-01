<!DOCTYPE html>
<?php
session_start();
//echo $_SESSION['username'];

$message = '';
$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$sql = "SELECT * FROM idea ORDER BY NumberofViews DESC LIMIT 0, 5";
$result = mysqli_query($conn,$sql);
$resultcheckCategories = mysqli_num_rows($result);

if ($resultcheckCategories > 0){
    foreach($result as $row)
    {
        $ideas [] = array(
            'ideaTitle' => $row['Idea_Title'],
             'views' => $row['NumberofViews']
        );
    }
}else{
    $ideas = [];
}

$sql = "SELECT * FROM idea ORDER BY Idea_Time DESC LIMIT 0, 5";
$result = mysqli_query($conn,$sql);
$resultcheckIdeaTime = mysqli_num_rows($result);

if ($resultcheckIdeaTime > 0){
    foreach($result as $row)
    {
        $ideasTime [] = array(
            'ideaTitle' => $row['Idea_Title'],
            'views' => $row['NumberofViews']
        );
    }
}else{
    $ideasTime = [];
}

$sql = "SELECT * FROM idea ORDER BY Idea_ThumbsUP_Number DESC LIMIT 0, 5";
$result = mysqli_query($conn,$sql);
$resultcheckIdeaTime = mysqli_num_rows($result);

if ($resultcheckIdeaTime > 0){
    foreach($result as $row)
    {
        $ideasPop [] = array(
            'ideaTitle' => $row['Idea_Title'],
            'views' => $row['NumberofViews'],
            'popularity' => $row['Idea_ThumbsUP_Number']
        );
    }
}else{
    $ideasPop = [];
}

$sql = "SELECT idea.Idea_Title, comment.Comment_details, employee.Employee_Name
FROM ((idea INNER JOIN comment ON comment.Comment_Idea = Idea_Id) 
INNER JOIN employee ON comment.Comment_Employee = employee.Employee_Id) ORDER BY comment.Comment_Time DESC LIMIT 0, 5";
$result = mysqli_query($conn,$sql);
$resultcheckComment = mysqli_num_rows($result);

if ($resultcheckComment > 0){
    foreach($result as $row)
    {
        $comments [] = array(
            'ideaTitle' => $row['Idea_Title'],
            'details' => $row['Comment_details'],
            'name' => $row['Employee_Name']
        );
    }
}else{
    $comments = [];
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
						<a class="btn btn-primary btn-sm" href="logout.php" role="button" style="background-color: #606EB2;">Log out</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation"><a href="personalInfo.html.php" class=" color-000">Personal page</a></li>
				<li role="presentation" class="active"><a href="#" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
                <?php if(_SESSION['role']=="2"){  ?>
                    <li role="presentation"><a href="Manager.html.php" class=" color-000">Ideas</a></li>
                <?php }  ?>
			</ul>
			<!-- a tag list group -->
            <div class="row flex-between kill-margin">
                <div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
                    <div class="login panel panel-info">
                    <div class="panel-heading fz-18">Most Viewed Ideas</div>
                    <div class="panel-body">
                    <div class="list-group">
                        <?php foreach ($ideas as $idea): ?>
                        <a class="list-group-item">
                            <div class="fz-16 textCenter fz-weight"></div>
                            <div class="flex-between">
                                <div>Idea：<?php echo $idea['ideaTitle']; ?></div>
                                <div>
                                    <p>Number of Views： <?php echo $idea['views']; ?></p>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>

                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row flex-between kill-margin">
                <div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
                    <div class="login panel panel-info">
                        <div class="panel-heading fz-18">Latest Ideas</div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php foreach ($ideasTime as $ideat): ?>
                                    <a class="list-group-item">
                                        <div class="fz-16 textCenter fz-weight"></div>
                                        <div class="flex-between">
                                            <div>Idea：<?php echo $ideat['ideaTitle']; ?></div>
                                            <div>
                                                <p>Number of Views： <?php echo $ideat['views']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row flex-between kill-margin">
                <div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
                    <div class="login panel panel-info">
                        <div class="panel-heading fz-18">Popular Ideas</div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php foreach ($ideasPop as $ideap): ?>
                                    <a class="list-group-item">
                                        <div class="fz-16 textCenter fz-weight"></div>
                                        <div class="flex-between">
                                            <div>Idea：<?php echo $ideap['ideaTitle']; ?></div>

                                            <div>Popularity：<?php echo $ideap['popularity']; ?></div>
                                        </div>
                                        <div class="flex-between">
                                            <div>
                                                <p>Number of Views： <?php echo $ideap['views']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row flex-between kill-margin">
                <div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
                    <div class="login panel panel-info">
                        <div class="panel-heading fz-18">Latest Comments</div>
                        <div class="panel-body">
                            <div class="list-group">
                                <?php foreach ($comments as $comm): ?>
                                    <a class="list-group-item">
                                        <div class="fz-16 textCenter fz-weight"></div>
                                        <div class="flex-between">
                                            <div>Idea：<?php echo $comm['ideaTitle']; ?></div>
                                            <div>User：<?php echo $comm['name']; ?></div>
                                        </div>
                                        <div class="flex-between">
                                            <div>
                                                <span>Comment： <?php echo $comm['details']; ?></span>
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
