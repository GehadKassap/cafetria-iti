<?php 
 include ("header.php");
 $db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafeteria') ;
 $selectDrink = "select * from Product " ; 
 $result = mysqli_query($db , $selectDrink);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
       <div class="row">
       <?php 
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
               ?>
                <div class="col-md-4 mb-3">
                  <form action="mangeCard.php" method="POST">
                    <div class="card">
                    <img src="<?php echo $row["product_picture"]; ?>" class="card-img-top">
                    <div class="card-body text-center">
                     <h5 class="card-title"> <?php echo $row["product_name"]; ?></h5>
                     <p class="card-text"> <?php echo $row["product_desc"]; ?><span class="badge badge-danger ml-1 p-2"><?php echo $row["product_price"] . " L.E"; ?></span></p>
                     <button class="btn btn-danger" name="add_order"> add to order</button>
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









<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>

</body>
</html>