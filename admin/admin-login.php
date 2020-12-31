<?php


?>

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
            <p class="text-center "><i class="fas fa-user-cog text-white"></i>&nbsp; welcome to Admin Panel </p>
            <h1 class="text-center mb-5">Cafeteria</h1>
            <form class="w-100 m-auto" id="form-login"  method="post">
                <div id="login-alert" class="text-danger"></div>
                <div class="form-group text-center" >
                    <input id="userName" type="text" class=" form-control" placeholder="enter your username" name="username">
                </div>
                <div class="form-group text-center" >
                    <input id="userPass" type="password" class="form-control" placeholder="enter your password" name="password">
                </div>
                <button class="btn btn-primary w-100" id="login">Login </button>
            </form>
        </div>
    </div>

</section>



<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/jquery.particleground.min.js"></script>
<script src="../js/login.js"></script>

<!--retrieve data from server by ajax-->
<script type="text/javascript">
    $(document).ready(function (){
        $("#login").click(function (e){
            if ($("#form-login")[0].checkValidity())
            {
                e.preventDefault();
                $("#login").val('please wait ..');
                $.ajax({
                    url: 'admin-actions.php',
                    method:'post',
                    data: $("#form-login").serialize()+'&action=adminLogin',
                    success:function (response){
                        if (response==='admin_login'){
                            window.location='Admin-orders.php';
                        }
                        else {
                            $("#login-alert").html(response);
                        }
                        $("#login").val('Login')


                    }
                })

            }
        })
    });
</script>
</body>
</html>