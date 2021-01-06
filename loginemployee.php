<?php
    // start the session
    session_start();

    // $title contains the title for the page
    $title = "Home";

    // include the database class
    include "database.php";

    // start a new db connection
    $db = new DB('localhost', 'root', '', 'flowerpower', 'utf8');
    
    // this inserts the header and the navbar
    require_once('header.php');  
?>

<body>
    <br>
    <?php
        // if $message is set then echo it
        if(isset($message)){
            echo '<label class="test-danger">' . $message . '</label>';
        }
    ?>
    <div class="container" style="width: 500px;">
        <h3>Login</h3><br>
        <form action="" method="post">

            <label for="Email">Email</label>
            <input type="text" name="email" class="form-control">
            <br>

            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control">
            <br>

            <input type="submit" name="login" class="btn btn-info" value="Login">
            <a href="registreren.php" class="btn btn-link" role="button">Registreren?</a>
        </form>
    </div>
</body>