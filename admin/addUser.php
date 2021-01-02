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

    <h1 style="color:white; margin-left:189px !important" class="mx-5 my-3"> Add New User </h1>
    <div class="container">
    
<?php 



$connection =new mysqli("localhost","root","2721997","cafe","3306") or die(mysqli_error($mysqli));

if(isset($_POST['edit_data_btn'])){
  $id =$_POST['edit_id'];
  $query = "select * from user where id='$id' ";
  $query_run = mysqli_query($connection, $query);
  foreach($query_run as $row)
  {

  ?>



    <form class="row g-3 " action="code.php" method="post" enctype="multipart/form-data" style="width:60%; margin:auto;background-color:#DDB26D;border-radius:10%;">
  <div style="width:50%; margin:auto;"class="col-md-8">
  <input type='hidden' name="edit_id" value="<?php echo $row['Id']?>">
    <label style="color:white;font-size:25px;" for="validationDefault01" class="form-label mt-3">UserName</label>
    <input type="text" class="form-control" name="username" id="validationDefault01" value="<?php echo $row['user_name']?>" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationDefault02" name="email" value="<?php echo $row['user_email']?>" required>
  </div>
  <div style="width:50%; margin:auto;"  class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Password</label>
    <div class="input-group">
      <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $row['user_password']?>" aria-describedby="inputGroupPrepend2" required>
    </div>
  </div>
  <div  style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" id="inputPassword" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault04" class="form-label">Room No</label>
    <input type="text" class="form-control" name="room" id="validationDefault01" value="<?php echo $row['room_no']?>" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">EXT</label>
    <input type="text" class="form-control" name="ext" id="validationDefault05" value="<?php echo $row['ext']?>" required>
  </div>
     <div style="width:50%; margin:auto;" class="col-md-8">
         <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="profilePic" value="<?php echo $row['user_profile_picture']?>" id="validationDefault05" >
        </div>
  <div style="width:50%; margin:auto;" class="col-md-8 my-3">
    <button style="background-color:brown; "class="btn btn-primary" type="submit" name="update_btn">Update</button>
  </div>
</form>
<?php 
  }
}else {
  ?>
  <form class="row g-3 " action="addUserForm.php" method="post" enctype="multipart/form-data" style="width:60%; margin:auto;background-color:#DDB26D;border-radius:10%;">
  <div style="width:50%; margin:auto;"class="col-md-8">
  <input type='hidden' name="edit_id" value="<?php echo $row['Id']?>">
    <label style="color:white;font-size:25px;" for="validationDefault01" class="form-label mt-3">UserName</label>
    <input type="text" class="form-control" name="username" id="validationDefault01"  required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationDefault02" name="email" required>
  </div>
  <div style="width:50%; margin:auto;"  class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Password</label>
    <div class="input-group">
      <input type="password" class="form-control" name="password" id="inputPassword"  aria-describedby="inputGroupPrepend2" required>
    </div>
  </div>
  <div  style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmpassword" id="inputPassword" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault04" class="form-label">Room No</label>
    <input type="text" class="form-control" name="room" id="validationDefault01" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">EXT</label>
    <input type="text" class="form-control" name="ext" id="validationDefault05" required>
  </div>
     <div style="width:50%; margin:auto;" class="col-md-8">
         <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="profilePic" id="validationDefault05" >
        </div>
  <div style="width:50%; margin:auto;" class="col-md-8 my-3">
    <button style="background-color:brown; "class="btn btn-primary" type="submit">Submit</button>
    <button style="background-color:brown;/" type="reset" value="Reset" class="btn btn-secondary ml-3">Reset</button>
  </div>
</form>
<?php
}
  ?>
</div>
    </div>
    <p class="errorMsg">
      <?php
        if(isset($_GET['error'])){
          if($_GET['error'] == 'duplicate'){
              echo "duplicate entry please check data entered";
          } else{
            echo "Something went wrong";
          }
        }
      ?>
    </p>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</body>

</html>