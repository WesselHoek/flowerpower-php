<?php

// $title contains the title for the page
$title = "Login";

// include the database class
include "database.php";


require_once('header.php');
require_once('footer.php');
// this inserts the header and the navbar and inserts the footer

    //$database = new database();
    //$database->insertklant();


    if(isset($_POST['submit'])){

        $fields = ['uname', 'pword'];

        $error = false;

        foreach($fields as $field){
            if(!isset($_POST[$field]) || empty($_POST[$field])){
             $error = true;
        }
    }

    if(!$error){
        // store posted form values in variables
        $username= $_POST['uname'];
        $password= $_POST['pword'];
            
        $database = new database();
        // login function
        $database->loginklant($username, $password);
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
            <form class="form-signin" action="logincustomer.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Log in</h1>

                <label for="text" >Gebruikersnaam</label>
                <input type="text" name="uname" class="form-control" placeholder="Gebruikersnaam" required="" autocomplete="off">
                <br>

                <label for="Password">Password</label>
                <input type="password" name="pword" class="form-control" placeholder="Wachtwoord" required="" autocomplete="off">
                <br>
                
                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="submit">

            </form>
        </div>
    </div>
</div>
</body>
</html>