<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
<title>Suggest information on a weapon for your fellow survivors</title>
</head>
<!-- start header -->
<?php
	include 'submissionHeader.php';
	include 'dbconnect.php';
?>
<!-- end header -->
<!-- start page -->
<div id="page">
	<div id="content">
		<div class="post">
			<?php
				if(isset($_SESSION['name'])){
					echo "<p><b>Provide us(and by extension, your fellow survivors) with a little information regarding a tool
					for agressive negotiation with the ambassadors of the undead. Please specify name, type(firearm,blade,explosive,etc)
					and the other requested information below.</b></p>
					<BR>
					<BR>
					<form id=\"weaponForm\" name=\"weaponForm\" method=\"post\" action=\"firearmInsert.php\">  
						<p><label for=\"weaponName\">Firearm Name:</label> <input type=\"text\" name=\"firearmName\" id=\"firearmName\"/></p>
						<p><label for=\"caliber\">Firearm Caliber:</label><input type=\"text\" name=\"firearmCaliber\" id=\"firearmCaliber\"/></p>
						<p><label for=\"rounds_per_reload\">Rounds Per Reload:</label> <input type=\"number\" name=\"rounds_per_reload\" id=\"rounds_per_reload\"/></p>
						</br>
						<p>
						</br>
						</p><p>
						Weapon Usage Info:<BR>
						<TEXTAREA NAME=\"weaponUsage\" COLS=40 ROWS=6>

						</TEXTAREA>
						</p>

						<p class =\"submit\"><input type =\"submit\" value=\"Submit\" />
					</form>";
				}else{
					echo "<h4>Trying to sneak in are ya? Better luck next time.</h4>";
				}
			?>
		</div>
	</div>
	<?php
		include "sidebar.php";
	?>
</div>


