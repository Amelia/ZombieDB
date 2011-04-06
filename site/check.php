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

<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<?php
			
				$result = mysqli_query($db, "SELECT * FROM supply_list ORDER BY priority_status DESC");
				echo "<table border=1 cellpadding=20>
					<tr>
					<th>Item</th>
					<th>Priority</th>
					<th>Description</th>
					<th>Got It!</th>
					</tr>";
			
				while($row = mysqli_fetch_array($result)){
				    echo "<tr>";
				    echo "<td>" . $row['item_name'] . "</td>";
				    echo "<td>" . $row['priority_status'] . "</td>";
				    echo "<td>" . $row['usage'] . "</td>";
					echo "<td><INPUT TYPE=CHECKBOX NAME=". $row['item_name'] ."   ></td>";
				echo "</tr>";
				}
			echo "</table>";
		

				echo "</div>
					 <p class=\"meta\">";
					 
				if (isset($_SESSION['name'])) {
					echo "<a href=\"checkSubmit.php\">Suggest a misc item we left out?</a>";
				}else{
					echo "Login to suggest a Misc Item";
				}
				echo "</p>";
			?>
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
