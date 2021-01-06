<?php
    // start the session
    session_start();

    // $title contains the title for the page
    $title = "Home";

    // include the database class
    include "database.php";

    // start a new db connection
    $db = new DB('localhost', 'root', '', 'flowerpower', 'utf8');

    // check the user role
    if(isset($_SESSION["email"])){
        $role = $db->checkRole();
    }
    
    // this inserts the header and the navbar
    require_once('header.php');  
?>

<body>
    <div class="header">
        <img src="./images/bloemen.jpg" class="img-fluid" alt="Responsive image" style="width:100%;height:350px;">
    </div>

    <div class="products mt-2">
        <h4 class="text-center">Products</h4>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="./images/boeket.jpg" class="img-fluid" alt="Responsive image" style="width:200px;height:200px;">
                </div>
                <div class="col">
                    <img src="./images/bloemenwinkel.png" class="img-fluid" alt="Responsive image" style="width:500px;height:250px;">
                </div>
            </div>
        </div>
    </div>
</body>