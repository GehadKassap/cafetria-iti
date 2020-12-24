<?php
class dbc
{

    private $dsn = "mysql:host=localhost;dbname=cafeteria";
    private $dbuser = "root";
    private $dbpass = "01098841727";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);
            //var_dump($this->conn);
        } catch (PDOException $e) {
            echo "error!!";
        }
        return $this->conn;


    }
}