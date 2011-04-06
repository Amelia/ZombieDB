<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
<title>Suggest a checklist item for your fellow survivors</title>
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
	$itemName = mysqli_real_escape_string($db, $_POST["itemName"]);
	$itemType = mysqli_real_escape_string($db, $_POST["itemType"]);
	$priority = $_POST["priority"];        
    $quantity = $_POST["quantity"];
	$item_usage = mysqli_real_escape_string($db, $_POST["item_usage"]);
	
    $query= "INSERT INTO supply_list(item_name, item_type, priority_status, quantity, `usage`)
			VALUES('".$itemName."','".$itemType."','".$priority."','".$quantity."', '".$item_usage."')";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	
	$result = mysqli_query($db, $query)	or die("Error querying z_database"); 

	mysqli_close($db); 

	echo "<h1>Thank you for your addition</h1><p>&nbsp;</p>";
	echo "<table border=2 cellpadding=20>";
	echo "<tr><td>Item Name</td><td> '".$itemName."' </td></tr>";
	echo "<tr><td>Item Type</td><td> '".$itemType."' </td></tr>";
	echo "<tr><td>Priority</td><td> '".$priority."' </td></tr>";
	echo "<tr><td>Quantity</td><td> '".$quantity."' </td></tr>";
	echo "<tr><td>Usage</td><td> '".$item_usage."' </td></tr>";
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

