<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
<!-- start header -->
<?php
	include 'header.php';
?>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"> Effective General Weapons 
			<form action="search.php" method="post" class="searchform">
					<input type="text" id="searchw" name="searchw" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<!-- Need to display weapons-->
			<div class="weapons">
				<table border=1 cellpadding=20 width=530>
					<tr><th>Weapon</th><th>Effectiveness</th><th>Ammo Availablity</th></tr>
					<tr><td>Gun</td><td>8</td><td>Medium</td>
				</table>
		   	
	           <h4><a href="weaponSubmit.php">Suggest Aggressive Survival Implement </a></h4>
	               
			</div>
			<h1 class="title"> Effective Firearms 
			<form action="search.php" method="post" class="searchform">
					<input type="text" id="searchwf" name="searchwf" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<!-- Need to display firearms-->
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
<div id="footer">
	<p>&copy;2007 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a> &nbsp;&bull;&nbsp; Icons by <a href="http://www.famfamfam.com/">FAMFAMFAM</a>.</p>
</div>
</body>
</html>
