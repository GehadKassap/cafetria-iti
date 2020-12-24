<!-- 
include 'Database.php';
$db = new Database(); -->

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .badge{
            font-size: 18px;
            color: rgb(71, 167, 212);
        }
      
        .container-lg{
        margin-top: 7rem;
        }
    
        td{
            font-weight: bold;
        }
        .FIcon{
            color: red;
        }
        .SIcon{
        color: rgb(236, 98, 34);
        }
    </style>
</head>
<body>


    <section id="MainSection" >
        <div class="container-lg">
            <div class="table ">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8 "><h2>All Products</h2></div>
                            <div class="col-sm-4 mb-1">
                                <a href="AddProducts.php" class="badge badge-light ">Add Product</a>
                       
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center"> Id</th>
                                <th class="text-center"> Product </th>    
                                <th class="text-center"> Price </th>    
                                <th class="text-center"> Image </th>    
                                <th class="text-center"> Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         
                         $myrow = $obj->fetch_record("Product");
                         foreach ($myrow as $row){
                             //breaking point
                           
                             ?> 
                                   <tr>
                                   <td class="text-center"><?php echo $row["product_Id"]; ?></td>
                                      <td class="text-center"><?php echo $row["product_name"]; ?></td>
                                      <td class="text-center"><?php echo $row["product_price"]; ?></td>
                                      <td class="text-center"><?php echo '<img src="data:image;base64,'.base64_encode($row['product_pictureproduct']).'" alt="Image" style="width:100px; height:100px;" >' ; ?> </td>
                                      <td class="text-center">
                                        <!-- <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a> -->
                                        <a href="AddProducts.php?update=1&product_Id=<?php echo $row["product_Id"]; ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons FIcon">&#xE254;</i></a>
                                        <a href="AddProductAction.php?delete=1&product_Id=<?php echo $row["product_Id"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons SIcon">&#xE872;</i></a>
                                      </td>
                                  </tr> 
                             
                             
                             <?php
                         
                         }

                        ?>
                        </tbody>
                       
                
                         
                            
                       
                    </table>
                </div>
            </div>
        </div>     
   
    </section>
    <script  src="../js/jquery.js"></script>
    <script src='../js/bootstrap.bundle.min.js'></script>

</body>
</html>


