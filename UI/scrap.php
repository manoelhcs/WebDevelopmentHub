
<?php

session_start();

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$sql = "SELECT employee.Employee_Name, topic.Topic_Name , idea.Idea_content, idea.Idea_topic, idea.Idea_id, idea.Idea_Title , idea.Idea_ThumbsUP_Number, idea.Idea_ThumbsDOWN_Number, idea.Idea_Time, department.Department_Name,employee.BLOCK
FROM (((idea
INNER JOIN employee ON Idea_Employee = employee.Employee_Id) 
INNER JOIN department ON Idea_Department = department.Department_Id ) 
INNER JOIN topic ON Idea_Topic = Topic_Id)
ORDER BY idea.Idea_id";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);

foreach($result as $row)
{
    $commentsNumber = 0;

    $ideaID = $row['Idea_id'];
    /*
        $sql2 = "SELECT COUNT(Comment_Idea) as comments FROM comment INNER JOIN idea ON idea.Idea_Id = comment.Comment_Idea WHERE idea.Idea_Id = '".$ideaID."' GROUP BY Comment_Idea";
        $result2 = mysqli_query($conn,$sql2);
        $resultrows = mysqli_num_rows($result2);

        if ($resultrows > 0){

            foreach($result2 as $row2)
            {
                $commentsNumber = $row2['comments'];
            }
        }*/

    $ideas [] = array(
        'ideatopic' => $row['Topic_Name'],
        'ideatitle' => $row['Idea_Title'],
        'employeename' => $row['Employee_Name'],
        'ideacontent' => $row['Idea_content'],
        'ideathumbup' => $row['Idea_ThumbsUP_Number'],
        'ideathumbdown' => $row['Idea_ThumbsDOWN_Number'],
        'ideatime' => $row['Idea_Time'],
        'department' => $row['Department_Name'],
        'id' => $row['Idea_id'],
        'comments' => $commentsNumber
    );
}

session_write_close();
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
                <a class="btn btn-primary btn-sm" href="logout.php" role="button" style="background-color: #606EB2;">Log out</a>
            </div>
        </div>
    </header>
    <!-- Navigation bar nav bootstrap component -->
    <ul class="nav nav-pills nav-justified">
        <!-- Click the jump page, add the active attribute to display the background color -->
        <li role="presentation"><a href="personalInfo.html.php" class=" color-000">Personal page</a></li>
        <li role="presentation"><a href="Mainpage.html.php" class=" color-000">Mainpage</a></li>
        <li role="presentation" class="active"><a href="#" class=" color-000">Ideas</a></li>
    </ul>

    <?php foreach ($ideas as $idea): ?>
    <!-- a tag list group -->
    <div class="list-group">
        <a class="list-group-item" href="details.html.php?idea_id=<?php echo $idea['id'] ?>">
            <div>
                <h6 name="ideas" class="fz-18"><?php echo $idea['ideatitle']; ?></h6>
                <div class="flex-between">
                    <div>
                        <span>Department：<?php echo $idea['department']; ?></span>
                        <span>Deadline：<?php echo $idea['ideatime']; ?></span>
                        <span>Category：<?php echo $idea['ideatopic']; ?></span>
                    </div>
                </div>
            </div>
        </a>
        <a class="list-group-item">
            <div class="flex">
                <div>
                    <div class="flex ideas-box">
                    </div>
                    <div class="flex-around">
                        <p class="fz-12">Number of comments：<?php echo $idea['comments']; ?></p>
                        <div class="pointer">
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

    <div class="list-group">
        <button onclick="location.href = 'addidea.html.php'" name="addIdea" class="btn btn-primary btn-lg btn-block" type="submit"  style="background-color: #606EB2;">Add Idea</button>
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