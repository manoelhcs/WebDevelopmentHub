<?php 

session_start();

$message = '';
$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$sql = "SELECT Employee_Name FROM employee WHERE BLOCK = 1";
$result = mysqli_query($conn,$sql);
$resultcheckComment = mysqli_num_rows($result);

if ($resultcheckComment > 0){
    foreach($result as $row)
    {
        $users [] = array(
            'name' => $row['Employee_Name']
        );
    }
}else{

    $users [] = array(
        'name' => "Empty"
    );
}

$sql2 = "SELECT Employee_Name FROM employee WHERE BLOCK = 0";
$result2 = mysqli_query($conn,$sql2);
$resultcheckBanned = mysqli_num_rows($result2);


if ($resultcheckBanned > 0){
    foreach($result2 as $rowb)
    {
        $usersBanned [] = array(
            'name' => $rowb['Employee_Name']
        );
    }
}else{

    $usersBanned [] = array(
        'name' => "Empty"
    );

}


if(isset($_POST['block']))
{
    $userName = $_POST['users'];
    echo $userName;

    if($userName != ""){

        $sql = "Update employee SET BLOCK = 0 WHERE Employee_Name ='".$userName."'";
        $result = mysqli_query($conn,$sql);

        if ($conn->query($sql) === TRUE) {
            $msg = "There is a new comment on your idea";

        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<meta http-equiv='refresh' content='0'>";

    }
}

if(isset($_POST['unblock']))
{
    $userName = $_POST['usersBanned'];
    echo $userName;

    if($userName != ""){

        $sql = "Update employee SET BLOCK = 1 WHERE Employee_Name = '".$userName."'";
        $result = mysqli_query($conn,$sql);

        if ($conn->query($sql) === TRUE) {
            $msg = "There is a new comment on your idea";

        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<meta http-equiv='refresh' content='0'>";

    }
}

if(isset($_POST['hide']))
{
    $userName = $_POST['hiddenUsers'];
    echo $userName;

    if($userName != ""){

        $sql = "Update idea SET HIDE = 1 WHERE Idea_Employee = (SELECT Employee_Id FROM employee WHERE Employee_Name = '".$userName."')"; //'".$userName."'";
        $result = mysqli_query($conn,$sql);

        if ($conn->query($sql) === TRUE) {
            $msg = "There is a new comment on your idea";

        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<meta http-equiv='refresh' content='0'>";

    }
}

if(isset($_POST['unhide']))
{
    $userName = $_POST['hiddenUsers'];
    echo $userName;

    if($userName != ""){

        $sql = "Update idea SET HIDE = 0 WHERE Idea_Employee = (SELECT Employee_Id FROM employee WHERE Employee_Name = '".$userName."')";
        $result = mysqli_query($conn,$sql);

        if ($conn->query($sql) === TRUE) {
            $msg = "There is a new comment on your idea";

        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<meta http-equiv='refresh' content='0'>";

    }
}


session_write_close();

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
					<h3 class="Topicfont">Manager</h3>
					<div class="right flex-center">
						<a class="btn btn-primary btn-sm" href="login.html.php" role="button" style="background-color: #606EB2;">Log out</a>
					</div>
				</div>
			</header>
			<!-- Navigation bar nav bootstrap component -->
			<ul class="nav nav-pills nav-justified">
				<!-- Click the jump page, add the active attribute to display the background color -->
				<li role="presentation" class="active"><a href="#" class=" color-000">Personal page</a></li>
				<li role="presentation"><a href="Mainpage.html.php" class=" color-000">Mainpage</a></li>
				<li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
			</ul>
			<div class="info-head flex">

			</div>
            <div class="row flex-between kill-margin">
                <div class="login_box col-lg-7 col-md-8 col-sm-10 col-xs-12 kill-padding">
                    <div class="login panel panel-info">
                        <div class="form-group">
                            <label class="font-weight">Unblocked Users</label>
                            <form method="post">
                                <select name="users" multiple style="width: 400px;height: 200px">
                                    <?php foreach ($users as $user): ?>
                                        <option><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><input type="submit" value="Block" name="block"></p>
                            </form>
                        </div>
                        <div class="form-group">
                            <label class="font-weight">Blocked Users</label>
                            <form method="post">
                                <select name="usersBanned" multiple style="width: 400px;height: 200px">
                                    <?php foreach ($usersBanned as $userb): ?>
                                        <option><?php echo $userb['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><input type="submit" value="Unblock" name="unblock"></p>
                            </form>
                        </div>
                        <div class="form-group">
                            <label class="font-weight">Show / Hide Users</label>
                            <form method="post">
                                <select name="hiddenUsers" multiple style="width: 400px;height: 200px">
                                    <?php foreach ($users as $user): ?>
                                        <option><?php echo $user['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p><input type="submit" value="Hide" name="hide"></p>
                                <p><input type="submit" value="Unhide" name="unhide"></p>
                            </form>
                            <button name="category" onclick="location.href='category.html.php';" class="btn btn-primary btn-lg btn-block" style="background-color: #606EB2;">Manage Categories</button>
                        </div>
                        <div class="form-group">
                            <button name="test" onclick="location.href='reports.html.php';" class="btn btn-primary btn-lg btn-block" style="background-color: #606EB2;"> View Reports</button>
                        </div>
                        <div class="form-group">
                                <form method='post' action='download.php'>
                                    <button name="Export" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Export CSV</button>

                                    <?php

                                    $conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

                                    $query = "SELECT * FROM employee";
                                    $result = mysqli_query($conn,$query);
                                    $user_arr = array();
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['Employee_Id'];
                                        $uname = $row['Employee_name'];
                                        $user_arr[] = array($id,$uname);
                                        ?>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $serialize_user_arr = serialize($user_arr);
                                    ?>
                                    <textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

			<footer>
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
