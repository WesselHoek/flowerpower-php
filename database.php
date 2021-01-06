<?php
// database.php
class DB{
    private $host;
    private $user;
    private $pass;
    private $name;
    private $charset;

    protected $dbh; // dit is de verbinding met de database
    protected $resultSet; // hierin komen de resultaten te staan van een query


    public function __construct($host, $user, $pass, $name, $charset){
        $this->host = $host; // localhost
        $this->user = $user; //root
        $this->pass = $pass; //db password
        $this->name = $name; // db name
        $this->charset = $charset; // db charset

        try{
            $dsn = "mysql:host=$this->host; dbname=$this->name; charset=$this->charset";
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
            $this->resultSet = [];
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error){
            echo $error->getMessage();
            exit("An error occured");
        }
    }
}