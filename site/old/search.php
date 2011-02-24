<?php
	include('dbconnect.php');
	
		
	mysql_select_db("zombiedb", $db);

	if($_POST['searchw'] != null)
	{
		$search_value = $_POST['searchw'];
		
		echo "<table border=1 cellpadding=20 width=530>
		<tr>
		<th>Weapon Name</th>
		<th>Weapon Type</th>
		<th>Durability</th>
		<th>Provider</th>
		<th>Usage</th>
		<th>Maintenance</th>
		</tr>"
		
	$result = mysql_query("SELECT * FROM weapons_general WHERE weapon_name LIKE '%".$search_value."%' OR weapon_type LIKE '%".$search_value."%' OR durability LIKE '%".$search_value."%' OR provider LIKE '%".$search_value."%'	OR usage LIKE '%".$search_value."%' OR maintenance LIKE '%".$search_value."%' ");
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['weapon_type'] . "</td>";
	   echo "<td>" . $row['durability'] . "</td>";
	   echo "<td>" . $row['provider'] . "</td>";
	   echo "<td>" . $row['usage'] . "</td>";
	   echo "<td>" . $row['maintenance'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
		
	}
	
	if($_POST['searchwf'] != null)
	{
		$search_value = $_POST['searchwf'];
		
		echo "<table border=1 cellpadding=20 width=530>
		<tr>
		<th>Weapon Name</th>
		<th>Caliber</th>
		<th>Rounds_per_Reload</th>
		<th>Usage</th>
		</tr>"
		
	$result = mysql_query("SELECT * FROM weapons_firearms WHERE weapon_name LIKE '%".$search_value."%' OR caliber LIKE '%".$search_value."%' OR rounds_per_reload LIKE '%".$search_value."%' OR usage LIKE '%".$search_value."%'");
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['weapon_name'] . "</td>";
	   echo "<td>" . $row['caliber'] . "</td>";
	   echo "<td>" . $row['rounds_per_reload'] . "</td>";
	   echo "<td>" . $row['usage'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
		
	}
	
	if($_POST['searchm'] != null)
	{
		$search_value = $_POST['searchm'];
		
	echo "<table border=1 cellpadding=20 width=530>
		<tr>
		<th>Title</th>
		<th>Rating</th>
		<th>Description</th>
		</tr>"
		
	$result = mysql_query("SELECT * FROM z_films WHERE title LIKE '%".$search_value."%' OR mpaa_rating LIKE '%".$search_value."%' OR run_time LIKE '%".$search_value."%' OR year_released LIKE '%".$search_value."%' OR reasoning LIKE '%".$search_value."%'");
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['title'] . "</td>";
	   echo "<td>" . $row['mpaa_rating'] . "</td>";
	   echo "<td>" . $row['reasoning'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
	}
	
	if($_POST['searchg'] != null)
	{
		$search_value = $_POST['searchg'];
		
	echo "<table border=1 cellpadding=20 width=530>
		<tr>
		<th>Title</th>
		<th>Rating</th>
		<th>Description</th>
		</tr>"
		
	$result = mysql_query("SELECT * FROM z_games WHERE title LIKE '%".$search_value."%' OR esrb_rating LIKE '%".$search_value."%' OR year_released LIKE '%".$search_value."%' OR reasoning LIKE '%".$search_value."%'");
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['title'] . "</td>";
	   echo "<td>" . $row['esrb_rating'] . "</td>";
	   echo "<td>" . $row['year_released']."</td>";
	   echo "<td>" . $row['reasoning'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
	}

?>