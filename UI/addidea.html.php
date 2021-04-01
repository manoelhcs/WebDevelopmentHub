<?php include_once 'employeeid.html.php' ?>
<?php
$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

if(isset($_POST['complete'])){

    $title = $_POST['addtitle'];
    $content = $_POST['addcontent'];
    $topic= $_POST['addtopic'];
    if(($_POST['anon']==0)){
        $employeeid = $userid;
    }
    else{
        $employeeid = "1";
    }
    session_start();
    /*if( $_SESSION['role']="1"){
            $usertype='1';
        }
        elseif($_SESSION['role']="2"){
             $usertype='2';
        }
        elseif($_SESSION['role']="3"){
             $usertype='3';
        }
        elseif($_SESSION['role']="4"){
             $usertype='4';
        }*/

    $sql = "INSERT INTO idea SET 
Idea_Employee = '".$employeeid."',
Idea_Department = '".$usertype."',
Idea_Title='".$title."',
Idea_ThumbsUP_Number='0',
Idea_ThumbsDOWN_Number='0',
Idea_content='".$content."',
Idea_Topic='".$topic."'";
    $result = mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($result);
   // echo '<script>alert("Thank you for submitting your idea")</script>';

}

?>

<html lang="EN">

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
        #uploading{
            margin-top: 20px;
            margin-left: -60px;
            overflow:hidden;
            position:absolute;
        }
        #file{
            opacity:0;
            filter:alpha(opacity=0);
            position:absolute;
        }
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
        <li role="presentation"><a href="Mainpage.html" class=" color-000">Mainpage</a></li>
        <li role="presentation"><a href="ideas.html.php" class=" color-000">Ideas</a></li>
    </ul>
    <div class="flex-between report-title">
        <span class="fz-18">Title：xxxx</span>
        <span class="fz-16">Deadline：xx/xx/xx</span>
    </div>
    <div class="row flex-between kill-margin">
        <div class="login_box col-lg-9 col-md-10 col-sm-10 col-xs-12 kill-padding">
            <div class="login panel panel-info">
                <div class="panel-body">
                    <form method="post">
                        <form class="form">
                            <div class="form-group">
                                <label class="font-weight">Title：</label>
                                <input name="addtitle" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight">Concrete idea：</label>
                                <textarea name="addcontent" class="form-control" rows="3"required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="font-weight">Topic：</label>
                                <?php include_once 'testdropdown.html.php' ?>
                            </div>
                            <div>
                                </br>
                            </div>
                            <div class="form-group">
                                <div>
                                    </br>
                                </div>
                                <label class="font-weight">Submit anonymously：</label>
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input name="anon" type="radio" name="boolean" value="1"required> Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input name="anon" type="radio" name="boolean" value="0"required> No
                                    </label>
                                </div>
                            </div>
                            <input id="clause-btn" class="btn btn-default btn-sm" type="button" value="Show terms"  style="background-color: #606EB2;">
                            <div id="clause" class="fz-16">
                                <p>1:xxxxxxxxx</p>
                                <p>2:xxxxxxxxx</p>
                                <p>3:xxxxxxxxx</p>
                                <p>4:xxxxxxxxx</p>
                                <p>5:xxxxxxxxx</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value=""required>Agree to all the above terms
                                </label>
                            </div>
                        </form>
                    </form>
                    <div class="form-group">
                        <form action="do_upload.php" method="post" enctype="multipart/form-data">
                            <h2>Upload File</h2>
                            <label for="fileSelect">Filename:</label>
                            <input type="file" name="photo" id="fileSelect">
                            <input type="submit" name="submitPic" value="Upload">
                            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
                        </form>
                    </div>

                    <form method="post">
                        <button name="complete" class="btn btn-primary btn-lg btn-block"  style="background-color: #606EB2;" type="submit" >Submit</button>
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
    $("#clause-btn").click(function() {
        console.log($("#clause-btn").val())
        if ($("#clause-btn").val() == "Show terms") {
            $("#clause-btn").val("Hidden terms");
            $("#clause").css("display", "block");
        } else {
            $("#clause-btn").val("Show terms");
            $("#clause").css("display", "none");
        }
    })
</script>

</body>
</html>
