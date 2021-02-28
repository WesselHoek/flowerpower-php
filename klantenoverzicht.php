<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>artikelen</title>
    </head>
    <body>

        <?php 
        
        require_once('header.php'); 
        
        include 'database.php';
        $db = new database();
        $klant = $db->select("SELECT * FROM klant", []);

        $columns = array_keys($klant[0]);
        $row_data = array_values($klant)
        
        

        ?>
        <button type="button"><a href="klanten.php">terug</a></button>
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