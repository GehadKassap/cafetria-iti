<?php
include '../php/DBconnect.php';
include '../php/selectorders.php';
include '../php/showorders.php';




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../css/login.css">-->
</head>
<body>


<?php
$orders=new showorders();
$orders->ShowAllOrders();
?>



<script src="../js/jquery-3.5.0.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/jquery.particleground.min.js"></script>

<script  src="../js/bootstrap.min.js"></script>
<!--<script src="../js/login.js"></script>-->
</body>
</html>
