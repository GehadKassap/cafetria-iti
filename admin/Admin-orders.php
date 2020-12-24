<?php
require_once 'AdminNav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card my-2 border-secondary">
            <div class="card-header bg-secondary text-white">
                <h3 class="m-0">Submit Orders</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showOrders">
                    <p class="text-center align-self-center lead">Please Wait...</p>

                </div>

            </div>

        </div>

    </div>

 </div>
</div>


<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<!--Fetch all orders-->
<script type="text/javascript">
    $(document).ready(function (){
        fetchAllOrders();
        function fetchAllOrders(){
            $.ajax({
                url:'admin-actions.php',
                method:'post',
                data:{action:'fetchAllOrders'},
                success:function (response){
                    //console.log(response);
                    $("#showOrders").html(response);
                }
            })

         }
    });

</script>
</body>
</html>
