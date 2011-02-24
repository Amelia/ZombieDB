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
			<h1 class="title">Movies 
			<form action="search.php" method="post" class="searchform">
					<input type="text" id="searchm" name="searchm" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<div class="movies">
				<table border=1 cellpadding=20 width=530>
					<tr><th>Movie</th><th>Rating</th><th>Description</th></tr>
					<tr><td>28 Days Later</td><td>8</td><td>It's about Zombies for 28 days</td>
				</table>
	 <h4><a href="movieSubmit.php">Suggest a movie we left out?</a></h4>
			</div>
			<p class="meta"><a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">Comments (0)</a></p>
		</div>
		<div class="post">
			<h1 class="title">Games 
			<form action="search.php" method="post" class="searchform">
					<input type="text" id="searchg" name="searchg" />
					<input type="submit" class="formbutton" value="Search" />
			</form>
			</h1>
			<div class="games">
				<table border=1 cellpadding=20 width=530>
					<tr><th>Game</th><th>Rating</th><th>Description</th></tr>
					<tr><td>Left4Dead</td><td>9</td><td>It's more about infected but, whatevs</td>
				</table>
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
