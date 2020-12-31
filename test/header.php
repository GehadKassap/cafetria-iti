
<?php 
  $db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafeteria') ;
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>admin Home</title>
</head>

<body>
      
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homeadmin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="myorder.php" class="btn btn-danger">my Orders(0)</a>
        </li>

     
      </ul>

    </div>
  </div>
</nav>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>