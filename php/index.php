

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<section  id="singIn">
<div id="form">
        <div class="container">
        <p class="text-center "> welcome to our..</p>
        <h1 class="text-center mb-5">Cafeteria</h1>
        <form name="login_form" action=""  method="POST" onsubmit="return validate()" class="w-100 m-auto">
            <div class="form-group text-center">
            <input id="userName" name="user_name" type="text" class=" form-control" placeholder="enter your username">
            <div class="alert alert-danger d-none mt-1" id="nameValidate" role="alert">
                    please enter your name!!
                </div> 
            </div>
            <div class="form-group text-center">
                <input id="userPass" name="user_pass"  type="password" class="form-control" placeholder="enter your password">
                <div class="alert alert-danger d-none mt-1 " id="passValidate" role="alert">
            please enter your password!!
                </div> 
            </div>
        <button name="register" class="btn btn-primary w-100">Login </button>
        </form>
        </div>
</div>
       
</section>

<?php
session_start();
 $userName = "" ;
 $userPass = "" ;
 $errs = array() ;
$db = mysqli_connect('localhost' , 'root' , '' , 'cafeteria') ;

#when button is clicked
if(isset($_POST["register"]))
{
    // SQL injections 
    $userName = mysqli_real_escape_string($db, $_POST['user_name']); 
    $userPass = mysqli_real_escape_string($db, $_POST['user_pass']);
     
    if(empty($userName))
    {
      array_push($errs , "the name is empty") ;
    }
    if(empty($userPass))
    {
      array_push($errs , "the pass is empty") ;
    }
    if(count($errs) == 0)
    {
        #$userPass = md5( $userPass) ; //encyrpted password before comparing;
        $selectUser = "select * from User where user_name  = '$userName' and  user_password  = '$userPass' ";
        $result = mysqli_query($db , $selectUser ) ; 
        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['user_name'] = $userName;
            $_SESSION['success'] = "u r logiid in" ; 
            header("location: home.php") ;
        }
        else 
        {
                array_push($errs , "the user not exsist") ;
                // header("location: index.php") ;

        }

   
    }

}



//  $userName  = $_POST["user_name"];
//  $userPass = $_POST["user_pass"];
 //require __DIR__."/DBconnect.php";
// class Login extends dbc 
// {
   
//    public function getUserInfo($userPass ,$userName )
//    {
//        $selectUser = "select `user_name` `user_password` from `User` where `user_role` = 'user' and `user_name` = '$userName'and `user_pass` = '$userPass' ";
//        $result = $this->connect()->query($selectUser);
//        #var_dump($result);
//        if(mysql_num_rows($result) > 0)
//        {
//             header("location:home.php");
//        }
//        else 
//        {
//            echo "<h1>error </h1>";
//        }
//    }
// }
// $user = new Login();
// $user->getUserInfo( $_POST["user_name"] , $_POST["user_pass"]);

// 

?>

 <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/jquery.particleground.min.js"></script>
<script src="../js/login.js"></script>
<script>
  function validate() {
       
       let userName = document.forms["login_form"]["user_name"].value;
       let userPass = document.forms["login_form"]["user_pass"].value;

       if(userName == "" &&userPass == "")
       {
        jQuery("#nameValidate").removeClass("d-none");
        jQuery("#passValidate").removeClass("d-none");
        return false ; 

       }
     
       if(userName == "")
       {
           jQuery("#nameValidate").removeClass("d-none");
           return false ; 
       }
       
      
       if(userPass == "")
       {
        jQuery("#passValidate").removeClass("d-none");
           return false ; 
       }

      
   }

</script>
   
</body>
</html>