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
				echo "<form id=\"checkForm\" name=\"bookForm\" method=\"post\" action=\"bookInsert.php\">";  
				echo "<p><label for=\"bookName\">Book Name:</label> <input type=\"text\" name=\"bookName\" id=\"bookName\"/></p>";
				echo "<p><label for=\"isbn\">ISBN:</label> <input type=\"text\" name=\"isbn\" id=\"isbn\"/></p>";
				echo "<p><label for=\"pages\">Page Count:</label> <input type=\"number\" name=\"pages\" id=\"pages\"/></p>";
				echo "<p><label for=\"published\">Published Date:</label>
					<input type=\"number\" name=\"month\" min=\"1\" max=\"12\" step=\"1\" value=\"1\" size=\"4.5\"/>
					<input type=\"number\" name=\"day\" min=\"1\" max=\"31\" step=\"1\" value=\"1\" size=\"4\"/>
					<input type=\"number\" name=\"year\" min=\"1980\" max=\"2014\" step=\"1\" value=\"1995\" size=\"7\"/></td></tr>";

				echo "<br/>";

				echo "Reasoning:<BR><TEXTAREA NAME=\"reason\" COLS=40 ROWS=6></TEXTAREA></p>";

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
