<?php

$mysqli = new mysqli("localhost","root","2721997","cafe","3306") or die(mysqli_error($mysqli));

if (isset($_GET["delete"])){
    $id = $_GET['delete'];
    $mysqli->query("delete from orders where order_Id=$id") or die($mysqli->error());
    header("location: myorders.php");
}
?>