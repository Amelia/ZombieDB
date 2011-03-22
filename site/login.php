<?php 
		session_start();
	include "dbconnect.php";
	include "header.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
	<div id="page">
		<div id="content">
			<?php
  
				$name = $_POST['username'];
				$pw = $_POST['pw'];
				$name = mysqli_real_escape_string($db,$name);
				$pw = mysqli_real_escape_string($db,$pw);

				$query = "select * from users WHERE username = '$name' AND password = sha('$pw')";
				$result = mysqli_query($db, $query);
				//echo"<p>check1</p>"; 
				if ($row = mysqli_fetch_array($result)){
					//echo"<p>check2</p>"; 	
					echo "<p>Thanks for logging in, $name</p>\n";
					echo "<p><a href=\"index.php\">Continue</a></p>";
		
					$_SESSION['name']=$name;
					$_SESSION['pw']=$pw;
				}else{
					//echo "<p>check3</p>"; 
					echo "<table>";
					echo "<td><img src=\"images/flyer.png\" width=\"255\" height=\"450\" alt=\"Invalid login pic\" /></td>";
					echo "<td>We're sorry your username or password has illuded us at this time, <br/> please try again.</td>";
					echo "</table>";
					//echo "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
					//echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"username\" name=\"username\" /><br />";
					//echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
					//echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"createAccount.php\">Create Account</a></p>";
				}
			?>
		</div>
		<?php
			include "sidebar.php";
		?>
	</div>
</div>


</body>
</html>
