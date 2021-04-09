<html>
<title>medewerkers</title>
</html>


<?php
require_once('header.php');
require_once('footer.php');

include "database.php";

$db = new database();
//echo $_SESSION["uname"];

$db = new database();
$vestigingen = $db->select("SELECT winkelcode, winkelplaats, winkelnaam FROM winkel", []);


$db = new database();
echo $_SESSION['uname'];
$vestigingen = $db->select("SELECT winkelcode, winkelplaats, winkelnaam FROM winkel", []);

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $winkelcode = $_POST['winkelplaats'];
    $id = (int)substr($winkelcode, 0, 1);
    $sql = "SELECT * FROM bestelling WHERE winkel_winkelcode = :id";
    $orders = $db->select($sql, ['id'=>$id]);
    $columns = array_keys($orders[0]);
    $row_data = array_values($orders);

}




?>

<body>
    <button class="btn btn-primary btn-md btn-primary" type="button"><a href="artikelen.php" style="color:black">Overzicht artikelen</a></button>
    <button class="btn btn-primary btn-md btn-primary" type="button"><a href="medewerkersoverzicht.php" style="color:black">Overzicht medewerkers</a></button>
    <br>
    <br>
<div class="container">
    <form class="form-signin" action="medewerkers.php" method="post">
            <select name="winkelplaats" class="form-control form-control-lg">
                <?php foreach ($vestigingen as $vestigingen): ?>
                    <option name="<?php echo $vestigingen["winkelcode"]?>" value="<?php echo $vestigingen["winkelcode"]?>"><?=$vestigingen["winkelcode"]?> <?=$vestigingen["winkelplaats"]?> <?=$vestigingen["winkelnaam"]?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" name="submit" class="btn btn-lg btn-secondary btn-block" value="submit">
        </form>
        </div>
        </div>
        <!-- order info loopen en overzicht maken -->
        <div class="col-1"></div>
        <div class="container">
                <table class="table table-hover">
                    <tr>
                        <?php
                            if(isset($orders) && !empty($orders)){
                            foreach($columns as $column){ ?>
                               <th><strong><?php echo $column ?></strong></th>

                        <?php    }

                        ?>
                    </tr>
                    <?php
                        foreach($row_data as $rows){ ?>
                        <tr>
                        <?php
                        foreach($rows as $data){
                            echo "<td> $data </td>";
                        }
                        }
                        ?>
                        <?php } 
                        
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>