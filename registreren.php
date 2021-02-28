<?php

// $title contains the title for the page
$title = "Login";

// include the database class
include "database.php";

// start the session
session_start();

require_once('header.php');
// this inserts the header and the navbar

    //$database = new database();
    //$database->insertklant();


    if(isset($_POST['submit'])){

        $fields = ['voorletters', 'achternaam', 'adres', 'postcode', 'woonplaats', 'geboortedatum', 'uname', 'pword'];

        $error = false;

        foreach($fields as $field){
            if(!isset($_POST[$field]) || empty($_POST[$field])){
             $error = true;
        }
    }

    if(!$error){
        // store posted form values in variables
        $voorletters= $_POST['voorletters'];
        $tussenvoegsel= isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '';
        $achternaam= $_POST['achternaam'];
        $adres= $_POST['adres'];
        $postcode= $_POST['postcode'];
        $woonplaats = $_POST['woonplaats'];
        $geboortedatum= $_POST['geboortedatum'];
        $username= $_POST['uname'];
        $password= $_POST['pword'];
            
        $database = new database();
        // login function
        $database->registreren($voorletters, $tussenvoegsel, $achternaam, $adres, $postcode, $woonplaats, $geboortedatum, $username, $password);
     }
}
  
    // this inserts the header and the navbar
    //require_once('header.php');  
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="text-center" cz-shortcut-listen="true">

        <div class="col-3 ruimte">
            <form class="form-signin" action="" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
                
                <label for="voorletters">Voorletters</label>
                <input type="text" name="voorletters" class="form-control" placeholder="voorletters" required="" autocomplete="off">
                <br>

                <label for="tussenvoegsel">Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" class="form-control" placeholder="tussenvoegsel" autocomplete="off">
                <br>

                <label for="achternaam">Achternaam</label>
                <input type="text" name="achternaam" class="form-control" placeholder="Achternaam" required="" autocomplete="off">
                <br>

                <label for="adres">Adres</label>
                <input type="text" name="adres" class="form-control" placeholder="Adres" required="" autocomplete="off">
                <br>

                <label for="postcode">Postcode</label>
                <input type="postcode" name="postcode" class="form-control" placeholder="Postcode" required="" autocomplete="off">
                <br>

                <label for="woonplaats">Woonplaats</label>
                <input type="woonplaats" name="woonplaats" class="form-control" placeholder="Woonplaats" required="" autocomplete="off">
                <br>

                <label for="geboortedatum">Geboortedatum</label>
                <input type="date" name="geboortedatum" class="form-control" placeholder="Geboortedatum" required="" autocomplete="off">
                <br>

                <label for="text" >Gebruikersnaam</label>
                <input type="text" name="uname" class="form-control" placeholder="Gebruikersnaam" required="" autocomplete="off">
                <br>

                <label for="wachtwoord">Wachtwoord</label>
                <input type="Password" name="pword" class="form-control" placeholder="Wachtwoord" required="" autocomplete="off">
                <br>
                
                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">

            </form>
        </div>
    </div>
</div>
</body>
</html>