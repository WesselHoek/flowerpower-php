<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>artikelen</title>
    </head>
    <body>

        <?php
        session_start();
        $_SESSION['uname'];
        print_r($_SESSION);
        
        require_once('header.php'); 
        require_once('footer.php');
        

        include 'database.php';

        $db = new database();
        $klant = $db->select("SELECT * FROM klant WHERE klantcode = :code;", ['code'=>$_SESSION['klantcode']]);
        // print_r($klant);

        $columns = array_keys($klant[0]);
        $row_data = array_values($klant);
        
        

        ?>
        <table>
            <tr>
                <?php
                    foreach($columns as $column){
                        echo "<td><strong>$column</strong></td>";
                    }
                ?>
                <th colspan="2">action</th>
            </tr>
            <?php  
                foreach($row_data as $rows){
                    echo "<tr>";
                    foreach($rows as $data){
                        echo "<td>$data</td>";
                    }
                    ?>
                    <td>
                    <a href="edit_klanten.php?klant_klantcode=<?php echo $rows['klantcode']?>">edit</a>
                    </td>
                    </tr>
                    
              <?php  }?>
            
        </table>
        
    </body>
</html>