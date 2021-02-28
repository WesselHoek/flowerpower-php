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

if(isset($_GET['artikel_artikelcode'])){
    $db = new database();
    $artikel = $db->select("SELECT * FROM artikel WHERE artikelcode = :artikelcode", ['artikelcode'=>$_GET['artikel_artikelcode']]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "UPDATE artikel SET artikel=:artikel, prijs=:prijs WHERE artikelcode=:artikelcode";
    
    $placeholders = [
        'artikel'=>$_POST['artikel'],
        'prijs'=>$_POST['prijs'],
        'artikelcode'=>$_POST['artikel_artikelcode']
    ];
    print_r($placeholders);

    $db->update_or_delete($sql, $placeholders);
}



?>
    <form action="edit_artikel.php" method="post">
    <input type="hidden" name="artikel_artikelcode" value="<?php echo isset($_GET['artikel_artikelcode']) ? $_GET['artikel_artikelcode'] : '' ?>">
    <input type="text" name="artikel" placeholder="artikel" value="<?php echo isset($artikel[0]['artikel']) ? $artikel[0]['artikel'] : ''?>">
    <input type="text" name="prijs" placeholder="prijs" value="<?php echo isset($artikel[0]['prijs']) ? $artikel[0]['prijs'] : ''?>">
    <input type="submit" name="Edit">
    
    </form>

</body>
</html>