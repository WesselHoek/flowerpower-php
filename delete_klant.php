<?php



if(isset($_GET['klant_klantcode'])){
include 'database.php';
$db = new database();

$sql = "DELETE FROM klant WHERE klantcode=:klantcode";
    
    $placeholders = [
        'klantcode'=>$_GET['klant_klantcode']
    ];

    $db->update_or_delete($sql, $placeholders);
}

?>
