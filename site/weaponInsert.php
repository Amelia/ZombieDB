<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
<title>Suggest information on a weapon for your fellow survivors</title>
</head>
<!-- start header -->
<?php
	include 'header.php';
	include 'dbconnect.php';
?>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	
	<?php
	$weapon_name=$_POST["weaponName"];
	$weapon_type=$_POST["weaponType"];
	$weapon_provider=$_POST["weaponProvider"];
	$weapon_usage=$_POST["weaponUsage"];
	$weapon_maintenance=$_POST("weaponMain");
	$weapon_name=$_POST["weaponDurability"];
	
	
	?>