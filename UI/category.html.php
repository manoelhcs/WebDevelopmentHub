<!DOCTYPE html>
<?php
$msg = '';
session_start();

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$username = $_SESSION['username'];
$sql = "SELECT * FROM topic WHERE topic.Topic_Id NOT IN (SELECT Idea_Topic FROM idea)";
$result = mysqli_query($conn,$sql);
$resultcheckCategories = mysqli_num_rows($result);

if ($resultcheckCategories > 0){
    foreach($result as $row)
    {

        $categories [] = array(
            'category' => $row['Topic_Name']
        );
    }
}else{
    $categories = [];
}

if(isset($_POST['addCategory'])){
    $topic_name = $_POST['topiccat'];
    $userID = 0;

    $sql = "SELECT Employee_Id FROM employee WHERE employee_Email = '".$username."'";
    $result = mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck > 0){
        foreach($result as $row)
        {
            $userID  =  $row['Employee_Id'];
        }
    }

    $sql = "INSERT INTO topic (Topic_Name, Topic_Employee)
            VALUES ('".$topic_name."', '".$userID."')";

    echo "got here 5";

    if ($conn->query($sql) === TRUE) {
        $msg =  "New category added successfully";
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo $msg;
}

if(isset($_POST['deleteCategory'])){

    $depOption = $_POST['depOption'];

    $sql = "DELETE FROM topic WHERE Topic_Name = '".$depOption."'";

    if ($conn->query($sql) === TRUE) {
        $msg= "Record deleted successfully";
    } else {
        $msg= "Error deleting record: " . $conn->error;
    }
}

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
                <a class="btn btn-primary btn-sm" href="logout.php" role="button" style="background-color: #606EB2;">Logout</a>
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
                    <form method="post">
                        <form class="form">
                            <div class="form-group">
                                <label class="font-weight">Category</label>
                                <input name="topiccat" class="form-control">
                            </div>
                            <button name="addCategory" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Add Category</button>
                        </form>
                    </form>
                    <form method="post">
                        <form class="form">
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="depOption">
                                    <?php foreach ($categories as $category): ?>
                                        <option><?php echo $category['category']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button name="deleteCategory" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Delete Category</button>
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

<script>


</script>

</body>
</html>
