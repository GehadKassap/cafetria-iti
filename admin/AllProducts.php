

<?php

include "AddProductAction.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/AllProducts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>

      <?php include "AdminNav.php";?><br><br>
    <section id="MainSection " >
        <div class="container-lg  ">
            <div class="table-striped table-hover  "><!-- table-bordered-->
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="text-dark ml-4"><h2>All Products</h2></div>
                            <div class="col-sm-4 " id="add">
                             <p class="">   <a href="AddProducts.php" class="badge badge-light  " id="add">Add Product</a><p>
                       
                            </div>
                        </div>
                    </div>
                    <table class="table table-fixed table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center"> Id</th>
                                <th class="text-center"> Product </th>    
                                <th class="text-center"> Price </th>    
                                <th class="text-center"> Image </th>    
                                <th class="text-center"> Action</th>    
                            </tr>
                        </thead>
                       <tbody>
                       <?php if ($read) { ?>

                        <?php while($row = $read->fetch_assoc()) {
                            $pic= $row['product_picture'];  ?>
                         
                                   <tr>
                                   <td class="text-center align-middle "><?php echo $row["product_Id"]; ?></td>
                                      <td class="text-center align-middle"><?php echo $row["product_name"]; ?></td>
                                      <td class="text-center align-middle"><?php echo $row["product_price"]; ?><span class="ml-2">EGP<span></td>
                                      
                                      <td class="text-center"><?php echo "<img class='rounded-circle' style='width:80px ; height:80px' src='../imgs/$pic'>"; ?> </td>
                                      <td class="text-center align-middle">
                                      
                                        
                                        <a href="AddProducts.php?update=1&product_Id=<?php echo $row["product_Id"]; ?>" class="edit align-middle" title="Edit" data-toggle="tooltip"><i class="material-icons FIcon">&#xE254;</i></a>
                                        <a href="AddProductAction.php?delete=1&product_Id=<?php echo $row["product_Id"]; ?>" class="delete align-middle" title="Delete" data-toggle="tooltip"><i class="material-icons SIcon">&#xE872;</i></a><br>
                                        <p class="text-center text-primary"><?php echo $row["pro_status"]; ?></p>
                                      </td>
                                  </tr> 
                                  <?php } ;?>
								<?php } ;?>
                         
                        </tbody>
                       
                
                         
                            
                       
                    </table>
                    
                </div>
            </div>
        </div>     
   
    </section>



    <script  src="../js/jquery.js"></script>
   <!-- <script src='../js/bootstrap.bundle.min.js'></script> -->

 </body>
</html>


