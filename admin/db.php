<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class Database{

public $con;
public function __construct(){
    $this->con = mysqli_connect("localhost","root","012256","cafe");
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