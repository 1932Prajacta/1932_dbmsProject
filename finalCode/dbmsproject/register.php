<?php
	session_start();
	
	require("conection/config.php");
	
	$msg="";

	if(isset($_POST['btn_log'])){
	header("location: all.php");
}
					
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login and Registration form example</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
 
<body bgcolor="#E6E6FA">
 
<form name="regi" action="register1.jsp" method="post">
<h2>Registration Form</h2>
 
<label for="r1" id="fn">First Name :</label>
<input type="text" name="fname" id="r1"><br/>
 
<label  for="r2" id="ln">Last Name :</label>
<input type="text" name="lname" id="r2"><br/>
 
<label  for="r3" id="un">Username :</label>
<input type="text" name="uname" id="r3"><br/>
 
<label  for="r4" id="pwd">Password :</label>
<input type="password" name="pass" id="r4"><br/>
 
<label  for="r5" id="em">Email :</label>
<input type="text" name="email" id="r5"><br/>
 
<label  for="r6" id="mn">Mobile No :</label>
<input type="text" name="mno" id="r6"><br/>
 
<label for="r8" id="cy">City:</label>
 
<select name="ct" id="r8">
<option>Select</option>
<option>Panjim</option>
<option>Margao</option>
<option>Vasco</option>
<option>Bicholim</option>
<option>Valpoi</option>
<option>Marcel</option>
<option>Mapusa</option>
</select><br/><br/>
 
<button type="submit" href="all2.php" class="btn btn-default" name="btn_log" value="Submit" id="button">Register</button>
<a href="login3.php">Back to Home</a>

</form>
 
<script type="text/javascript">
function save(){
var user = document.getElementById("user").value;
var pwd = document.getElementById("pwd").value;
alert("username"+user+"password"+pwd);
}
</script>
 
</body>
</html>