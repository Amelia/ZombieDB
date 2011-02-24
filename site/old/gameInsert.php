<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
	$title=$_POST["gameTitle"];
	$esrb=$_POST["esrb"];
	$release=$_POST["year"];        
        $reasoning=$_POST["reasoning"];
	
        $query= "INSERT INTO z_games(title,esrb_rating,year_released,reasoning) 
	VALUES('".$title."','".$esrb."','".$release."','".$reasoning."')";

	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	

	$result = mysqli_query($db, $query)
	or die("Error querying database"); 

	mysqli_close($db); 

	echo $title;
	echo $esrb;
	echo $release;
	echo $reasoning; 
		
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

