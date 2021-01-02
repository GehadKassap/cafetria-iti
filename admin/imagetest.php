<?php

include "db.php";


if(isset($_POST['submit'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];

    $product_picture=$_FILES['product_picture']['name'];
    $upload="uploads/".$product_picture;

    $query="INSERT INTO product(product_name,product_price,product_desc,product_picture)VALUES(?,?,?,?)";
    $stmt=$con->prepare($query);
    $stmt->bind_param($product_name,$product_price,$product_desc,$upload);
    $stmt->execute();
    move_uploaded_file($_FILES['product_picture']['tmp_name'],$upload);
    header('location:AddProducts.php');
  
}





















?>