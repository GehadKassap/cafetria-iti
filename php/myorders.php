<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/orders.css">
    <title>myorders</title>
</head>
<body style="background-image:url('../imgs/cover.jpg');background-size:cover;">
<?php include_once "nav.php" ?>
<?php
include_once "progress.php";
    ?>
    <div class="container">
<h2 class= "mx-5 my-4" style="color:white;">MyOrders</h2>
  <label class="mx-3 my-4" style="color:white;"> Date From:</label> <input type="date" placeholder="Date from" id="date-from"> 
     <label class="mx-3 my-4"style="color:white;">Date To:</label> <input type="date" placeholder="Date to" id="date-to">  
     <?php
       $mysqli = new mysqli("localhost","root","2721997","cafe","3306") or die(mysqli_error($mysqli));
       $result = $mysqli->query("SELECT * FROM orders") or die($mysqli->error);
       ?> 
<table style="background-color:white;" class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">OrderDate</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
              <?php
                 while($row = $result->fetch_assoc()): ?>
                 <tr>
                     <td><?php echo $row['order_date']; ?></td>
                     <td><?php echo $row['status_Id']; ?></td>
                     <td><?php echo $row['order_action']; ?></td>
                     <?php if ($row['status_Id']=="progcessing"): ?>
                     <td>
                         <a href="progress.php?delete=<?php echo $row['order_Id']; ?>"
                         class="btn btn-danger">delete</a> 
                     </td> 
                     <?php else: ?>
                     <td> </td>
                     <?php endif; ?>
                   
                 </tr>
                 <?php endwhile; ?>
  </tbody>
  <?php
       $mysqli = new mysqli("localhost","root","2721997","cafe","3306") or die(mysqli_error($mysqli));
       $result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
       $result2 = $mysqli->query("SELECT * FROM productorder") or die($mysqli->error);
       ?> 
  <tfoot>
  <?php
                 while($row = $result->fetch_assoc()):
                  $pic= $row['product_picture']; ?>
                  
      <!-- <tr> -->
    <td><?php echo " <img class='mt-5'style='width:200px;height:200px; border-radius:50%;' src='../imgs/$pic'> "; ?>
    <div class="btn-danger" style='width:80px;height:80px;border-radius:50%;position:relative; left:152px;top:-215px;'></div>
    <div style='color:white;position:relative; left:174px;top:-267px;'> <?php echo $row['product_price']; ?> L.E</div>
    <div style='font-size:35px;color:red;position:relative; left:25px;top:-92px;'> <?php echo $row['product_name']; ?></div> 
     
  </td>

<!-- </tr>      -->
<?php endwhile; ?>  

<?php while($row = $result2->fetch_assoc()): ?>   
  <td>
  <div style='font-size:35px;color:red; position:relative;left:-730px;top:310px;'> <?php echo $row['quantity']; ?></div>     </td>
  <?php endwhile; ?>   
</tfoot>
</table>

<?php
       $result = $mysqli->query("SELECT sum(product_price) AS total FROM product") or die($mysqli->error);
       ?> 
       <?php  while($row = $result->fetch_assoc()): ?>
<div style=" height:100px;background-color:white; color:brown;font-size:55px;text-align:center;" class=" mb-5">Total : <?php echo $row['total']; ?></div>
   

</div><?php endwhile; ?> 
<script src="bootstrap.bundle.min.js"></script>
<script src="jquery.js"></script>
</body>
</html>