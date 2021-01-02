<?php
$dsn = "mysql:dbname=cafe;dbhost=127.0.0.1;dbport=3306";
Define("DB_USER", "root");
Define("DB_PASS", "135790000");
$db = new PDO($dsn, DB_USER, DB_PASS);
if(!$db) {
    die("Connection Failed") ;
}
echo $_POST['start'];;
echo $_POST['end'];
$userNme= $_POST['users'];

$uId = "select id from `user` where `user`.`user_name` = '$userNme'";
$usId = $db->prepare($uId);
$usId->execute();
$userId = $usId->fetchAll(PDO::FETCH_ASSOC);
$userIdd=$userId[0]['id'];
var_dump($userIdd);
if(isset($_POST["start"],$_POST["end"])){
    $start = $_POST["start"] ;                                                       // $_COOKIE["id"]
    $end = $_POST["end"] ;
    $sqlOrders = "select * from  `orders` where  `orders`.`user_Id` =$userIdd and `orders`.`order_date` between '$start' and '$end'";
    $ordr = $db->prepare($sqlOrders);
    $ordr->execute();
    $userOrder = $ordr->fetchAll(PDO::FETCH_ASSOC);
    $count=count($userOrder) ;
     var_dump($userOrder);
}
$total=0;
for($x=0;$x<$count;$x++){
    $total=$total+$userOrder[$x]['order_price'];
}
var_dump($total);

?>
<!DOCTYPE html>
<html>
<?php include_once 'AdminNav.php'; ?>
<head>
    <meta charset="utf-8" />
    <title>Checks Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/checks.css">

</head>
<body>
<main class="checks">
    <section class="main-padding">
        <div class="container">
            <h1>Checks</h1>
            <!-- ./user-checks -->
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <!-- * first user -->

                    <tr class='user'>
                        <td>
                            <i class='fa fa-plus-square'></i>
                            <span><?= $userNme ?></span>
                        </td>
                        <td>
                            <i class='fa fa-plus-square'></i>
                            <span><?= $total?></span>
                        </td>
                    </tr>
                    <tr>
                        <!-- ! table two  -->

                        <td colspan='3'>
                            <table class='table'>
                                <thead class='thead-light'>
                                <?php if(!$count) {?>
                                       <tr class='user-data'>
                                    <td>
                                       <center style="font-size: large ; color:red" >oops ! , No orders at this date</center>
                                    </td>
                                </tr>

                                <?php }else{?>
                                <tr>
                                    <th scope='col'>order status</th>
                                    <th scope='col'>Amount</th>
                                    <th scope='col'>order date</th>

                                </tr>
                                </thead>
                                <tbody>

                                 <?php for($j=0;$j<$count;$j++){?>
                                    <tr class='user-data'>
                                        <td>
                                            <i class='fa fa-plus-square'></i>
                                            <span>
                                                <?= $userOrder[$j]['order_action'] ?>
                                                </span>
                                        </td>
                                        <td>
                                            <?= $userOrder[$j]['order_price'] ?>
                                        </td>
                                        <td>
                                            <span>

                                            <?= $userOrder[$j]['order_date'] ?>
                                            </span>
                                        </td>
                                    </tr>

                                <tr>
                                    <!-- ! table three -->
                                    <td colspan='2'>
                                        <div class='row'>
                                            <!-- each-item -->

                                            <div class='col-sm-3'>
                                                <div class='each-order'>
                                                    <img src='../imgs/HotDrinks/nn.jpeg' class='w-100' width='100' height='100' alt='' />
                                                    <h5>tea</h5>
                                                    <input type='text' name='tea' value='15' hidden />
                                                    <span>30 LE</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-sm-3'>
                                            <div class='each-order'>
                                                <img src='../imgs/HotDrinks/cccc.jpg' class='w-100' width='100' height='100' alt='' />
                                                <h5>coffee</h5>
                                                <input type='text' name='tea' value='15' hidden />
                                                <span>40 LE</span>
                                            </div>
                                        </div>
                                        <div class='col-sm-3'>
                                            <div class='each-order'>
                                                <img src='../imgs/ColdDrinks/water.jpg' class='w-100' width='100' height='100' alt='' />
                                                <h5>water</h5>
                                                <input type='text' name='tea' value='15' hidden />
                                                <span>20 LE</span>
                                            </div>
                                        </div>
        </div>
        </td>
        <!-- ! ./table three -->
        </tr>
                                <?php }  ?>
                                <?php }  ?>




                                </tbody>
                            </table>
                        </td>
                        <!-- ! ./table two  -->
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/checks.js"></script>
</body>

</html>
