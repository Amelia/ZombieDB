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


$name=mysqli_real_escape_string($db,$name);
$pw=mysqli_real_escape_string($db,$pw);

$compareQuery="SELECT username FROM users ";
$compareResult=mysqli_query($db, $compareQuery) or die("Error Querying Database");
if(!isset($checkName))
	$checkName=NULL;
while($row=mysqli_fetch_array($compareResult) and $checkName!=$name){
  $checkName=$row['username'];
//echo "<tr><td >$checkName</td>></tr>\n"; //Who put this here without a debugging comment?!?!?!?!?!?!

}

 if($checkName==$name){
  echo "We're sorry, but that username has already been taken!";
?>
 <p><a href="createAccount.php">Try Another Username</a></p>

<?php  
}else{
	$query = "INSERT INTO users (username, password) VALUES('".$name."', '".SHA1($pw)."')";
	$result = mysqli_query($db, $query) or die("Error Querying Database");  
	sleep(3);
	mysqli_close($db);
   echo "<p>Thank you ".$name. ", your account has been successfully created!</p>";
   echo "<p>Please Sign in to your left.</p>";
	
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
