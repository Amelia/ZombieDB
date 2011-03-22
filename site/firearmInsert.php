<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
<title>Suggest information on a weapon for your fellow survivors</title>
</head>
<!-- start header -->
<div id="wrapper">
<!-- Header -->
<?php 
	include 'header.php'; 
	include 'dbconnect.php';
?>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">

	<?php
	$weapon_name=$_POST["firearmName"];
	$weapon_caliber=$_POST["firearmCaliber"];
	$weapon_rounds=$_POST["rounds_per_reload"];
	$weapon_usage=mysqli_real_escape_string($db, $_POST["weaponUsage"]);

	
        
        	
        $query= "INSERT INTO weapons_firearms (weapon_name,caliber, rounds_per_reload, `usage`) 
	VALUES('".$weapon_name."','".$weapon_caliber."','".$weapon_rounds."','".$weapon_usage."')";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	

	$result = mysqli_query($db, $query)
	or die("Error querying database");

	mysqli_close($db); 
	
	echo "<h1>Thank you for your addition</h1><p>&nbsp;</p>";
	echo "<table border=2 cellpadding=20>";
	echo "<tr><td>Name</td><td> '".$weapon_name."' </td></tr>";
	echo "<tr><td>Caliber</td><td> '".$weapon_caliber."' </td></tr>";
	echo "<tr><td>Rounds Per Reload</td><td> '".$weapon_rounds."' </td></tr>";
	echo "<tr><td>Usage</td><td> '".$weapon_usage."' </td></tr>";
	echo "</table>";
		
	?>
	</div>
		</div>
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

