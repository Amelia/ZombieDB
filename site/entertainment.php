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
	include 'dbconnect.php';
?>
<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
		
			<h1 class="title"> 
			<form action="entertainment.php" method="post" class="searchform">
			Movies
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchm" name="searchm" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			
			<div class="movies">
<?php
	if($_POST['searchm'] != null)
	{
		$search_value = mysql_real_escape_string($_POST['searchm']);		
		$result = mysql_query("SELECT * FROM z_films WHERE title LIKE '%".$search_value."%' OR mpaa_rating LIKE '%".$search_value."%'");
	}
	else
	{
		$result = mysql_query("SELECT * FROM z_films ORDER BY film_id DESC LIMIT 5");
	}
	
	echo "<table border=1 cellpadding=20>
		<tr>
		<th>Title</th>
		<th>Rating</th>
		<th>Description</th>
		</tr>";
		
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['title'] . "</td>";
	   echo "<td>" . $row['mpaa_rating'] . "</td>";
	   echo "<td>" . $row['reasoning'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
	
?>
	 <h4><a href="movieSubmit.php">Suggest a movie we left out?</a></h4>
			</div>
			<p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (0)</a></p>
		</div>
		<div class="post">
			<h1 class="title"> 
			<form action="entertainment.php" method="post" class="searchform">
			Games
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchg" name="searchg" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<div class="games">
<?php
	if($_POST['searchg'] != null)
	{
		$search_value = mysql_real_escape_string($_POST['searchg']);		
		$result = mysql_query("SELECT * FROM z_games WHERE title LIKE '%".$search_value."%' OR esrb_rating LIKE '%".$search_value."%'");
	}
	else
	{
		$result = mysql_query("SELECT * FROM z_games ORDER BY game_id DESC LIMIT 5");
	}
	
	echo "<table border=1 cellpadding=20>
		<tr>
		<th>Title</th>
		<th>Rating</th>
		<th>Description</th>
		</tr>";
		
	while($row = mysql_fetch_array($result))
	   {
	   echo "<tr>";
	   echo "<td>" . $row['title'] . "</td>";
	   echo "<td>" . $row['esrb_rating'] . "</td>";
	   echo "<td>" . $row['reasoning'] . "</td>";
	   echo "</tr>";
	   }
	   echo "</table>";
	
?>
              <h4><a href="gameSubmit.php">Know a good zombie game we're missing? </a></h4>

			</div>
			<p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (0)</a></p>
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
