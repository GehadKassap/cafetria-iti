

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
    <link rel="stylesheet" href="../css/AllProducts.css">
   
  
   
</head>
<body>


  <section id="mainSection" class="main">
    <div class="overlay">
      <?php include "AdminNav.php";?> 
   
         <h1 class="pageTitle  ml-5"> Add New Product </h1><br>

     <!-- to pass data from table to addproduct page to edit it -->
                     <?php
                      if(isset($_GET["update"])){
                      $id = $_GET["product_Id"] ?? null;
                      $where = array("product_Id"=>$id);
                      $row = $obj->select_record("Product",$where);
     
                    ?> 
                   

              <form id="form" class="form"    action="AddProductAction.php" method="POST" enctype="multipart/form-data"> 
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

                           <!-- Start Select data from DB and fetch it in select options -->
                            <?php
                             $mysqli = new mysqli ('localhost','root','012256','cafe');
                             $resultSet= $mysqli->query("SELECT catagory_name FROM catagory");
                            ?>
                          <select name="catagory" class="form-control w-50">
                            <option placeholder="select category"></option>
                            <option placeholder="select category">Hot Drinks</option>
                            <option placeholder="select category">Cold Drinks</option>
                            <?php
                             while($rows = $resultSet->fetch_assoc()){
                             $Cat_name=$rows['catagory_name'];
                            echo "<option value='$Cat_name'>$Cat_name</options>";
                             }
                            ?>
                          </select>
                           <!-- End Select data from DB and fetch it in select options -->
                        </div>

                        

                        <div class="form-group ">
                          <label for="formFile" class="form-label">Product Picture:</label>
                            <input class="form-control w-50" type="file" id="formFile" name="product_picture" value="<?php echo $row["product_picture"]; ?>" required>
                       </div> <br>

                         <div class="form-group ">
                          <label for="formFile" class="form-label">Product Description:</label>
                          
                            <textarea class="form-control w-50" type="file" id="formFile" name="product_desc" value="<?php echo $row["product_desc"]; ?>" required></textarea>
                         </div>

                         <div class="">
                          <button type="submit" name="edit" value="" class="btn btn-primary btn-lg ml-5">Update</button>
                          <button type="reset" value="reset" class="btn btn-primary btn-lg ml-5">Reset</button>
                        </div>

                </div><br>
              </form>

       
              <?php  } else {?>
      
                 <form id="form" class="form" name="AddForm"   action="AddProductAction.php" method="POST" enctype="multipart/form-data"> 
                    <div class="container">

                     <!-- Start the input of product name -->
                     <div class="form-group ">
                       <label  class="form-label">Name:</label>
             
                       <input class="form-control  w-50 " type="text"  placeholder="Tea" name="product_name" >
                     </div>
      
                     <!-- End the input of product name -->
                      <div class="form-group ">
                        <label for="Price" class="form-label ">Price:</label>
           
                        <input class="form-control w-50" type="number" min="0.00" max="10000.00" step="0.1" id="Price" name="product_price" placeholder="3.50 EGP"  required\>    
                      </div>

                        <div class="form-group ">
                         <label for="Select1" class="">Category:</label>
                         <!-- Start the input of product name --> 
                         <?php
                         $mysqli = new mysqli ('localhost','root','012256','cafe');
                         $resultSet= $mysqli->query("SELECT catagory_name FROM catagory");
                          ?>
                            <select name="catagory" class="form-control w-50">
                            <option placeholder="select category"></option>
                            <option placeholder="select category">Hot Drinks</option>
                            <option placeholder="select category">Cold Drinks</option>
                                <?php

                             while($rows = $resultSet->fetch_assoc()){
                             $Cat_name=$rows['catagory_name'];
                              echo "<option value='$Cat_name'>$Cat_name</options>";
                             }
                             
                              ?>
                              </select>
                        </div>

                        <div class="form-group ">
                          <label for="formFile" class="form-label">Product Picture:</label>
                            <input class="form-control w-50" type="file" id="formFile" name="product_picture"  required> 
                        </div>
                       <div class="form-group ">
                          <label  class="form-label">Product Description:</label>
                            <textarea class="form-control w-50" type="file"  name="product_desc" required> </textarea>
                       </div>


                     <div class="form-group row ml-5">
                       <button type="submit" value="save" name="submit" class="btn btn-primary btn-lg col-md- mr-2">Submit</button>
                       <button type="reset" value="reset" class="btn btn-primary btn-lg col-md- mr-2">Reset</button>
                       <button type="button" class="btn btn-primary btn-lg col-md-" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Category</button>
                     </div></br>

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
                              <form id="CatForm" class="form"  method="post"  action="AddProductAction.php" enctype="multipart/form-data" name="CatForm"> 
                                <div class="form-group">
                                     <p  class="col-form-label text-body">Category Name:</p>
                                     <input type="text" class="form-control" id="recipient-name" name="catagory_name">
                                 </div>
         
                              </form>
                           </div>
                           <div class="modal-footer">
                           <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                           <button type="submit" for="CatForm" class="btn btn-primary" name="Add">Add</button>
                          </div>
                        </div>
                      </div>

                    </div>   
                  </form>
      
                  <?php } ?>
                    
     </div>
    
    </section>



    <script src='../js/jquery.js'></script>
    <script src='../js/bootstrap.min.js'></script>

  </body>
</html>
