<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
    <style>
        section #form p
         {
           font-style : italic ;
            font-size : 20px;
            line-height: 1.25;
              color: #2879fe; 
           }
           #forgetValidate
           {
              position: absolute;
              top: 10%;
                display : none ; 
                left: 35%;
           }
    </style>
</head>
<body>
<section  id="singIn">
<div id="form">
        <div class="container">
        <p class="text-center "> welcome to our..</p>
        <h1 class="text-center mb-2">Cafeteria</h1>
        <p class="text-center mb-4">Forget Password! <span class="text-danger">never mind , re-enter your email and new password,</span> </p>
        <form name="login_form" action=""  method="POST" onsubmit="return validate()" class="w-100 m-auto">
            <div class="form-group text-center">
            <input id="userEmail" name="user_email" type="text" class=" form-control" placeholder="enter your email">
            <div class="alert alert-danger d-none mt-1" id="emailValidate" role="alert">
                    please enter your email!!
                </div> 
            </div>
            <div class="form-group text-center">
                <input id="userPass" name="user_pass"  type="password" class="form-control" placeholder="enter  your new password">
                <div class="alert alert-danger d-none mt-1 " id="passValidate" role="alert">
                       please enter your password!!
                </div> 
            </div>
        <button name="submit" class="btn btn-primary w-100">Submit </button>
        <p id="forgetPass" class="text-center mt-2" ><a  href="index.php"> Login </a></p>


        
        </form>
        </div>
</div>
       
</section >


<?php


 
$db = mysqli_connect('localhost' , 'root' , '11122ana gego*' , 'cafeteria') ;
 //sql injection
$userPass = mysqli_real_escape_string($db, $_POST['user_pass']);
$userEmail = mysqli_real_escape_string($db, $_POST['user_email']);
#when button is clicked
if(isset($_POST["submit"]))
{
     // SQL injections 

     

if(mysqli_query($db , "update User set user_password = '$userPass' where user_email = '$userEmail' "))
{
     
     
       echo  "<div class='alert alert-primary w-25 text-center  mt-1 d-block' id='forgetValidate' role='alert'>
               password Updated successuflly! 
                </div> ";
                header('location: home.php');
}
}
    /************************************** */
?>

 <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/jquery.particleground.min.js"></script>
<script src="../js/login.js"></script>
<script>
  function validate()
   {
       
       let userEmail = document.forms["login_form"]["user_email"].value;
       let userPass = document.forms["login_form"]["user_pass"].value;

       if(userEmail == "" &&userPass == "")
       {
        jQuery("#emailValidate").removeClass("d-none");
        jQuery("#passValidate").removeClass("d-none");
        return false ; 

       }
     
       if(userEmail == "")
       {
           jQuery("#emailValidate").removeClass("d-none");
           return false ; 
       }
       
      
       if(userPass == "")
       {
        jQuery("#passValidate").removeClass("d-none");
           return false ; 
       }

      
   };



</script>
   
   
</body>
</html>