<?php 
  $db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafeteria') ;
  session_start();
 ?>|

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
  
 <?php  include ('AdminNav.php') ; ?>
<section class="container-fluid mt-5">
    <div class="row">
        <!------for choice of user------->
        <div class="col-md-5 " >
            <div id="showContainer" method="POST" action="">
            <!--this part for display drinks when user click on img-->
            <div class="displayDrinks p-3">
                <div class="row">
                    <div class="col-md-12" id="content">
                       <span class="drinkName" name="name"></span>
                       <span class="numsOfDrinks px-3 py-2">1</span>
                       <span><i class="fas fa-plus " id="plus"></i></span>
                       <span><i class="fas fa-minus" id="minus"></i></span>
                       <span class="priceOfDrinks p-2"></span>
                        <span> <i class="fas fa-times fa-2x " id="close"></i></span>
                        
                     </div>
              
                     <!-- <?php
session_start();
 $name = $_POST["name"];
 echo "<h1>$name </h1>";

?> -->
            
            </div>
            <div class="mb-3 mt-1">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Notes</b></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

 
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Room
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Room 1</a></li>
                  <li><a class="dropdown-item" href="#">Room 2</a></li>
                  <li><a class="dropdown-item" href="#">Room 3</a></li>
                </ul>
              </div>
        
            <img src="" id="imgDisplay"  alt="" class="w-50 my-2">
              <div class="forborder"></div>
              <p class="float-right mt-2">total is : EGP <span>321</span></p>
              <div class="clearfix"></div>

              <button class="btn btn-primary float-right">Confirm order</button>
              <div class="clearfix"></div>
           

            </div>
        </div>
        </div>

        <!-------------------------->
         <!------for display to user------->
         <div class="col-md-7">
        <h2 class="pb-2 font-italic" >order for use </h2>
            <div class="displayUsers">
            <select class="form-select w-75" aria-label='Default select example'>

             <?php 
                              $selectUser = "select * from User where `user_role`  = 'user' " ; 
                              $result = mysqli_query($db , $selectUser);
                              if(mysqli_num_rows($result) > 0)
                              {
                                
                                echo " <option selected>All Users</option>  " ;
                                 while($row = mysqli_fetch_array($result))
                                 {
                                     ?>
                                     <option value='<?php echo $row["user_name"]  ;?>'> <?php echo $row["user_name"]  ;?></option>
                             
                                
                                     <?php
                                    
                                 }
                               
                              }
                             













            
            ?>
            </select>
            </div>
          
             <div class="allDrinks mt-4">
                <h2 class="pt-2 pb-3 font-italic" >All Drinks </h2>
                <div class="row">
                  <?php
                 
                 $selectDrink = "select * from Product " ; 
                 $result = mysqli_query($db , $selectDrink);
                 if(mysqli_num_rows($result) > 0)
                 {
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                       
                    <div class="col-md-4 mb-2">
                    <form method="GET" action="">
                        <div class="card" >
                          <img  src="<?php echo $row["product_picture"]; ?>" alt="" class="card-img-top">
                           <div class="card-body text-center">
                               <h5 class="card-title"> <?php echo $row["product_name"]; ?></h5>
                               <p class="card-text"> <?php echo $row["product_desc"]; ?><span class="badge badge-danger ml-1 p-2"><?php echo $row["product_price"] . " L.E"; ?></span></p>
                               <!-- <button class="btn btn-info" name="img_choice">view </button> -->
                               <input type="hidden" name="drink_name" value="<?php echo $row["product_name"]; ?>">
                               <input type="hidden" name="drink_price" value="<?php echo $row["product_price"]; ?>">
                               <input type="hidden" name="drink_desc" value="<?php echo $row["product_desc"]; ?>">
                           </div>


                        </div>
                        </form> 
                    </div>
                        <?php
                       
                    }
                 }
                 else
                 {
                  echo "<h1 class='text-danger' style='font-size:22px'>There is No Drinks Yet </h1>";
                 }
                 
                  ?>






              
                </div>
             </div>
         </div>
        


       
    </div>    
</section>




<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/home.js"></script>
</body>
</html>