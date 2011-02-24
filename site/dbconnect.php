<?php
$db = mysql_connect('localhost', 'zombieUser', 'zombie');
if (!$db)
{
	die("Couldn't dig up any zombies !");
} 
mysql_select_db("zombiedb", $db);
?>
