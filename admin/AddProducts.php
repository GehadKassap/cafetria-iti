<!-- 
include 'Database.php';
$db = new Database();
 -->
 <?php

include "AddProductAction.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ِAdd Product</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
     #mainSection{
        background-image: url(../imgs/2.jpg);
        background-size: cover;
       height: 100vh;
        background-repeat: no-repeat;
        
      }
      .overlay{
      background-color: rgba(0,0,0,0.5);
      height: 100%;
         
      }
      h1{
        color: white;
      }
      label,a{
        color: white;
        font-weight: bold;
      }
      .labelTest{
          position: absolute;
          top:43%;
          left:53%;
      }
    .CatTest{
        position: absolute;
          top:57%;
          left:53%; 
    }
    </style>
   
</head>
<body >
<section id="mainSection" class="main">
    <div class="overlay"><br>
    
    <h1 class="pageTitle  ml-5"> Add New Product </h1><br>


<!-- to pass data from table to addproduct page to edit it -->
    <?php
     if(isset($_GET["update"])){
       $id = $_GET["product_Id"] ?? null;
       $where = array("product_Id"=>$id);
       $row = $obj->select_record("Product",$where);
     
       ?>

              <form id="form" class="form"  method="post"  action="AddProductAction.php" enctype="multipart/form-data"> <!--enctype="multipart/form-data"-->
                <div class="container">

                    <!-- Start the input of product name -->
                    <div class="form-group ">
                       <input type="hidden"  name="product_Id" value="<?php echo $id; ?>">
                     </div>
                     <div class="form-group ">
                       <label  class="form-label">Name:</label>
             
                       <input class="form-control  w-50 " type="text"  placeholder="Tea" name="product_name" value="<?php echo $row["product_name"]; ?>">
                     </div>
      
                    <!-- End the input of product name -->
                      <div class="form-group ">
                        <label for="Price" class="form-label ">Price:</label>
           
                        <input class="form-control w-50" type="number" min="0.00" max="10000.00" step="0.1" id="Price" name="product_price" placeholder="3.50" value="<?php echo $row["product_price"]; ?>" required\> <label for="" class="form-label labelTest">EGP</label>    
                      </div>

                      <div class="form-group ">
                         <label for="Select1" class="">Category:</label>
                          <select class="form-control w-50" id="Select1" required name="AddProCategory">
                           <option value="">Select Category</option>  
                           <option value="1">Hot Drinks</option>
                           <option value="2">Soft Drinks</option>
                          </select>
                            <a href="#" class="CatTest" >Add Category</a>
                       </div>

                        <div class="form-group ">
                          <label for="formFile" class="form-label">Product Picture:</label>
                            <input class="form-control w-50" type="file" id="formFile" name="product_picture" value="<?php echo $row["product_pictureproduct"]; ?>" required>
                       </div> <br>


                     <div class="form-group ">
                       <button type="submit" name="edit" value="" class="btn btn-primary btn-lg ml-5">Update</button>
                       <button type="reset" value="reset" class="btn btn-primary btn-lg ml-5">Reset</button>
                     </div>

               </div>
        </form>

       
       <?php
     } else {
      ?> 
      
      <form id="form" class="form"  method="post"  action="AddProductAction.php"> <!--enctype="multipart/form-data"-->
                <div class="container">

                    <!-- Start the input of product name -->
        
                     <div class="form-group ">
                       <label  class="form-label">Name:</label>
             
                       <input class="form-control  w-50 " type="text"  placeholder="Tea" name="product_name" >
                     </div>
      
                    <!-- End the input of product name -->
                      <div class="form-group ">
                        <label for="Price" class="form-label ">Price:</label>
           
                        <input class="form-control w-50" type="number" min="0.00" max="10000.00" step="0.1" id="Price" name="product_price" placeholder="3.50"  required\> <label for="" class="form-label labelTest">EGP</label>    
                      </div>

                      <div class="form-group ">
                         <label for="Select1" class="">Category:</label>
                          <select class="form-control w-50" id="Select1" required name="AddProCategory">
                           <option value="">Select Category</option>  
                           <option value="1">Hot Drinks</option>
                           <option value="2">Soft Drinks</option>
                          </select>
                            <a href="#" class="CatTest" >Add Category</a>
                       </div>

                        <div class="form-group ">
                          <label for="formFile" class="form-label">Product Picture:</label>
                            <input class="form-control w-50" type="file" id="formFile" name="product_picture"  required>
                       </div> <br>


                     <div class="form-group ">
                       <button type="submit" value="save" name="save" class="btn btn-primary btn-lg ml-5">Save</button>
                       <button type="reset" value="reset" class="btn btn-primary btn-lg ml-5">Reset</button>
                     </div>

               </div>
        </form>
      
      <?php
     }
    
    ?>

    
</div>
    
    </section>



  
</section>  
  

<script  src="../js/jquery.js"></script>

<script src='../js/bootstrap.bundle.min.js'></script>


</body>
</html>
