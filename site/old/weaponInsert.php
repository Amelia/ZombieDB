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
	$weapon_name=$_POST["weaponName"];
	$weapon_type=$_POST["weaponType"];
	$weapon_provider=$_POST["weaponProvider"];
	$weapon_usage=$_POST["weaponUsage"];
	$weapon_maintenance=$_POST["weaponMain"];
	$weapon_durability=$_POST["weaponDurability"];
	
        
        	
        $query= "INSERT INTO weapons_general (weapon_name,weapon_type,durability,provider,maintenance      ) 
	VALUES('".$weapon_name."','".$weapon_type."','".$weapon_durability."','".$weapon_provider."','".$weapon_maintenance."'
)";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	

	$result = mysqli_query($db, $query)
	or die("Error querying database");

	mysqli_close($db); 

	echo $weapon_name;
	echo $weapon_type;
	echo $weapon_provider;
	echo $weapon_usage;
	echo $weapon_maintenance;
	echo $weapon_durability;
		
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

