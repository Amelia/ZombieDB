<?php
	include 'header.php';
	include 'dbconnect.php';
	
?>

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
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"> 
			<form action="weapons.php" method="post" class="searchform">
			Effective General Weapons
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchw" name="searchw" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<div class="weapons">
<?php

  
	if($_POST['searchw'] != null)
	{
		$search_value = mysql_real_escape_string($_POST['searchw']);
	//	echo $_POST['searchw'];
	//	echo $search_value;
		$result = mysql_query("SELECT * FROM weapons_general WHERE weapon_name LIKE '%".$search_value."%' OR weapon_type LIKE '%".$search_value."%'	OR durability LIKE '%".$search_value."%' OR maintenance LIKE '%".$search_value."%'");
	}
	else
	{
		$result = mysql_query("SELECT * FROM weapons_general ORDER BY weapon_id DESC LIMIT 5");
	}
		echo "<table border=1 cellpadding=10 >
		<tr>
		<th>Weapon Name</th>
		<th>Weapon Type</th>
		<th>Durability</th>
		<!-- <th>Provider</th> -->
		<!-- <th>Usage</th> -->
		<th>Maintenance</th>
		</tr>";
		
	
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr><td></td></tr>";
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['weapon_type'] . "</td>";
	   echo "<td>" . $row['durability'] . "</td>";
	   echo "<!-- <td>" . $row['provider'] . "</td> -->";
	   echo "<!-- <td>" . $row['usage'] . "</td> -->";
	   echo "<!-- <td>" . $row['maintenance'] . "</td> -->";
	   echo "<td>" . $row['maintenance'] . "</td>";
	   echo "</tr>";
	   echo "<tr>";
	   echo "<td COLSPAN=4>Usage: " . $row['usage'] . "</td>";
	   echo "</tr>";
	   //echo "<tr>";
	   //echo "<td COLSPAN=4>Maintenance: " . $row['maintenance'] . "</td>";
	   //echo "</tr>";
	   
	   }
	   echo "</table>";				
?>
		   	
	           <h4><a href="weaponSubmit.php">Suggest Aggressive Survival Implement </a></h4>
	               
			</div>
			<p>&nbsp;</p>
			
			<h1 class="title"> 
			<form action="weapons.php" method="post" class="searchform">
			Effective Firearms 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchwf" name="searchwf" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<div class="weapons">
<?php
	if($_POST['searchwf'] != null)
	{
		$search_value = $_POST['searchwf'];
		$result2 = mysql_query("SELECT * FROM weapons_firearms WHERE weapon_name LIKE '%".$search_value."%' OR caliber LIKE '%".$search_value."%' OR rounds_per_reload LIKE '%".$search_value."%'");
	}
	else
	{
		$result2 = mysql_query("SELECT * FROM weapons_firearms ORDER BY firearm_id DESC LIMIT 5");
	}
		echo "<table border=1 cellpadding=15>
		<tr>
		<th>Weapon Name</th>
		<th>Caliber</th>
		<th>Rounds_per_Reload</th>
		<!-- <th>Usage</th> -->
		</tr>";
		
	
	while($row = mysql_fetch_array($result2))
	   {
	   echo "<tr><td></td></tr>";
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['caliber'] . "</td>";
	   echo "<td>" . $row['rounds_per_reload'] . "</td>";
	   //echo "<td>" . $row['usage'] . "</td>";
	   echo "</tr>";
	   echo "<tr>";
	   echo "<td COLSPAN=4>Usage: " . $row['usage'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
		
				
?>
		   	
	           <h4><a href="firearmSubmit.php">Suggest Aggressive Firearm Implement </a></h4>
	               
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
<div id="footer">
	<p>&copy;2007 All Rights Reserved &nbsp;&bull;&nbsp; Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a> &nbsp;&bull;&nbsp; Icons by <a href="http://www.famfamfam.com/">FAMFAMFAM</a>.</p>
</div>
</body>
</html>
