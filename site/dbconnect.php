<?php
	$db = mysqli_connect('localhost', 'zombieUser', 'zombie','zombiedb');
	if (!$db){
		die("Couldn't dig up any zombies !");
	}
?>
