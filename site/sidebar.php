<div id="sidebar">
	<ul>
		<li>
		<!-- Do This when You are not logged in -->
		<?php
			$theuri = $_SERVER['REQUEST_URI'];
			if($theuri == "/zombiedb_v3/createAccount.php" || $theuri == "/zombiedb_v3/registerAccount.php"){
				//Do nothing
			}else if (!isset($_SESSION['name'])) {
				echo "<h2>Log In</h2>";
				echo "<ul>";
				echo "<form method=\"post\" action=\"login.php\">";
					echo "<label for=\"username\">Username:</label>";
					echo "<input type=\"text\" id=\"username\" name=\"username\" /><br />";
					echo "<label for=\"pw\">Password:</label>";
					echo "<input type=\"password\" id=\"pw\" name=\"pw\" /><br /><p></p>";
					echo "<table><tr>";
					echo "<td><input type=\"submit\" value=\"Login\" name=\"submit\" /></td>";
				echo "</form>";
				echo "</table>";
				echo "<p><a href=\"createAccount.php\">Don't have an account?</a></p>";
				echo "</ul>";
			}else{
				echo "<h2>Welcome, ". $_SESSION['name']. "</h2>";
                echo "<ul><li><a href=\"profile.php\">Profile</a></li></ul>";
                echo "<ul><li><a href=\"changePW.php\">Change Password</a></li></ul>";
				echo "<ul><li><a href=\"logout.php\">Logout</a></li></ul>";
			}
		?>
		
		<!--Do this When You are logged in-->
  
		</li>
		
		<li>
			<h2>Z.A.S. Directory</h2>
			<ul>
				<li><a href="index.php">Z.A.S. Home </a></li>
				<!--<li><a href="equipment.php">Survival Checklist</a></li>-->
				<li><a href="strategies.php">Survival Strategies</a></li>
				<li><a href="check.php">Survival Checklist</a></li>
				<li><a href="weapons.php">Effective Weapons</a></li>
				<li><a href="games.php">Zombie Games</a></li>
				<li><a href="movie.php">Zombie Movies</a></li>
                <li><a href="book.php">Zombie Books</a></li>
				<li><a href="contacts.php">Contact Us</a></li>
			</ul>
		</li>
		
		<li>
			<h2>Z-Links</h2>
			<ul>
				<li><a href="http://www.zombiehub.com/">zombiehub</a></li>
				<li><a href="http://www.reddit.com/r/zombies">reddit</a></li>
				<li><a href="">Zapocalypse</a></li>
			</ul>
		</li>
	</ul>
</div>
