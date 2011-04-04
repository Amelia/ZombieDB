<?php

    //Basic Connection Stuff
    session_start();
	include 'dbconnect.php';

    //Add to DB CONDITIONAL
    if($_POST['weapon_id'] != null)
	{
        mysqli_query($db,"
            INSERT INTO `weapon_preferences` (user_id, weapon_id) VALUES(
            (select user_id from users where username = \"" .$_SESSION['name']. "\")
            , ".$_POST['weapon_id'].");"
        );
    }
    else if($_POST['firearm_id'] != null)
    {
        mysqli_query($db,"
            INSERT INTO `weapon_firearm_preferences` (user_id, firearm_id) VALUES(
            (select user_id from users where username =\"" .$_SESSION['name']. "\")
            ,".$_POST['firearm_id'].");"
        );
    }
    else if($_POST['film_id'] != null)
    {
        mysqli_query($db,"
            INSERT INTO `z_film_preferences` (user_id, film_id) VALUES(
            (select user_id from users where username =\"" .$_SESSION['name']. "\")
            ,".$_POST['film_id'].");"
        );
    }
    else if($_POST['book_id'] != null)
    {
        mysqli_query($db,"
            INSERT INTO `z_book_preferences` (user_id, book_id) VALUES(
            (select user_id from users where username =\"" .$_SESSION['name']. "\")
            ,".$_POST['book_id'].");"
        );
    }
    else if($_POST['game_id'] != null)
    {
        mysqli_query($db,"
            INSERT INTO `z_game_preferences` (user_id, game_id) VALUES(
            (select user_id from users where username =\"" .$_SESSION['name']. "\")
            ,".$_POST['game_id'].");"
        );
    }
    else
    {
        $ref = $_SERVER['HTTP_REFERER'];
        header( 'refresh: 0; url='.$ref);
        exit;
    }



//    header("Location: profile.php");
//	exit;

$ref = $_SERVER['HTTP_REFERER'];
        header( 'refresh: 0; url='.$ref);
        exit;


?>