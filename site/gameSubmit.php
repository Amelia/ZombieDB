<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

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
<div id="wrapper">
<div id="page">
	<div id="content">
		<div class="post">
			<?php
			if(isset($_SESSION['name'])){
				echo "<p><b>Provide us(and by extension, your fellow survivors) with a little information regarding a tool
				for RESEARCH of the undead. Please specify requested information below.</b></p>
				<BR>
				<BR>
				<form id=\"gameForm\" name=\"gameForm\" method=\"post\" action=\"gameInsert.php\">  
					<p><label for=\"gameTitle\">Game Title:</label> <input type=\"text\" name=gameTitle id=\"gameTitle\"/></p>
					<p><label for=\"esrb\">ESRB Rating:</label> <input type=\"text\" name=esrb id=\"esrb\"/></p>
					</br>

					Reasoning for game selection:<BR>
					<TEXTAREA NAME=\"reasoning\" COLS=40 ROWS=6>

					</TEXTAREA></p>

					<p><label for=\"releaseDate\">Release Date:</label>
						<input type=\"number\" name=\"month\" min=\"1\" max=\"12\" step=\"1\" value=\"1\" size=\"4.5\"/>
						<input type=\"number\" name=\"day\" min=\"1\" max=\"31\" step=\"1\" value=\"1\" size=\"4\"/>
						<input type=\"number\" name=\"year\" min=\"1980\" max=\"2014\" step=\"1\" value=\"1995\" size=\"7\"/></td></tr>

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
	
</div>
</div>
<!-- end page -->

