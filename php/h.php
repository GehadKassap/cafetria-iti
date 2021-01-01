<?php  
$db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafeteria') ;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">


    <div class="row">
        <div class="col-md-5">
        </div>          

        <!--------------------------------------->
        <div class="col-md-7">
           <h2 class="pb-2" >your Lastest Drinks </h2>
           <div class="favDrinks ">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="card" >
                            <img src="../imgs/ColdDrinks/delicious-banana-milkshake.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Banana with milk Juice</h5>
                                <p class="card-text"> Lorem ipsum dolor sit amet consectetur<span class="badge badge-danger">30</span></p>
                            </div>


                         </div>
                         
                     </div>
                     <div class="col-md-4">
                         <div class="card">
                            <img src="../imgs//HotDrinks/joe-hepburn-EcWFOYOpkpY-unsplash.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"> Cabatshinoe</h5>
                                <p class="card-text"> Lorem ipsum dolor sit amet consectetur.<span class="badge badge-danger">25</span></p>
                            </div>


                         </div>
                         
                     </div>
               
                 </div>



             </div>
             <!--- t7t l fav-->
                <div class="allDrinks mt-4">
                <h2 class="pt-2 pb-3" >All Drinks </h2>
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
                        <div class="card" >
                           <img src="<?php echo $row["product_picture"]; ?>" alt="" class="card-img-top">
                           <div class="card-body">
                               <h5 id="drinkname" class="card-title"> <?php echo $row["product_name"]; ?></h5>
                               <p class="card-text"> <?php echo $row["product_desc"]; ?><span class="badge badge-danger ml-2 p-2"><?php echo $row["product_price"] ; ?></span></p>
                           </div>


                        </div>
                        
                    </div>
                        <?php
                       
                    }
                 }
                 else
                 {

                 }
                 
                  ?>






              
                </div>
             </div>









        
        
           
  

<!-- 2flt l row $ container -->
        </div>
    </div>
    
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/test.js"></script>

</body>
</html>