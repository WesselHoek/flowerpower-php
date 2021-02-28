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
        $medewerkers = $db->select("SELECT * FROM medewerkers", []);

        $columns = array_keys($medewerkers[0]);
        $row_data = array_values($medewerkers)
        
        

        ?>

        <button type="button"><a href="medewerkers.php">terug</a></button>
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
                    <a href="edit_medewerker.php?medewerkers_medewerkerscode=<?php echo $rows['medewerkerscode']?>">edit</a>
                    <a href="delete_medewerker.php?medewerkers_medewerkerscode=<?php echo $rows['medewerkerscode']?>">delete</a>
                    </td>
                    </tr>
                    
              <?php  }?>
            
        </table>
        <body>
    <br>       
    </body>
</html>