<?php  
$db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafe') ;
$selectDrink = "select * from Product " ; 
$selectOrder = "select * from Orders where order_Id = '1'" ; 
$result = mysqli_query($db , $selectDrink);
$orderresult = mysqli_query($db , $selectOrder);
session_start();
$i =1 ; 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
</head>
<body>
<?php  include ('nav.php') ; ?>
<div class="container mt-5">
  <div class="row">
      <!--- start of order details---->
    <div class="col-md-5 mt-5 p-4 mb-4 " id="we">
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
    <!--- end of order details---->
     <!--- start of  display last order and all drinks--->
     <div class="col-md-7">
        <!----- it have 2 parts ------->
        <!-------- first part last order------------>
        <div class="lastOrderd mt-5">
        
            <div class="row">
            <div class="col-md-9 mt-3">
            <?php 
                 if(mysqli_num_rows($orderresult)  > 0)
                 {
                   ?>
                   <h3 class="text-info font-italic mb-2">Last Orders </h3>
                   <?php 
                    while($row = mysqli_fetch_array($orderresult))
                    {
                        ?>
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                           <div class="card-body">
                               <!-- <span><?php  echo $i++ ;  ?></span> -->
                               <h5 id="drinkname" class="card-title"> <?php echo $row["drinkName"]; ?></h5>
                               <p class="card-text"> <?php echo $row["notes"]; ?><span class="badge badge-danger ml-2 p-2"><?php echo $row["order_date"] ; ?></span></p>
                           </div>


                        </div>
                        
                    </div>
                    <?php 
                    }
                 }
                 else 
                 {
                     echo " <h1 class='text-info font-italic text-center'>Welcome  to our cafe,,,!</h1>"; 
                 }
                 ?>
            </div>
            </div>
        </div>
         <!-------- first part last order------------>
         <div class="allDrinks mt-5">
         <h3 class="text-info font-italic pb-4 ml-4 ">All Drinks ?</h3>

         <div class="row" id="DrinksData">
                 <?php 
                 if(mysqli_num_rows($result) > 0)
                 {
                  ?>
                  <?php 
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                           <img src="<?php echo $row["product_picture"]; ?>" alt="" class="card-img-top" data-target="#<?php echo $row["product_Id"] ?>">
                           <div class="card-body">
                               <!-- <span><?php  echo $i++ ;  ?></span> -->
                               <h5 id="drinkname" class="card-title"> <?php echo $row["product_name"]; ?></h5>
                               <p class="card-text"> <?php echo $row["product_desc"]; ?><span class="badge badge-danger ml-2 p-2"><?php echo $row["product_price"] ; ?></span></p>
                               <button class="btn btn-info">Order Now</button>
                           </div>


                        </div>
                        
                    </div>
                    <?php 
                    }
                 }
                 else 
                 {
                     echo " <h1 class='text-danger ml-5 font-italic'>No Drinks Here Yet!</h1>"; 
                 }
                 ?>





         </div>


         </div>
       

 <!--- end of col-md*7 -->
    </div>
 <!--------------------------------------------->
   </div>
</div>

<!--------- ----------->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/homefinal.js"></script>

<!-- <?php 
     if(!empty($_POST))
     {
       $output = '' ; 
       $name = mysqli_real_escape_string($db , $_POST["namedrink"]);
       $price = mysqli_real_escape_string($db , $_POST["totalPrice"]);
       $quantity = mysqli_real_escape_string($db , $_POST["numberDrink"]);
       $notes = mysqli_real_escape_string($db , $_POST["notes"]);
       $room = mysqli_real_escape_string($db , $_POST["room"]);

       $insert = "insert into Orders 
                 (drinkName , room , order_price , , user_Id , notes) 
                 values 
                 ( '$name' ,'$room', '$price'  ,'1'  , '$notes')
                 ";
        if(mysqli_query($db , $insert))
        {
          $selected = "select * from Orders "  ;
          $res = mysqli_query($db , $selected);

        }         



     }
?> -->
</body>
</html>