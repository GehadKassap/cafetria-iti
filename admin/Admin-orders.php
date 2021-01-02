
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
<?php
require_once 'AdminNav.php';

?>
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
        <!--display order details and actions-->

        <div class="modal fade" id="orderDetails">
            <div class="modal-dialog modal-dialog-centered mw-100 w-50">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="getUsername"></h4>
                    </div>
                    <div class="modal-body">
                        <p class="align-self-center" id="getProductPrice"></p>
                        <div id="getProductPic"></div>
                        <p class="align-self-center" id="getProductName"></p>

                    </div>
                    <div class="modal-footer">
                        <div id="getTotalPrice" class="text-center"></div>
                        <button type="button" class="btn btn-primary" id="'.$row["order_Id"].'" >Deliver</button>
                        <button type="button" class="btn btn-warning" id="'.$row["order_Id"].'">Done</button>
                    </div>

                </div>

            </div>

        </div>

    </div>

 </div>
</div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../jquery-3.5.1.min.js"></script>
<script src="../package/dist/sweetalert2.all.js"></script>

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
        // show order details
        $("body").on("click",".orderDetIcon",function (e){
            e.preventDefault();
            details_id=$(this).attr('id');
            $.ajax({
                url: 'admin-actions.php',
                type:'post',
                data: {details_id: details_id},
                success:function (response){
                    //console.log(response);
                    data=JSON.parse(response);
                    $("#getUsername").text(data.user_name);
                    //if(data.catagory_name==='Hotdrinks') {
                    $("#getProductPic").html('<img src="../imgs/'+ data.product_picture +'" class="rounded-circle" width="80px">');
                    //}
                    //else {
                    //  $("#getProductPic").html('<img src="../imgs/ColdDrinks/'+ data.product_picture +'" class="rounded-circle" width="80px">');

                    //}
                    $("#getProductName").text(data.product_name);
                    $("#getProductPrice").text(data.product_price);
                    $("#getTotalPrice").text(data.order_price);

                }

            });
        });
        //cancel order
        $("body").on("click",".cancelOrder",function (e){
            e.preventDefault();
            cancel_id=$(this).attr('id');
            Swal.fire({
                title:'Are You sure you want to cancel order?!',
                text:"You Won't be able to revert this!",
                type: 'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes,Cancel!'
            }).then((result)=>{
                if(result.value){
                    $.ajax({
                        url:'admin-actions.php',
                        method: 'post',
                        data:{ cancel_id :cancel_id},
                        success:function (response){
                            Swal.fire(
                                'Canceled!',
                                'Note Canceled Successfully !',
                                'Success'
                            )
                            fetchAllOrders();

                        }
                    })
                }
            })
        });
    });

</script>
</body>
</html>
