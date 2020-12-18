<?php
	session_start();
	
	require("conection/config.php");
	
	$msg="";

	if(isset($_POST['btn_log'])){
	header("location: all.php");
}
					
?>


<!DOCTYPE html>  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="css/login.css" />
<title>College Management System.</title>
</head>

<body>
	<div class="container">
    	<div class="container2">
    		<div class="h1_pos">
    			<h1>Log In</h1>
    		</div><br><br><br>
    		<form method="post">
                    <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                    <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
    		<input type="submit" href="all.php" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
    		</form>
    	</div>
    </div>

    <div class="user">
        <div class="user2">
                <div class="h2_pos">
                    <h2> User LogIn</h2>
                </div><br><br><br>
                <form method="post">
                     <input type="text" class="form-control" name="unametxt" placeholder="Username" title="Enter username here" /><br>
                     <input type="password" class="form-control" name="pwdtxt" placeholder="Password" title="Enter username here" /><br>
                    <input type="submit" href="all.php" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
                </form>
        </div>
    </div>
	
        <h2 style="color: #3a28a5; text-align: center;">
            <?php  $msg; ?>
        </h2>    
</body>
</html>
