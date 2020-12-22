<?php
class dbc{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){
        $this->servername="localhost";
        $this->username="root";
        $this->password="01098841727";
        $this->dbname="cafeteria";

        $conn =new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        return $conn;

    }


}