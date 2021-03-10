<?php
session_start();

$conn = new mysqli("178.79.153.56","compteam_manoel","comp1640_pass","compteam_COMP1640_database");
/*if($conn)
echo "connected";
else
echo "Note Connected";*/

$msg="";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $userType = $_POST['userType'];
    
    $sql = "SELECT * FROM employee WHERE Employee_Email=? AND Employee_Password=? AND Employee_Department=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$username,$password,$userType);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    session_regenerate_id();
    $_SESSION['username'] = $row['Employee_Email'];
    $_SESSION['role'] = $row['Employee_Department'];
    session_write_close();
    
    if($result->num_rows==1 && $_SESSION['role']=="1"){
        header("location:../comp.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="2"){
        header("location:../ACAD.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="3"){
        header("location:../*ACCO_Page*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="4"){
        header("location:../*ENVT_Page*.html.php");
    }
    else if($result->num_rows==1 && $_SESSION['role']=="5"){
        header("location:../*LAW_Page*.html.php");
    }
    else{
        $msg = "username or password is incorrect";
    }
}

?>
<html>
<head>
<meta charset="utf-8">
<title>Multi user login system</title>
</head>
 
<body>
<form method="post">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">
Username:<input type="text" name="username" class="form-control form-control-lg" placeholder="Username"required>
Password:<input type="password" name="password" class=" form-control form-control-lg" placeholder="Password">
<div class="form-group lead">
<label for="userType">I'm a :</label> 
<input type="radio" name="userType" value="1" class="custom-radio" required>&nbsp;Comp |
<input type="radio" name="userType" value="2" class="custom-radio" required>&nbsp;acad |
<input type="radio" name="userType" value="3" class="custom-radio" required>&nbsp;Site Administrator |
</div>
<div class="form-group">
<input type="submit" name="login" class="btn btn-danger btn-block">
</div>
<h5 class="text-danger text-center"><?= $msg; ?></h5>
    <a href="reset-password.php">Forgot your password?</a>
    <a href="signup.html.php?add">Register</a>
    <a href="test.html.php">Return To Homepage</a>
</form>
</form>
</body>
</html>
  <style>
         body{
             background-color:floralwhite
         }
         h1 {
             font-family: Helvetica;
             text-align:center;
             background-color:lemonchiffon;
         }
         a:link, a:visited {
  background-color:#FFC300  ;
  color: white;
  padding: 14px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #DAF7A6;
}
     </style>