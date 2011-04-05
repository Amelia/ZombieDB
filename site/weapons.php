<?php
	session_start();
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


<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"> 
			<form action="weapons.php" method="post" class="searchform">
			Effective General Weapons
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchw" name="searchw" />
					<input type="submit" class="formbutton" value="Search" />
					<form action="weapons.php" method="post" class="searchform">
					<input type="hidden" id="searchall" name="searchall" value="*" />
					<input type="submit" class="formbutton" value="Show All" />
			</form>
			</h1>
			<div class="weapons">
<?php

  
	if($_POST['searchw'] != null)
	{
		$search_value = mysqli_real_escape_string($db, $_POST['searchw']);
	//	echo $_POST['searchw'];
	//	echo $search_value;
		$result = mysqli_query($db, "SELECT * FROM weapons_general WHERE weapon_name LIKE '%".$search_value."%' OR weapon_type LIKE '%".$search_value."%' OR durability LIKE '%".$search_value."%' OR maintenance LIKE '%".$search_value."%'");
	}
	else if($_POST['searchall'] != null)
	{
		$result = mysqli_query($db, "SELECT * FROM weapons_general ORDER BY weapon_id DESC");
	}
	else
	{
		$result = mysqli_query($db, "SELECT * FROM weapons_general ORDER BY weapon_id DESC LIMIT 5");
	}
		echo "<table border=1 cellpadding=10 >
		<tr>
		<th>Weapon Name</th>
		<th>Weapon Type</th>
		<th>Durability</th>
		<th>Maintenance</th>
		<th>Favorites</th>
		<th>&nbsp;</th>
		</tr>";
		
	
	while($row = mysqli_fetch_array($result))
	   {
	   echo "<tr><td></td></tr>";
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['weapon_type'] . "</td>";
	   echo "<td>" . $row['durability'] . "</td>";
	   //echo "<!-- <td>" . $row['provider'] . "</td> -->";
	   //echo "<!-- <td>" . $row['usage'] . "</td> -->";
	   //echo "<!-- <td>" . $row['maintenance'] . "</td> -->";
	   echo "<td>" . $row['maintenance'] . "</td>";
       echo "<td>";

	   if (isset($_SESSION['name'])) {
           $addW_condition = mysqli_query($db, "SELECT * FROM users natural join weapon_preferences natural join weapons_general where users.username = \"" . $_SESSION['name']."\" AND weapon_id = \"".$row['weapon_id']."\"");
           if(mysqli_fetch_array($addW_condition) == null){
                    echo "<form action=\"favoriteInsert.php\" method=\"post\" class=\"preferenceform\">
                    <input type=\"hidden\" id=\"weapon_id\" name=\"weapon_id\" value=" . $row['weapon_id'] ." />
                    <input type=\"submit\" class=\"formbutton\" value=\"Add to Favorites\" />
                    </form>";
           }
           else{
               //print_r(mysqli_fetch_array($addW_condition));
               echo "Already Favorited";
           }
       }else{
            echo "Login to Favorite ";
       }
       echo "</td>";
	   echo "</tr>";
	   echo "<tr>";
	   echo "<td COLSPAN=5>Usage: " . $row['usage'] . "</td>";
	   echo "</tr>";
	   //echo "<tr>";
	   //echo "<td COLSPAN=4>Maintenance: " . $row['maintenance'] . "</td>";
	   //echo "</tr>";
	   
	   }
	   echo "</table>";				

		echo "</div>
		 <p class=\"meta\">";
		 
		   	if (isset($_SESSION['name'])) {
	            echo "<a href=\"weaponSubmit.php\">Suggest General Weapon Implement </a>";
			}else{
				echo "Login to suggest a General Weapon";
			}
		echo "</p>";
?>	               
			<p>&nbsp;</p>
			
			<h1 class="title"> 
			<form action="weapons.php" method="post" class="searchform">
			Effective Firearms 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchwf" name="searchwf" />
					<input type="submit" class="formbutton" value="Search" />
					<form action="weapons.php" method="post" class="searchform">
					<input type="hidden" id="searchall2" name="searchall2" value="*" />
					<input type="submit" class="formbutton" value="Show All" />
			</form>
			</h1>
			<div class="weapons">
<?php
	if($_POST['searchwf'] != null)
	{
		$search_value = $_POST['searchwf'];
		$result2 = mysqli_query($db, "SELECT * FROM weapons_firearms WHERE weapon_name LIKE '%".$search_value."%' OR caliber LIKE '%".$search_value."%' OR rounds_per_reload LIKE '%".$search_value."%'");
	}
	else if($_POST['searchall2'] != null)
	{
		$result2 = mysqli_query($db, "SELECT * FROM weapons_firearms ORDER BY firearm_id DESC");	
	}
	else
	{
		$result2 = mysqli_query($db, "SELECT * FROM weapons_firearms ORDER BY firearm_id DESC LIMIT 5");
	}
		echo "<table border=1 cellpadding=15>
		<tr>
		<th>Weapon Name</th>
		<th>Caliber</th>
		<th>Rounds per Reload</th>
		<th>Favorites</th>
		</tr>";
		
	
	while($row = mysqli_fetch_array($result2))
	   {
	   echo "<tr><td></td></tr>";
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['caliber'] . "</td>";
	   echo "<td>" . $row['rounds_per_reload'] . "</td>";
	   //echo "<td>" . $row['usage'] . "</td>";
       echo "<td>";
       if (isset($_SESSION['name'])) {
           $addF_condition = mysqli_query($db, "SELECT * FROM users natural join weapon_firearm_preferences natural join weapons_firearms where users.username = \"" . $_SESSION['name']."\" AND firearm_id = \"".$row['firearm_id']."\"");
           if(mysqli_fetch_array($addF_condition) == null){
                    echo "<form action=\"favoriteInsert.php\" method=\"post\" class=\"preferenceform\">
                    <input type=\"hidden\" id=\"firearm_id\" name=\"firearm_id\" value=" . $row['firearm_id'] ." />
                    <input type=\"submit\" class=\"formbutton\" value=\"Add to Favorites\" />
                    </form>";
           }
           else{
               //print_r(mysqli_fetch_array($addW_condition));
               echo "Already Favorited";
           }
       }else{
           echo "Log in to Favorite";
       }
       echo "</td>";
	   echo "</tr>";
	   echo "<tr>";
	   echo "<td COLSPAN=5>Usage: " . $row['usage'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
	   
	   echo "</div>
		 <p class=\"meta\">";
		
		   	if (isset($_SESSION['name'])) {
	            echo "<a href=\"firearmSubmit.php\">Suggest Aggressive Firearm Implement </a>";
			}else{
				echo "Login to suggest an Agressive Firearm";
			}
		echo "</p>";
?>	        
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
