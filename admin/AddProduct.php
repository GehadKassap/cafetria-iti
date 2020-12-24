<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ِAdd Product</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
      body{
        background-image: url(../imgs/2.jpg);
        background-size: cover;
        background-repeat: no-repeat;
      }
      h1{
        color: white;
      }
      label{
        color: white;
        font-weight: bold;
      }
    </style>
   
</head>
<body >
<div class="main" >
    <section>
        <h1 class="pageTitle mb-5"> Add New Product </h1>
        
    </section>
    
    <section class="content"  >
    <form id="form" class="form"  method="post" enctype="multipart/form-data" action="#">	


      <div class="inp_container">
        <!-- Start the input of product name -->
        <div class="row mb-3">
          <div class="input-group mb-3 ">
            <label for="textName" class="form-label ml-3 col-md-1">Name:</label>
           
            <input class="form-control ml-5 col-md-4" type="text" id="textName" placeholder="Tea" name="Name">
          </div>
        </div>
       <!-- End the input of product name -->

       <!-- Start the input of price -->
        <div class="row mb-3">
          <div class="input-group mb-3 ">
            <label for="Price" class="form-label ml-3 col-md-1 ">Price:</label>
           
            <input class="form-control ml-5 col-md-2" type="number" min="0.00" max="10000.00" step="0.1" id="Price" placeholder="3.50" required\> 
            <label for="" class="form-label ml-4 ">EGP</label>
          </div>
        </div>
       <!-- End the input of price -->

      
        <!-- Start select the category type -->
        <div class="row mb-5">
          <div class="input-group mb-4 ml-2  ">
            <label for="Select1" class="ml-2 col-md-1">Category:</label>
              <select class="form-control col-md-4 ml-5" id="Select1" required name="Category">
                <option value="">Select Category</option>  
                <option>Hot Drinks</option>
                <option>Soft Drinks</option>
              </select>
            <a href="#" class="ml-4" >Add Category</a>
          </div>
        </div>
       <!-- End select the category type -->


       <!-- Start input of uploading product picture -->
         <div class="row">
          <div class="input-group mb-3 ">
            <label for="formFile" class="form-label ml-4">Product Picture:</label>
           
            <input class="form-control ml-5 col-md-4" type="file" id="formFile" required>
          </div>
        </div>
     <!-- End input of uploading product picture -->

        <br/>
        <div class="buttons"> 
          <button type="submit" value="Save" class="btn btn-secondary btn-lg ml-5">Save</button>
          <button type="reset" value="Reset" class="btn btn-secondary btn-lg ml-5">Reset</button>
  
      </div>
   
      
    </form>

    
    </section>



  
  </div>  
  

<script  src="../js/jquery.js"></script>

<script src='../js/bootstrap.bundle.min.js'></script>


</body>
</html>