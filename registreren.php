<?php
    // start the session
    session_start();

    // $title contains the title for the page
    $title = "Home";

    // include the database class
    include "database.php";

    // start a new db connection
    $db = new DB('localhost', 'root', '', 'flowerpower', 'utf8');
    
    // this inserts the header and the navbar
    require_once('header.php');  
?>