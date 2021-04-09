<?php

class database{
    private $servername;
    private $database;
    private $username;
    private $password;
    private $conn;

//Deze functie wordt slechts een keer aangeroepen als de database class instance bijvoorbeeld wordt aangemaakt.
function __construct() {
    $this->servername ='localhost';
    $this->database ='flowerpower';
    $this->username ='root';
    $this->password ='';

    try{
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password,);

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo"connected successfully";
    }   catch(PDOException $e) {
        echo "connection failed" . $e->getMessage();
    }         
}
    //Deze functie wordt gebruikt om de klanten te kunnen registreren door de volgende informatie in te vullen
    public function registreren($voorletters, $tussenvoegsel, $achternaam, $adres, $postcode, $woonplaats, $geboortedatum, $uname, $psw){
        $sql = "INSERT INTO klant (klantcode, voorletters, tussenvoegsel, achternaam, adres, postcode, woonplaats, geboortedatum, gebruikersnaam, wachtwoord) VALUES (:klantcode, :voorletters, :tussenvoegsel, :achternaam, :adres, :postcode, :woonplaats, :geboortedatum, :gebruikersnaam, :wachtwoord)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute([
            'klantcode'=> Null,
            'voorletters'=> $voorletters,
            'tussenvoegsel'=> $tussenvoegsel,
            'achternaam'=> $achternaam,
            'adres'=> $adres,
            'postcode'=> $postcode,
            'woonplaats'=> $woonplaats,
            'geboortedatum'=> $geboortedatum,
            'gebruikersnaam'=> $uname,
            'wachtwoord'=>password_hash($psw, PASSWORD_DEFAULT)
        ]);
        header('location: logincustomer.php');
}
//Deze functie zorgt voor het inloggen van de medewerker
    public function loginmedewerker($uname, $psw){

        $sql = "SELECT medewerkerscode, gebruikersnaam, wachtwoord FROM medewerkers WHERE gebruikersnaam = :gebruikersnaam";
    
        //prepare
        $stmt = $this->conn->prepare($sql);
    
        $stmt->execute([
            'gebruikersnaam' => $uname
        ]);
    
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
    
        if(is_array($result)){
    
            if(count($result) > 0){
    
                if ($uname == $result['gebruikersnaam'] && password_verify($psw, $result['wachtwoord'])) {
    
                    session_start();
                    $_SESSION['medewerkerscode'] = $result['id'];
                    $_SESSION['uname'] = $result['gebruikersnaam'];
                    $_SESSION['logged_in'] = true;
    
                    header('location: medewerkers.php');
    
                }
            }else{
                echo 'Failed to login.';
            }
    
        }else{
            echo 'Failed to login. please check youre input and try again.';
        }
    
    }
    //bij deze functie kan je een medewerker inserten om te testen met die medewerker
    function insertadmin(){
        $sql="INSERT INTO medewerkers (medewerkerscode, voorletters, voorvoegsel, achternaam, gebruikersnaam, wachtwoord) VALUES (:medewerkerscode, :voorletters, :voorvoegsel, :achternaam, :gebruikersnaam, :wachtwoord);";
        
        $stmt=$this->conn->prepare($sql);
        
        $stmt->execute([
            'medewerkerscode'=>Null,
            'voorletters'=>'w',
            'voorvoegsel'=>Null,
            'achternaam'=>'Hoek',
            'gebruikersnaam'=>'Wessel',
            'wachtwoord'=>password_hash('test', PASSWORD_DEFAULT)
        ]);
    }
    //Deze functie zorgt voor het inloggen van de klant
    public function loginklant($uname, $psw){

        $sql = "SELECT klantcode, gebruikersnaam, wachtwoord FROM klant WHERE gebruikersnaam = :gebruikersnaam";
    
        //prepare
        $stmt = $this->conn->prepare($sql);
    
        $stmt->execute([
            'gebruikersnaam' => $uname
        ]);
    
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        echo "psw is $psw en". $result['wachtwoord'];
    
        if(is_array($result) && count($result) > 0){
            
            if ($uname == $result['gebruikersnaam'] && password_verify($psw, $result['wachtwoord'])) {
                session_start();
                $_SESSION['klantcode'] = $result['klantcode'];
                $_SESSION['uname'] = $result['gebruikersnaam'];
                $_SESSION['logged_in'] = true;
                header('location: klanten.php');
    
                
            }else{
                echo 'Failed to login.';
            }
    
        }else{
            echo 'Failed to login. please check youre input and try again.';
        }
    
    }

    //bij deze functie kan je een klant inserten om te testen met die klant
    function insertklant(){
        $sql="INSERT INTO klant (klantcode, voorletters, tussenvoegsel, achternaam, adres, postcode, woonplaats, geboortedatum, gebruikersnaam, wachtwoord) VALUES (:klantcode, :voorletters, :tussenvoegsel, :achternaam, :adres, :postcode, :woonplaats, :geboortedatum, :gebruikersnaam, :wachtwoord)";
        
        $stmt=$this->conn->prepare($sql);
        
        $stmt->execute([
            'klantcode'=>Null,
            'voorletters'=>'t',
            'tussenvoegsel'=>Null,
            'achternaam'=>'test',
            'adres'=>'teststraat 24',
            'postcode'=>'1234aj',
            'woonplaats'=>'Amsterdam',
            'geboortedatum'=>'20/12/12',
            'gebruikersnaam'=>'test',
            'wachtwoord'=>password_hash('test', PASSWORD_DEFAULT)
        ]);
    }

    public function select($statement, $named_placeholder){

        //$sql = "SELECT username, password, email FROM users WHERE username = :uname ;"; // :uname is een named placeholder

        // prepared statement (send statement to server  + checks syntax)
        $stmt = $this->conn->prepare($statement);

        $stmt->execute($named_placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }
    public function update_or_delete($statement, $named_placeholder){
        
        $stmt = $this->conn->prepare($statement);
        $stmt->execute($named_placeholder);
        print_r($stmt);
        header('location: medewerkers.php');
        exit();
    }
    

}
