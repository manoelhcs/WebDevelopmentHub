<?php
 require "../includes/helpers.inc.php";
?>
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
<html>
 <head>
    <title>Create new password</title>
</head>
<body>
        <?php
        $validator = $_GET["validator"];
        
        if(empty($validator)) {
            echo "couldnt validate your request";
        } else {
            if (ctype_xdigit($validator) !== false) {
              ?>
        <form action="../includes/reset-password.inc.php" method ="post">
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="validator" value="<?php echo $validator ?>">
            <input type="password" name="pwd" placeholder ="enter a new password">
            <input type="password" name="pwd-repeat" placeholder ="repeat new password">
            <button type ="submit" name="reset-password-submit">Reset password</button>
        </form>
        
              <?php 
            }
        }
        
        ?>
</body>      
</html>       