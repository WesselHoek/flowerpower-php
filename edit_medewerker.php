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

if(isset($_GET['medewerkers_medewerkerscode'])){
    $db = new database();
    $medewerkers = $db->select("SELECT * FROM medewerkers WHERE medewerkerscode = :medewerkerscode", ['medewerkerscode'=>$_GET['medewerkers_medewerkerscode']]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE medewerkers SET voorletters=:voorletters, voorvoegsel=:voorvoegsel, achternaam=:achternaam, gebruikersnaam=:gebruikersnaam WHERE medewerkerscode=:medewerkerscode";
    
    $placeholders = [
        'voorletters'=>$_POST['voorletters'],
        'voorvoegsel'=>$_POST['voorvoegsel'],
        'achternaam'=>$_POST['achternaam'],
        'gebruikersnaam'=>$_POST['gebruikersnaam'],
        'medewerkerscode'=>$_POST['medewerkers_medewerkerscode']
    ];
    print_r($placeholders);

    $db->update_or_delete($sql, $placeholders);
}



?>
    <form action="edit_medewerker.php" method="post">
    <input type="hidden" name="medewerkers_medewerkerscode" value="<?php echo isset($_GET['medewerkers_medewerkerscode']) ? $_GET['medewerkers_medewerkerscode'] : '' ?>">
    <input type="text" name="voorletters" placeholder="voorletters" value="<?php echo isset($medewerkers[0]['voorletters']) ? $medewerkers[0]['voorletters'] : ''?>">
    <input type="text" name="voorvoegsel" placeholder="voorvoegsel" value="<?php echo isset($medewerkers[0]['voorvoegsel']) ? $medewerkers[0]['voorvoegsel'] : ''?>">
    <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo isset($medewerkers[0]['achternaam']) ? $medewerkers[0]['achternaam'] : ''?>">
    <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" value="<?php echo isset($medewerkers[0]['gebruikersnaam']) ? $medewerkers[0]['gebruikersnaam'] : ''?>">
    <input type="submit" name="Edit">
    
    </form>

</body>
</html>