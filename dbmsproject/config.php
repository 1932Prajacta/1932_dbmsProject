<?php
/*
//details of database
define( "DB_HOST", "localhost" );
define( "DB_USER", "root" );
define( "DB_PASSWORD", "" );
define( "DB_NAME", "pms" );

*/

session_start();
	$db = mysqli_connect('localhost', 'root', '', 'admin');
	mysqli_select_db($db,'admin') or die("could not select database");

	// initialize variables
	$id = 0;
	$f_name = "";
	$l_name = "";
	
	$gender = "";
	$dob = "";
	$address = "";
	$phone = "";
	$email = "";
	$update = false;
?>
