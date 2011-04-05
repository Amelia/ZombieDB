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
<!-- start header -->

<!-- end header -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
		
			<h1 class="title"> 
			<form action="movie.php" method="post" class="searchform">
			Movies
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;
					<input type="text" id="searchm" name="searchm" />
					<input type="submit" class="formbutton" value="Search" />
					<form action="movie.php" method="post" class="searchform">
					<input type="hidden" id="searchall" name="searchall" value="*" />
					<input type="submit" class="formbutton" value="Show All" />
			</form>
			</form>
			
			</h1>
			
			<div class="movies">
<?php
	if($_POST['searchm'] != null){
		$search_value = mysqli_real_escape_string($db, $_POST['searchm']);		
		$result = mysqli_query($db, "SELECT * FROM z_films WHERE title LIKE '%".$search_value."%' OR mpaa_rating LIKE '%".$search_value."%'");
	}else if($_POST['searchall'] != null){
		$result = mysqli_query($db, "SELECT * FROM z_films ORDER BY film_id");
	}else{
		$result = mysqli_query($db, "SELECT * FROM z_films ORDER BY film_id DESC LIMIT 5");
	}
	
	echo "<table border=1 cellpadding=20>
		<tr>
		<th>Title</th>
		<th>Rating</th>
		<th>Description</th>
		<th>Favorites</th>
		</tr>";
		
	while($row = mysqli_fetch_array($result)){
	   echo "<tr>";
	   echo "<td>" . $row['title'] . "</td>";
	   echo "<td>" . $row['mpaa_rating'] . "</td>";
	   echo "<td>" . $row['reasoning'] . "</td>";
       echo "<td>";
       if (isset($_SESSION['name'])) {
           $addF_condition = mysqli_query($db, "SELECT * FROM users natural join z_film_preferences natural join z_films where users.username = \"" . $_SESSION['name']."\" AND film_id = \"".$row['film_id']."\"");
           if(mysqli_fetch_array($addF_condition) == null){
                    echo "<form action=\"favoriteInsert.php\" method=\"post\" class=\"preferenceform\">
                    <input type=\"hidden\" id=\"film_id\" name=\"film_id\" value=" . $row['film_id'] ." />
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
	}
	echo "</table>";
	

			echo "</div>
				 <p class=\"meta\">";
				 
			if (isset($_SESSION['name'])) {
				echo "<a href=\"movieSubmit.php\">Suggest a movie we left out?</a>";
			}else{
				echo "Login to suggest a Movie";
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
