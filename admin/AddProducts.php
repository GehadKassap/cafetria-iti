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
    <link rel="stylesheet" href="../css/bootstrap.css">
    
   
  
    <style>
     #mainSection{
        background-image: url(../imgs/cover.jpg);
        background-size: cover;
       /* height: 100vh; */
       width:100%;
        background-repeat: no-repeat;
        
      }
      .overlay{
      background-color: rgba(0,0,0,0.6);
      height: 100vh;
         
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
          top:49%;
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
<div class="overlay">
<?php

include "AdminNav.php";

?><br>
   
    
    <h1 class="pageTitle  ml-5 mb-5"> Add New Product </h1>


<!-- to pass data from table to addproduct page to edit it -->
    <?php
     if(isset($_GET["update"])){
       $id = $_GET["product_Id"] ?? null;
       $where = array("product_Id"=>$id);
       $row = $obj->select_record("Product",$where);
     
       ?>

              <form id="form" class="form "  method="post"  action="AddProductAction.php" enctype="multipart/form-data" enctype="multipart/form-data">
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



                         <!-- حتة الكاتيجوري انه يقراها من الداتا بيو محتاجه اظبط التربيط مش ظاهره خالص -->
                       
                         
                         <?php
                         $mysqli = new mysqli ('localhost','root','012256','cafeteria');
                         $resultSet= $mysqli->query("SELECT product_name FROM product");
                          ?>
                            <select name="product" class="form-control w-50">
                                <?php

                         while($rows = $resultSet->fetch_assoc()){
                        $dep_name=$rows['product_name'];
                          echo "<option value='$dep_name'>$dep_name</options>";
                             }
                             
                              ?>
                              </select>
                                  <!-- حتة الكاتيجوري انه يقراها من الداتا بيو محتاجه اظبط التربيط مش ظاهره خالص -->


                          <!-- <select class="form-control w-50" id="Select1" required name="AddProCategory">
                           <option value="">Select Category</option>  
                           <option value="1">Hot Drinks</option>
                           <option value="2">Soft Drinks</option>
                          </select> -->
                            <!-- <a href="#" class="CatTest" >Add Category</a> -->
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
      
      <form id="form" class="form"  method="post"  action="AddProductAction.php" enctype="multipart/form-data" enctype="multipart/form-data">
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

                      <div class="form-group">
                         <label for="Select1" class="mb-3">Category:</label>
                         
                         <?php
                         $mysqli = new mysqli ('localhost','root','012256','cafeteria');
                         $resultSet= $mysqli->query("SELECT product_name FROM product");
                          ?>
                            <select name="product" class="form-control w-50">
                                <?php

                         while($rows = $resultSet->fetch_assoc()){
                        $dep_name=$rows['product_name'];
                          echo "<option value='$dep_name'>$dep_name</options>";
                             }
                             
                              ?>
                              </select>
                          <!-- <select class="form-control w-50" id="Select1" required name="AddProCategory">
                           <option value="">Select Category</option>  
                           <option value="1">Hot Drinks</option>
                           <option value="2">Soft Drinks</option>
                          </select> -->
                            <!-- <a href="#" class="CatTest" >Add Category</a> -->
                      
                       </div>
                       

                        <div class="form-group ">
                          <label for="formFile" class="form-label">Product Picture:</label>
                            <input class="form-control w-50" type="file" id="formFile" name="product_picture"  required>
                       </div> <br>


                     <div class="form-group ">
                       <button type="submit" value="save" name="save" class="btn btn-primary btn-lg ml-5">Save</button>
                       <button type="reset" value="reset" class="btn btn-primary btn-lg ml-5">Reset</button>
                       <button type="button" class="btn btn-primary btn-lg ml-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Category</button>
                     </div>
                     


<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-body" id="exampleModalLabel">Add New Category</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form" class="form "  method="post"  action="AddProductAction.php" enctype="multipart/form-data">
          <div class="form-group">
            <p  class="col-form-label text-body">Category Name:</p>
            <input type="text" class="form-control" id="recipient-name" name="catagory_name">
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="Add">Add</button>
      </div>
    </div>
  </div>
</div>


               </div>
        </form>
      
      <?php
     }
    
    ?>



    
</div>
    
    </section>



  
</section>  


  
<!-- <script src='../css/jquery.js'></script> -->
   <!-- <script src='../js/bootstrap.min.js'></script>
<script  src="../js/jquery.js"></script>

 <script src='../js/bootstrap.bundle.min.js'></script> -->


</body>
</html>
