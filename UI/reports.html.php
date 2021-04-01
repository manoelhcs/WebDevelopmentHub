
<?php

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");

$sql = "SELECT Idea_Department, COUNT(Idea_Department) as depCount, department.Department_Name
FROM idea INNER JOIN department ON department.Department_Id =idea.Idea_Department
GROUP BY Idea_Department";
$result = mysqli_query($conn,$sql);
$resulttete = mysqli_num_rows($result);

if ($resulttete > 0){
    foreach($result as $row)
    {
        $reportIdeas [] = array(
            'label' => $row['Department_Name'],"y"=> $row['depCount']);
    }
}else{
    $reportIdeas = [];
}

$sql2 = "SELECT Idea_Department, department.Department_Name,
       count(Idea_Department) as depCount,
       count(Idea_Department) * 100.0 / (select count(*) from idea) as idea
FROM idea
INNER JOIN department ON department.Department_Id = idea.Idea_Department
group by Idea_Department";
$result2 = mysqli_query($conn,$sql2);
$resulttete2 = mysqli_num_rows($result2);

if ($resulttete2 > 0){
    foreach($result2 as $row2)
    {
        $ideasPercentage [] = array(
            'label' => $row2['Department_Name'],"y"=> $row2['idea']);
    }
}else{
    $ideasPercentage = [];
}

$sql3 = "SELECT DISTINCT Idea_Title FROM idea INNER JOIN comment WHERE idea.Idea_Id NOT IN (SELECT Comment_Idea FROM comment)";
$result3 = mysqli_query($conn,$sql3);
$resulttete3 = mysqli_num_rows($result3);

if ($resulttete3 > 0){
    foreach($result3 as $row3)
    {
        $ideas [] = array(
            'idea' => $row3['Idea_Title']
        );
    }
}else{
    $ideas = [];
}

$sql4 = "SELECT Comment_Details FROM comment WHERE comment_anon = 1";
$result4 = mysqli_query($conn,$sql4);
$resulttete4 = mysqli_num_rows($result4);

if ($resulttete4 > 0){
    foreach($result4 as $row4)
    {
        $comments [] = array(
            'comment' => $row4['Comment_Details']
        );
    }
}else{
    $comments = [];
}



$dataPoints = array(
	array("label"=>"Chrome", "y"=>64.02),
	array("label"=>"Firefox", "y"=>12.55),
	array("label"=>"IE", "y"=>8.47),
	array("label"=>"Safari", "y"=>6.08),
	array("label"=>"Edge", "y"=>4.29),
	array("label"=>"Others", "y"=>4.59)
)

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Number of ideas made by each Department"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#0",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($reportIdeas, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "Percentage of ideas by each Department"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#0",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($ideasPercentage, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

    var chart3 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        title: {
            text: "third one"
        },
        subtitles: [{
            text: ""
        }],
        data: [{
            type: "pie",
            yValueFormatString: "#0",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();

}
</script>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <link rel="stylesheet" type="text/css" href="css/topic.css" />
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div class="container" id="linear">
    <div class="list-group">
        <a class="list-group-item">
            <div class="flex">
                <div>Comments Without Ideas
                    <div class="flex ideas-box">
                        <ul class="list-group">
                            <?php foreach ($ideas as $idea): ?>
                            <li class="list-group-item"><?php echo $idea['idea']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="flex-around">
                    </div>
                </div>
            </div>
            <div class="flex">
                <div>Anonymous Comments
                    <div class="flex ideas-box">
                        <ul class="list-group">
                            <?php foreach ($comments as $comment): ?>
                                <li class="list-group-item"><?php echo $comment['comment']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="flex-around">
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<!-- jQuery.js -->
<script src="./lib/jQuery/jquery-3.4.1.min.js"></script>
<!-- Bootstrap.js -->
<script src="./lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>