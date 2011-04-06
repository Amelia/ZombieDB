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
	$title = mysqli_real_escape_string($db, anti_xss($_POST["movieTitle"]));
	$mpaa = mysqli_real_escape_string($db, anti_xss($_POST["mpaa"]));
	$release = mysqli_real_escape_string($db, anti_xss($_POST["year"]));        
    $reasoning = mysqli_real_escape_string($db, anti_xss($_POST["reasoning"]));
	$run_time = anti_xss($_POST["run_time"]);
	
	// echo $title;
	// echo $mpaa;
	// echo $release;
	// echo $reasoning;
	// echo $run_time;
	
    $query= "INSERT INTO z_films(title,mpaa_rating,year_released,reasoning, run_time)	VALUES('".$title."','".$mpaa."','".$release."','".$reasoning."', '".$run_time."')";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	
	$result = mysqli_query($db, $query)	or die("Error querying z_database"); 

	mysqli_close($db); 

	echo "<h1>Thank you for your addition</h1><p>&nbsp;</p>";
	echo "<table border=2 cellpadding=20>";
	echo "<tr><td>Name</td><td> '".$title."' </td></tr>";
	echo "<tr><td>Rating</td><td> '".$mpaa."' </td></tr>";
	echo "<tr><td>Release Year</td><td> '".$release."' </td></tr>";
	echo "<tr><td>Usage</td><td> '".$reasoning."' </td></tr>";
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

