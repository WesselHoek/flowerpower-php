<?php

require_once('header.php');

include "database.php";
session_start();

$db = new database();
echo $_SESSION["uname"];

?>

<body>
    <button type="button"><a href="artikelen.php">Overzicht artikelen</a></button>
    <button type="button"><a href="medewerkersoverzicht.php">Overzicht medewerkers</a></button>
    <button type="button"><a href="klantenoverzicht.php">Overzicht klanten</a></button>

    </body>