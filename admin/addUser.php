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
    <form class="row g-3 " action="addUserForm.php" method="post" enctype="multipart/form-data" style="width:60%; margin:auto;background-color:#DDB26D;border-radius:10%;">
  <div style="width:50%; margin:auto;"class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault01" class="form-label mt-3">UserName</label>
    <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault02" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
  </div>
  <div style="width:50%; margin:auto;"  class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Password</label>
    <div class="input-group">
      <input type="password" class="form-control" id="inputPassword"  aria-describedby="inputGroupPrepend2" required>
    </div>
  </div>
  <div  style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="inputPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="inputPassword" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault04" class="form-label">Room No</label>
    <input type="text" class="form-control" id="validationDefault01" required>
  </div>
  <div style="width:50%; margin:auto;" class="col-md-8">
    <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">EXT</label>
    <input type="text" class="form-control" id="validationDefault05" required>
  </div>
     <div style="width:50%; margin:auto;" class="col-md-8">
         <label style="color:white;font-size:25px;" for="validationDefault05" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="testfile" id="validationDefault05" >
        </div>
  <div style="width:50%; margin:auto;" class="col-md-8 my-3">
    <button style="background-color:brown; "class="btn btn-primary" type="submit">Submit</button>
  </div>
</form>
</div>
    
    <!-- <section class="content" >
    <form action="addUserForm.php" method="post" enctype="multipart/form-data">
    <label for="username" class="fomrLable" style="font-size: 100%;">User Name</label>
    <input type="text" name="username" id="username" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="email" class="fomrLable" style="font-size: 100%;">Email:</label>
    <input type="email" name="email" id="email" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="password" class="fomrLable" style="font-size: 100%;">Password:</label>
    <input type="password" name="password" id="password" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="confirmPass" class="fomrLable" style="font-size: 100%;">Confirm passowrd:</label>
    <input type="password" name="confirmpassword" id="confirmpassword" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="room" class="fomrLable" style="font-size: 100%;">Room No.</label>
    <input type="text" name="room" id="room" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="ext" class="fomrLable" style="font-size: 100%;">Ext</label>
    <input type="text" name="ext" id="ext" class="formInput" style="padding: 4px 4px;margin: 2px 0;" required><br>
    <label for="pic" class="fomrLable" style="font-size: 100%;">Profile picture</label>
    <input type="file" id="profilePic" name="profilePic" class="formInput" style="padding: 4px 4px;margin: 2px 0;" ><br>
    <input type="submit" value="submit" class ="save">
    <input type="reset" value="Reset" class="reset">
     </form>

    </section>  -->
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