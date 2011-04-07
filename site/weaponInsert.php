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
	include 'anti_xss.php';
	$weapon_name=anti_xss($_POST["weaponName"]);
	$weapon_type=anti_xss($_POST["weaponType"]);
	$weapon_provider=anti_xss($_POST["weaponProvider"]);
	$weapon_usage= mysqli_real_escape_string($db, anti_xss($_POST["weaponUsage"]));
	$weapon_maintenance=mysqli_real_escape_string($db, anti_xss($_POST["weaponMain"]));
	$weapon_durability=anti_xss($_POST["weaponDurability"]);
	
        
        	
    $query= "INSERT INTO weapons_general (weapon_name, weapon_type, durability, `usage`, maintenance) VALUES('".$weapon_name."','".$weapon_type."','".$weapon_durability."','".$weapon_usage."','".$weapon_maintenance."')";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	

	$result = mysqli_query($db, $query) or die("Errorz zquerying database");

	mysqli_close($db); 
	
	echo "<h1>Thank you for your addition</h1><p>&nbsp;</p>";
	echo "<table border=2 cellpadding=20>";
	echo "<tr><td>Name</td><td> '".$weapon_name."' </td></tr>";
	echo "<tr><td>Type</td><td> '".$weapon_type."' </td></tr>";
	echo "<tr><td>Provider</td><td> '".$weapon_provider."' </td></tr>";
	echo "<tr><td>Usage</td><td> '".$weapon_usage."' </td></tr>";
	echo "<tr><td>Maintenance</td><td> '".$weapon_maintenance."' </td></tr>";
	echo "<tr><td>Durability</td><td> '".$weapon_durability."' </td></tr>";
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

