<?php

    //Basic Connection Stuff
    session_start();
	include 'dbconnect.php';

    //Add to DB CONDITIONAL
    if($_POST['weapon_id'] != null)
	{
        mysqli_query($db,"
            DELETE FROM `weapon_preferences` WHERE
            user_id=(select user_id from users where username = \"" .$_SESSION['name']. "\")
            AND weapon_id = ".$_POST['weapon_id'].";"
        );
    }
    else if($_POST['firearm_id'] != null)
    {
        mysqli_query($db,"
            DELETE FROM `weapon_firearm_preferences` WHERE
            user_id =(select user_id from users where username =\"" .$_SESSION['name']. "\")
            AND firearm_id = ".$_POST['firearm_id'].";"
        );
    }
    else if($_POST['film_id'] != null)
    {
        mysqli_query($db,"
            DELETE FROM `z_film_preferences` WHERE
            user_id =(select user_id from users where username =\"" .$_SESSION['name']. "\")
            AND film_id = ".$_POST['film_id'].";"
        );
    }
    else if($_POST['book_id'] != null)
    {
        mysqli_query($db,"
            DELETE FROM `z_book_preferences` WHERE
            user_id =(select user_id from users where username =\"" .$_SESSION['name']. "\")
            AND book_id = ".$_POST['book_id'].";"
        );
    }
    else if($_POST['game_id'] != null)
    {
        mysqli_query($db,"
            DELETE FROM `z_game_preferences` WHERE
            user_id =(select user_id from users where username =\"" .$_SESSION['name']. "\")
            AND game_id = ".$_POST['game_id'].";"
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