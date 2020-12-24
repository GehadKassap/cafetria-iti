<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/orders.css">
    <title>myorders</title>
</head>
<body style="background-image:url('../imgs/cover.jpg');background-size:cover;">
<?php
include_once "progress.php";
    ?>
    <div class="container">
<h2 class= "mx-5 my-4" style="color:white;">MyOrders</h2>
  <label class="mx-3 my-4" style="color:white;"> Date From:</label> <input type="date" placeholder="Date from" id="date-from"> 
     <label class="mx-3 my-4"style="color:white;">Date To:</label> <input type="date" placeholder="Date to" id="date-to">  
     <?php
       $mysqli = new mysqli("localhost","root","2721997","cafateria","3306") or die(mysqli_error($mysqli));
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
                     <td>
                         <a href="progress.php?delete=<?php echo $row['order_Id']; ?>"
                         class="btn btn-danger">delete</a>
                     </td>
                 </tr>
                 <?php endwhile; ?>
  </tbody>

  <tfoot>
      <tr>
    <td> <img class="mt-5"style="width:200px;height:200px; border-radius:50%;" src="../imgs/HotDrinks/cuphot.jpg">
    <div style="width:80px;height:80px;border-radius:50%;background-color:brown;position:relative; left:152px;top:-215px;"></div>
    <div style="color:white;position:relative; left:174px;top:-267px;">30L.E</div>
     </td>
    <td><img class="mt-5" style="width:200px;height:200px; border-radius:50%;" src="../imgs/HotDrinks/cuphot.jpg">
    <div style="width:80px;height:80px;border-radius:50%;background-color:brown;position:relative; left:152px;top:-215px;"></div>
    <div style="color:white;position:relative; left:174px;top:-267px;">30L.E</div>
</td>
    <td><img class="mt-5" style="width:200px;height:200px;  border-radius:50%;" src="../imgs/HotDrinks/cuphot.jpg">
    <div style="width:80px;height:80px;border-radius:50%;background-color:brown;position:relative; left:152px;top:-215px;"></div>
    <div style="color:white;position:relative; left:174px;top:-267px;">30L.E</div>
</td>
<td><img class="mt-5" style="width:200px;height:200px;  border-radius:50%;" src="../imgs/HotDrinks/cuphot.jpg">
    <div style="width:80px;height:80px;border-radius:50%;background-color:brown;position:relative; left:152px;top:-215px;"></div>
    <div style="color:white;position:relative; left:174px;top:-267px;">30L.E</div>
</td>
</tr>       
</tfoot>
</table>
   

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</body>
</html>