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
	$bookName = mysqli_real_escape_string($db, $_POST["bookName"]);
	$isbn = mysqli_real_escape_string($db, $_POST["isbn"]);
	//$author = mysqli_real_escape_string($db, $_POST["author"]);
	$published = mysqli_real_escape_string($db, $_POST["year"]); 
	$pages = $_POST["pages"];
	$reason = mysqli_real_escape_string($db, $_POST["reason"]);
	
    $query= "INSERT INTO z_books(title, isbn, page_count, year_published, reasoning)
			VALUES('".$bookName."','".$isbn."','".$pages."', '".$published."', '".$reason."')";
	$db= mysqli_connect('localhost', 'zombieUser', 'zombie', 'zombiedb')
	or die ("ERROR: connecting to mysql server!");	
	$result = mysqli_query($db, $query)	or die("Error querying z_database"); 

	mysqli_close($db); 

	echo "<h1>Thank you for your addition</h1><p>&nbsp;</p>";
	echo "<table border=2 cellpadding=20>";
	echo "<tr><td>Book Name</td><td> '".$bookName."' </td></tr>";
	echo "<tr><td>ISBN</td><td> '".$isbn."' </td></tr>";
	echo "<tr><td>Page Count</td><td> '".$pages."' </td></tr>";
	echo "<tr><td>Published Date</td><td> '".$published."' </td></tr>";
	echo "<tr><td>Reasoning</td><td> '".$reason."' </td></tr>";
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

