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


                <table>
                <tr>
                <td align="left"> <h1 class="title">Name:</h1></td>
                <td align="center"><?php echo $_SESSION['name']; ?></td>
                </tr>
                </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
<!--
//======================================================================================================================
                                                Weapons
//======================================================================================================================
-->
            <h1 class="title">
			Favorite Weapons:
			</h1>
			<div class="weapons">
            <table border=1 cellpadding=15>
<?php

	$result = mysqli_query($db, "select * from users natural join weapon_preferences natural join weapons_general where username = '" . $_SESSION['name']."'");

	while($row = mysqli_fetch_array($result))
	   {
           echo "<tr>";
           echo "<td>" . $row['weapon_name'] . "</td><td></td>";
           echo "<td>";
           echo "<form action=\"favoriteRemove.php\" method=\"post\" class=\"preferenceform\">
				<input type=\"hidden\" id=\"weapon_id\" name=\"weapon_id\" value=" . $row['weapon_id'] ." />
			    <input type=\"submit\" class=\"formbutton\" value=\"Remove from Favorites\" />
			    </form>";
           echo "</td>";
           echo "</tr>";
	   }
?>

            </table>
			<p>&nbsp;</p>
            </div>             
<!--
//======================================================================================================================
                                                Firearms
//======================================================================================================================
-->
            <div class="firearms">
			<h1 class="title">
			Favorite Firearms:
			</h1>

            <table border=1 cellpadding=15>
<?php

	$result = mysqli_query($db, "select * from users natural join weapon_firearm_preferences natural join weapons_firearms where username = '" . $_SESSION['name']."'");


	while($row = mysqli_fetch_array($result))
	   {
           echo "<tr>";
           echo "<td>" . $row['weapon_name'] . "</td><td></td>";
           echo "<td>";
           echo "<form action=\"favoriteRemove.php\" method=\"post\" class=\"preferenceform\">
				<input type=\"hidden\" id=\"firearm_id\" name=\"firearm_id\" value=" . $row['firearm_id'] ." />
			    <input type=\"submit\" class=\"formbutton\" value=\"Remove from Favorites\" />
			    </form>";
           echo "</td>";
           echo "</tr>";
	   }
?>
            </table>
            <p>&nbsp;</p>
		    </div>

<!--
//======================================================================================================================
                                                Movies
//======================================================================================================================
-->
            <div class="films">
			<h1 class="title">
			Favorite Movies:
			</h1>

            <table border=1 cellpadding=15>
<?php

	$result = mysqli_query($db, "select * from users natural join z_film_preferences natural join z_films where username = '" . $_SESSION['name']."'");


	while($row = mysqli_fetch_array($result))
	   {
           echo "<tr>";
           echo "<td>" . $row['title'] . "</td><td></td>";
           echo "<td>";
           echo "<form action=\"favoriteRemove.php\" method=\"post\" class=\"preferenceform\">
				<input type=\"hidden\" id=\"film_id\" name=\"film_id\" value=" . $row['film_id'] ." />
			    <input type=\"submit\" class=\"formbutton\" value=\"Remove from Favorites\" />
			    </form>";
           echo "</td>";
           echo "</tr>";
	   }
?>
            </table>
            <p>&nbsp;</p>
		    </div>
<!--
//======================================================================================================================
                                                Books
//======================================================================================================================
-->
            <div class="books">
			<h1 class="title">
			Favorite Books:
			</h1>

            <table border=1 cellpadding=15>
<?php

	$result = mysqli_query($db, "select * from users natural join z_book_preferences natural join z_books where username = '" . $_SESSION['name']."'");


	while($row = mysqli_fetch_array($result))
	   {
           echo "<tr>";
           echo "<td>" . $row['title'] . "</td><td></td>";
           echo "<td>";
           echo "<form action=\"favoriteRemove.php\" method=\"post\" class=\"preferenceform\">
				<input type=\"hidden\" id=\"book_id\" name=\"book_id\" value=" . $row['book_id'] ." />
			    <input type=\"submit\" class=\"formbutton\" value=\"Remove from Favorites\" />
			    </form>";
           echo "</td>";
           echo "</tr>";
	   }
?>
            </table>
            <p>&nbsp;</p>
		    </div>
<!--
//======================================================================================================================
                                                Games
//======================================================================================================================
-->
            <div class="games">
			<h1 class="title">
			Favorite Games:
			</h1>

            <table border=1 cellpadding=15>
<?php

	$result = mysqli_query($db, "select * from users natural join z_game_preferences natural join z_games where username = '" . $_SESSION['name']."'");


	while($row = mysqli_fetch_array($result))
	   {
           echo "<tr>";
           echo "<td>" . $row['title'] . "</td><td></td>";
           echo "<td>";
           echo "<form action=\"favoriteRemove.php\" method=\"post\" class=\"preferenceform\">
				<input type=\"hidden\" id=\"game_id\" name=\"game_id\" value=" . $row['game_id'] ." />
			    <input type=\"submit\" class=\"formbutton\" value=\"Remove from Favorites\" />
			    </form>";
           echo "</td>";
           echo "</tr>";
	   }
?>
            </table>
            <p>&nbsp;</p>
		    </div>

	</div>
    <!-- end post -->
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
