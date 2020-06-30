<?php

    header('Content-Type: text/html; charset=utf-8');
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db = 'useraccounts';

    $db = new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Unable to Connect") ;
    //mysql_set_charset('utf8', $db);

    if (!$db->set_charset("utf8")) {
        //printf("Error loading character set utf8: %s\n", $db->error);
    } else {
        //printf("Current character set: %s\n", $db->character_set_name());
    }


    //echo "IT WORKED!!!";





?>