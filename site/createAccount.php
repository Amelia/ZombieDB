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
<body>

<div id="page">
	<!-- start content -->
	<div id="content">

<p>Please provide us with the following information in order to create your account.
A unique username is required.</p>


<form method="post" action="registerAccount.php">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" /><br />
				<label for="pw">Password:</label>
				<input type="password" id="pw" name="pw" /><br /><p></p>
				<table><tr>
				<td><input type="submit" value="Register" name="submit" /></td>
			</form>
			</table>
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
