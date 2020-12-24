<?php

class Database{

public $con;
public function __construct(){
    $this->con = mysqli_connect("localhost","root","012256","cafeteria");
    // if($this->con){
    //     echo "Connected";
    // }else{
    //     echo "Not Connected";
    // }
  }

}


// test database connection
// $obj = new Database;



?>