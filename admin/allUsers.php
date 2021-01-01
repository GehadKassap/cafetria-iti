<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/orders.css">
    <title></title>
</head>
<body style="background-image:url('../imgs/cover.jpg');background-size:cover;">
<?php include_once "AdminNav.php" ?>
<?php
include_once "progressUser.php";
    ?>
<div class="container">
  <div class="container ">
  <div class="row ">
    <div class="col-lg-6 col-md-4 col-sm-3 d-flex justify-content-start">
<h2 class= " my-4" style="color:white;">All Users</h2>
</div>
<div class="col-lg-6 col-md-4 col-sm-3  my-4 d-flex justify-content-end">
<button  type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="addUser.php">Add user</a></button>
</div>
</div>
</div>
<?php
       $mysqli = new mysqli("localhost","root","2721997","cafateria","3306") or die(mysqli_error($mysqli));
       $result = $mysqli->query("SELECT * FROM user") or die($mysqli->error);
       ?> 
<table style="background-color:white;" class="table table-striped table-hover">

  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Room</th>
      <th scope="col">Image</th>
      <th scope="col">EXT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
                 while($row = $result->fetch_assoc()):
                    $pic= $row['user_profile_picture']; ?>
                 <tr>
                     
                     <td><?php echo $row['user_name']; ?></td>
                     <td><?php echo $row['room_no']; ?></td>
                     <td><?php echo "<img style='width:80px ; height:80px' src='../imgs/$pic'>"; ?></td>
                     <td><?php echo $row['ext']; ?></td>
                     <td>
                       <form action="addUser.php" method="post">
                       <input type="hidden" name="edit_id" value="<?php echo $row['Id']?>">
                       <button type="submit" name="edit_data_btn" class="btn btn-info">edit</button>
                         <a href="progressUser.php?delete=<?php echo $row['Id']; ?>"
                         class="btn btn-danger">delete</a>
                     </td>
                 </tr>
                 <?php endwhile; ?>
</tbody>

<script src="../js/jquery.js"></script>
<script  src="../js/bootstrap.min.js"></script>

</body>
</html>
