<?php session_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
<title>Suggest a check list item for your fellow survivors</title>
</head>
<!-- start header -->
<?php
	include 'header.php';
	include 'dbconnect.php';
?>
<body>
<div id="wrapper">
	<div id="page">
		<div id="content">
			<div class="post">
		
			<?php 
			if(isset($_SESSION['name'])){
				echo "<p><b>Provide us(and by extension, your fellow survivors) with a little information 
					regarding a tool for RESEARCH with the ambassadors of the undead. Please specify 
					requested information below.</b></p>";
				echo "<BR/><BR/>";
				echo "<form id=\"checkForm\" name=\"checkForm\" method=\"post\" action=\"checkInsert.php\">";  
				echo "<p><label for=\"itemName\">Item Name:</label> <input type=\"text\" name=\"itemName\" id=\"itemName\"/></p>";
				echo "<p><label for=\"itemType\">Item Type:</label> <input type=\"text\" name=\"itemType\" id=\"itemType\"/></p>";
				echo "<p><label for=\"priority\">Priority:</label> <input type=\"number\" name=\"priority\" id=\"priority\"/></p>";
				echo "<p><label for=\"quantity\">Quantity:</label> <input type=\"number\" name=\"quantity\" id=\"quantity\"/></p>";
				echo "</br>";

				echo "Item Usage:<BR><TEXTAREA NAME=\"item_usage\" COLS=40 ROWS=6></TEXTAREA></p>";

				echo "<p class =\"submit\"><input type =\"submit\" value=\"Submit\" /></form>";
			}else{
				echo "<h4>Trying to sneak in are ya? Better luck next time.</h4>";
			}
			echo "</div>";
			?>
			</div>
			<?php
				include "sidebar.php";
			?>
		</div>
	</div>
</div>
