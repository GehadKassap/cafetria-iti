<?php

include "db.php";

class DataOperation extends Database{
  
  // Start insert data from a product form in database   
 public function insert($inserted)
{
  $result = $this->con->query($inserted) or die($this->con->error. __LINE__);
  if ($result)
  {
    header("Location: AddProducts.php?msg=".urlencode('data insert successfull'));
    
  }
 	
}
  // End insert data from a product form in database
  
  
   // Start select data from  database
  public function select($selected){
		$result = $this->con->query($selected)or die($this->con->error.__LINE__);
		if ($result->num_rows >0) {
			return $result;
		}else{
			return false;
		}
  }
   // End select data from  database
     

     // Start another fun for category select option in a product from  from database 
     public function insert_record($table,$fields){
      $sql = "";
      $sql .="INSERT INTO ".$table;
      $sql .="(".implode(",", array_keys($fields)).") VALUES ";
      $sql .="('".implode("','", array_values($fields))."')";
      $query = mysqli_query($this->con,$sql);
      if($query){
        return true;
       }
    }
     // End another fun for category select option in a product from  from database 

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


 // Start update data in database function
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
  // End update data in database function

  // Start fuction of execute delete action
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
   // End fuction of execute delete action

}



$obj = new DataOperation;

if (isset($_POST["Add"])){
    $myArray = array(
       "catagory_name" => $_POST['catagory_name']
       
    );

    if($obj->insert_record("catagory",$myArray)){
        header("location:AddProducts.php?msg=Record Inserted Successfully");
    }
}




// // the action on update button when we click to edit the record
if (isset($_POST["edit"])){
    $id = $_POST["product_Id"];
    $where = array("product_Id"=>$id);

    if(isset($_FILES['product_picture'])){
      $file_name = $_FILES['product_picture']['name'];
      $file_type=$_FILES['product_picture']['type'];
      $ext=explode('.',$_FILES['product_picture']['name']);
      $file_ext=strtolower(end($ext));     
      $extensions= array("jpeg","jpg","png");   
      if(in_array($file_ext,$extensions)=== false){
          $errors.="Extension is not allowed, please choose a JPEG or PNG image.";
      }      
      if(empty($errors)==true){
       
       if (move_uploaded_file($_FILES['product_picture']['tmp_name'],dirname(__DIR__, 1)."/imgs/".basename($_FILES['product_picture']['name']))) {
        $myArray = array(
          "product_name" => $_POST['product_name'],
          "product_price" => $_POST['product_price'],
         //"product_name"=>$_POST['AddProName'], //AddProCategory
         "product_picture" => $file_name,
         "product_desc" => $_POST['product_desc']
      );
      if($obj->update_record("product",$where,$myArray)){
          header("location:AllProducts.php?msg=Record Update Successfully");
      }
    
        // echo "Uploaded";
     } else {
        echo "File was not uploaded";
     }
         
          return 1;
       
      }else{
       
        echo '<script>alert("extension not allowed, please choose a JPEG or PNG file.")</script>';
       return 0;
         //  print_r($errors);
      }
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



     // submit action
     $db= new DataOperation();
if (isset($_POST['submit'])){
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_desc = $_POST['product_desc'];
      // $product_picture = $_POST['product_picture'];
      if(isset($_FILES['product_picture'])){
        $file_name = $_FILES['product_picture']['name'];
        $file_type=$_FILES['product_picture']['type'];
        $ext=explode('.',$_FILES['product_picture']['name']);
        $file_ext=strtolower(end($ext));     
        $extensions= array("jpeg","jpg","png");   
        if(in_array($file_ext,$extensions)=== false){
            $errors.="Extension is not allowed, please choose a JPEG or PNG image.";
        }      
        if(empty($errors)==true){
         
         if (move_uploaded_file($_FILES['product_picture']['tmp_name'],dirname(__DIR__, 1)."/imgs/".basename($_FILES['product_picture']['name']))) {
          $saveData = "INSERT INTO product(product_name,product_price,product_desc,product_picture)VALUES('$product_name','$product_price','$product_desc','$file_name')";
      $insert =$db->insert($saveData);
      header('location:AddProducts.php');
          // echo "Uploaded";
       } else {
          echo "File was not uploaded";
       }
           
            return 1;
         
        }else{
         
          echo '<script>alert("extension not allowed, please choose a JPEG or PNG file.")</script>';
         return 0;
           //  print_r($errors);
        }
    }

}  

  



//  Select Data from database and show it in table 
$db = new DataOperation();
$query = "SELECT * FROM product";
$read = $db->select($query);


?>