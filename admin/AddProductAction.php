<?php

include "db.php";

class DataOperation extends Database
{
public function insert_record($table,$fields){
    $sql = "";
    $sql .= "INSERT INTO ".$table;
    $sql .= " (".implode(",",array_keys($fields)).") VALUES ";
    $sql .= "('".implode("','",array_values($fields))."')";
    $query = mysqli_query($this->con,$sql);
    if($query){
        return true;
    }
  }
//   start show inserted product in table at all products page
public function fetch_record($table){
    $sql = "SELECT * FROM ".$table;
    $array = array();
    $query = mysqli_query($this->con,$sql);
    while($row = mysqli_fetch_assoc($query)){
        $array[] = $row; // in each index of array it have row
    }
    return $array;   //   End show inserted product in table at all products page
}
// edit function for select_record
public function select_record($table,$where){
    $sql = "";
    $condition = "";
    foreach ($where as $key => $value){
        // id='5' AND product_name ='something'
        $condition .= $key . "='" .$value . "' AND ";
    }
// echo $condition;
$condition = substr($condition,0,-5);
$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
// echo $sql;
$query = mysqli_query($this->con,$sql);
$row = mysqli_fetch_array($query);
return $row;
}
// update function
public function update_record($table,$where,$fields){
  $sql = "";
  $condition = "";
  foreach ($where as $key => $value){
    // id='5' AND product_name ='something'
    $condition .= $key . "='" . $value . "' AND ";    // $condition .= $key . "='" . $value . "' AND ";
}
$condition = substr($condition, 0, -5);
foreach ($fields as $key => $value){
    // UPDATE table SET product_name ='' , the rest of table data   WHERE id='';
    $sql .= $key . "='".$value."', ";
}
 $sql = substr($sql,0,-2);value . "' AND ";   //$sql = substr($sql,0,-2);
 $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
//  echo $sql;
if(mysqli_query($this->con,$sql)){
    return true;
    }
  }

  // fuction of execute delete action
  public function delete_record($table,$where){
      $sql = "";
      $condition = "";
      foreach ($where as $key => $value){
        $condition .= $key . "='" . $value . "' AND ";  
      }
      $condition = substr($condition, 0, -5);
      $sql = "DELETE FROM ".$table." WHERE ".$condition;
      if(mysqli_query($this->con,$sql)){
        return true; 
      }
  }
}
$obj = new DataOperation;
// if there is an action on save button >>> save insert data at DB
if (isset($_POST["save"])){
    $myArray = array(
       "product_name" => $_POST['product_name'],
       "product_price" => $_POST['product_price'],
    //    "product_name"=>$_POST['AddProName'], //AddProCategory
       "product_picture" => $_POST["product_picture"],//"product_picture" => $_FILES["product_picture"]['name'],
    );

    if($obj->insert_record("Product",$myArray)){
        header("location:AddProducts.php?msg=Record Inserted Successfully");
    }
}

if (isset($_POST["Add"])){
    $myArray = array(
       "catagory_name" => $_POST['catagory_name']
       
    );

    if($obj->insert_record("Catagory",$myArray)){
        header("location:index.php?msg=Record Inserted Successfully");
    }
}




// the action on update button when we click to edit the record
if (isset($_POST["edit"])){
    $id = $_POST["product_Id"];
    $where = array("product_Id"=>$id);
    $myArray = array(
        "product_name" => $_POST['product_name'],
        "product_price" => $_POST['product_price'],
       //"product_name"=>$_POST['AddProName'], //AddProCategory
       "product_picture" => $_POST['product_picture']
    );
    if($obj->update_record("Product",$where,$myArray)){
        header("location:AllProducts.php?msg=Record Update Successfully");
    }
    
}


// delet action
if(isset($_GET["delete"])){
    $id = $_GET["product_Id"] ?? null;
    $where = array("product_Id"=>$id);
    if($obj->delete_record("Product",$where)){
       header("location:AllProducts.php?msg=Record Deleted Successfully");
    }
    
}






?>