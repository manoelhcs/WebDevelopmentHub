<html>
<body>

<?php

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");
/*if($conn)
echo "connected";
else
echo "Note Connected";*/

$sql = "SELECT * FROM idea;";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row ['Idea_content'] . "<br>";
    }
}
?>
<div>Comments:</div>

<?php
$sql = "SELECT * FROM comment;";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);
if(isset($_POST['view'])){
    if ($resultcheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row ['Comment_Employee'] . "   " . $row ['Comment_Details'] . "<br>";
        }
    }
}

?>
<form method="post">
    <button name="view" type="submit" value="HTML">View Comments</button>
</form>
</body>



</html>