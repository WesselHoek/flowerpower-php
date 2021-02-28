<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include 'database.php';
$db = new database();

if(isset($_GET['klant_klantcode'])){
    $db = new database();
    $klant = $db->select("SELECT * FROM klant WHERE klantcode = :klantcode", ['klantcode'=>$_GET['klant_klantcode']]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE klant SET voorletters=:voorletters, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, adres=:adres, postcode=:postcode, woonplaats=:woonplaats, geboortedatum=:geboortedatum,  gebruikersnaam=:gebruikersnaam WHERE klantcode=:klantcode";
    
    $placeholders = [
        'voorletters'=>$_POST['voorletters'],
        'tussenvoegsel'=>$_POST['tussenvoegsel'],
        'achternaam'=>$_POST['achternaam'],
        'adres'=>$_POST['adres'],
        'postcode'=>$_POST['postcode'],
        'woonplaats'=>$_POST['woonplaats'],
        'geboortedatum'=>$_POST['geboortedatum'],
        'gebruikersnaam'=>$_POST['gebruikersnaam'],
        'klantcode'=>$_POST['klant_klantcode']
    ];
    print_r($placeholders);

    $db->update_or_delete($sql, $placeholders);
}



?>
    <form action="edit_klanten.php" method="post">
    <input type="hidden" name="klant_klantcode" value="<?php echo isset($_GET['klant_klantcode']) ? $_GET['klant_klantcode'] : '' ?>">
    <input type="text" name="voorletters" placeholder="voorletters" value="<?php echo isset($klant[0]['voorletters']) ? $klant[0]['voorletters'] : ''?>">
    <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo isset($klant[0]['tussenvoegsel']) ? $klant[0]['tussenvoegsel'] : ''?>">
    <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo isset($klant[0]['achternaam']) ? $klant[0]['achternaam'] : ''?>">
    <input type="text" name="adres" placeholder="adres" value="<?php echo isset($klant[0]['adres']) ? $klant[0]['adres'] : ''?>">
    <input type="text" name="postcode" placeholder="postcode" value="<?php echo isset($klant[0]['postcode']) ? $klant[0]['postcode'] : ''?>">
    <input type="text" name="woonplaats" placeholder="woonplaats" value="<?php echo isset($klant[0]['woonplaats']) ? $klant[0]['woonplaats'] : ''?>">
    <input type="text" name="geboortedatum" placeholder="geboortedatum" value="<?php echo isset($klant[0]['geboortedatum']) ? $klant[0]['geboortedatum'] : ''?>">
    <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" value="<?php echo isset($klant[0]['gebruikersnaam']) ? $klant[0]['gebruikersnaam'] : ''?>">
    <input type="submit" name="Edit">
    
    </form>

</body>
</html>