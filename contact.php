<html>
<title>Contactpagina</title>
</html>


<?php
require_once('header.php');
require_once('footer.php');

include "database.php";

$db = new database();
//echo $_SESSION["uname"];
?>

<body>
    <div class="header">
        <img src="./images/bloemenwinkel.png" class="img-fluid" alt="Responsive image" style="width:100%;height:400px;">
    </div>

    <div class="products mt-2">
        <h4 class="text-center">Flowerpower</h4>
        <p class="text-center">Telefoonnummer: 061111111</p>
        <p class="text-center">postadres: 1287JH</p>
        <p class="text-center">e-mailadres: flowerpower@info.com</p>
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