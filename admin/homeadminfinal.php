<?php  
  $db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafe') ;
  session_start();
$selectDrink = "select * from product " ; 
 $resultDrink = mysqli_query($db , $selectDrink); 
$selectUser = "select * from User where `user_role`  = 'user' " ; 
$result = mysqli_query($db , $selectUser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        .lastOrderd img , .allDrinks img 
    {
      height: 200px; 
    }
    .forborder 
    {
    border: 1px solid rgb(220,53,69);
    background-color:  rgb(220,53,69);
    }
    #we 
    {
        border : 1px solid red ;
        
    }


    </style>
    </style>
</head>
<body>
<?php  include ('AdminNav.php') ; ?>
<section class="container-fluid mt-5">
    <div class="row">
         <div class="col-md-5">

         <form class="orderDetails" id="insertForm" action="" method="POST">
         <table class="w-100" >
         <tbody>
           <tr >
           <td class="bg-danger text-center  w-25"> <span><b class="text-bold mr-3 font-italic">close All Order</b> <i class="fas fa-times fa-2x " id="closeBtn"></i></span></td>

           </tr>
           <tr id="close"></tr>
         <tr>
         <td>
         <div class="mb-3 ">
                <label for="exampleFormControlTextarea1" class="form-label font-italic"><b>Notes</b></label>
                <textarea id="notes" name="notes" class="form-control w-100"  rows="3"></textarea>
              </div>
         </td>
         </tr>
         <tr>
         <td >
                <select name="rooms"  id="room" class="w-75">

                <option value="room1">room1</option>
                <option value="room2">room2</option>
                <option value="room3">room3</option>
                <option value="room4">room4</option>

                </select>
         </td>
         </tr>
         <tr>
         <td><div class="forborder mt-3"></div> </td>
         </tr>
         <tr>
         <td> <p class=" mt-2"><b>total is :</b> EGP <span id="totalPrice" name="totalPrice">0</span></p>  </td>
         </tr>
         <tr>
           <td>
           <button class="btn btn-danger " name="confirm" id="confirm">Confirm order</button>
           </td>
         </tr>
         </tbody>
         </table>
         
       </form>









         </div>
         <!------>
         <div class="col-md-7">
         <h2 class="pb-2 font-italic" >order for use </h2>
            <div class="displayUsers">
            <select class="form-select w-75" aria-label='Default select example'>

             <?php 

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
                 

                 if(mysqli_num_rows($resultDrink) > 0)
                 {
                    while($row = mysqli_fetch_array($resultDrink))
                    {
                        ?>
                       
                    <div class="col-md-4 mb-2">
                   
                        <div class="card" >
                          <img  src="<?php echo $row["product_picture"]; ?>" alt="" class="card-img-top">
                           <div class="card-body text-center">
                               <h5 class="card-title"> <?php echo $row["product_name"]; ?></h5>
                               <p class="card-text"> <?php echo $row["product_desc"]; ?><span class="badge badge-danger ml-1 p-2"><?php echo $row["product_price"] ; ?></span></p>
                               <button class="btn btn-info">Order for User Now</button>
                               <!-- <button class="btn btn-info" name="img_choice">view </button> -->
                               <input type="hidden" name="drink_name" value="<?php echo $row["product_name "]; ?>">
                               <input type="hidden" name="drink_price" value="<?php echo $row["product_price"]; ?>">
                               <input type="hidden" name="drink_desc" value="<?php echo $row["product_desc"]; ?>">
                           </div>


                        </div>
                       
                    </div>
                        <?php
                       
                    }
                 }
                 else
                 {
                  echo "<h1 class='text-danger text-center text-bold' style='font-size:22px'>No Drinks </h1>";
                 }
                 
                  ?>






              
                </div>
             </div> 




<!------------------------------------------------------------------>
         </div>










    </div>
</section>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/homefinal.js"></script>
</body>
</html>