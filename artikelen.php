<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>artikelen</title>
    </head>
    <body>

        <?php 
        
        require_once('header.php');
        require_once('footer.php'); 
        
        include 'database.php';
        $db = new database();
        $artikelen = $db->select("SELECT * FROM artikel", []);

        $columns = array_keys($artikelen[0]);
        $row_data = array_values($artikelen)
        
        

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
                    <a href="edit_artikel.php?artikel_artikelcode=<?php echo $rows['artikelcode']?>">edit</a>
                    <a href="delete_artikel.php?artikel_artikelcode=<?php echo $rows['artikelcode']?>">delete</a>
                    </td>
                    </tr>
                    
              <?php  }?>
            
        </table>
        
    </body>
</html>