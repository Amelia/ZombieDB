<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates

Name       : Red Roses Description: A two-column, fixed-width design.
Version    : 1.0
Released   : 20080208
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Zombie Apocalypse Survival</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
<!-- Header -->
<?php 
	include 'header.php'; 
?>


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">

<?php



include "dbconnect.php";
include "anti_xss.php";
$name = anti_xss($_POST['username']);
$pw = $_POST['pw'];
$newPW = $_POST['newpw'];

$name=mysqli_real_escape_string($db,$name);
$pw=mysqli_real_escape_string($db,$pw);


	$name = mysqli_real_escape_string($db,$name);
	$pw = mysqli_real_escape_string($db,$pw);
    $newPW = mysqli_real_escape_string($db, $newPW);

	$query = "select * from users WHERE username = \"".$name."\" AND password = sha1('".$pw."');";
	$result = mysqli_query($db, $query);




if (mysqli_fetch_array($result) != null){

//*************************************
//** IF USER IS VALID, UPDATE PASSWD **
//** $_POST['newpw'] --> new passwd  **
//*************************************

//Update the database here
$query = "UPDATE users SET password = \"".sha1($newPW)."\" where username = \"".$name."\";";
$result = mysqli_query($db, $query);

	echo "Your password has been updated successfully.";
}
else //This means the user/password was invalid
{
   echo "<p>We're sorry ".$name. ", your username and/or old password did not match our database.  For your security, we cannot update your account without this information.</p>";
   echo "<p>Please use your browser's back button to go back and try again.</p>";
	
}
?>  
</div>
	<!-- end content -->
	<!-- start sidebar -->
	<?php
		include "sidebar.php";
	?>
	<!-- end sidebar -->
</div>
</div>
<!-- end page -->
<div id="footer">
	<p>&copy;20011 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a> &nbsp;&bull;&nbsp; Icons by <a href="http://www.famfamfam.com/">FAMFAMFAM</a>.</p>
</div>

</body>
</html>
