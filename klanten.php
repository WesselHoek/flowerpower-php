<html>
<title>medewerkers</title>
</html>


<?php
require_once('header.php');
require_once('footer.php');

include "database.php";

$db = new database();
//echo $_SESSION["uname"];
?>
<body>
    <button class="btn btn-primary btn-md btn-primary" type="button"><a href="klantenoverzicht.php" style="color:black">Overzicht klanten</a></button>
    <button class="btn btn-primary btn-md btn-primary" type="button"><a href="bestelling.php" style="color:black">Bestellen</a></button>

    </body>
