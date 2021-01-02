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
//$userIdd=(String)$userId;
//var_dump(settype($userId,) );
if(isset($_POST["start"],$_POST["end"])){
    $start = $_POST["start"] ;                                                       // $_COOKIE["id"]
    $end = $_POST["end"] ;
    $sqlOrders = "select * from  `orders` where  `orders`.`user_Id` =$userId[0] and `orders`.`order_date` between '$start' and '$end'";
    $ordr = $db->prepare($sqlOrders);
    $ordr->execute();
    $userOrder = $ordr->fetchAll(PDO::FETCH_ASSOC);
    $count=count($userOrder) ;
//var_dump($userOrder);
//    echo "<tabl   e> <tr><th>Status</th>
//                               <th>Status</th>
//                               <th>Status</th>
//                               <th>Action</th> </tr>" ;
//    $i=0;
//    while($row = $userOrder){
//        echo "<tr ><td>" .$userOrder[$i]['order_action'] ."</td>
//                     <td>" .$userOrder[$i]['order_date'] ."</td>
//                     <td>" .$userOrder[$i]['notes'] ."</td>
//                    " ;
//        $i++;
//        if ($row['status'] == "processing"){
//
//            echo "<td>  <a href='delete-order.php?delete=" . $row["order_id"] ." '> <input type='button' value='Delete'> </a></td>" ;
//
//        }else{
//            echo "<td> </td>" ;
//        }
//
//        echo  "</tr>"  ;
//        // var_dump ($row) ;
//    } echo "</table>" ;



}


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
                            <span><?= $userOrder[0]['user_name'] ?></span>
                        </td>
                        <td><?=$userOrder[0]['total']?></td>

                    </tr>
                    <tr>
                        <!-- ! table two  -->

                        <td colspan='2'>
                            <table class='table'>
                                <thead class='thead-light'>
                                <tr>
                                    <th scope='col'>order date</th>
                                    <th scope='col'>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($j=0;$j<$count;$j++){?>
                                    <tr class='user-data'>
                                        <td>
                                            <i class='fa fa-plus-square'></i>
                                            <span>
                                                <?= $userOrder[0][0]['order_action'] ?>
                                                </span>
                                        </td>
                                        <td>
                                            <?= $userOrder[0][0]['order_price'] ?>
                                        </td>
                                    </tr>
                                <?php }  ?>




                                <tr>
                                    <!-- ! table three -->
                                    <td colspan='2'>
                                        <div class='row'>
                                            <!-- each-item -->
                                            <div class='col-sm-3'>
                                                <div class='each-order'>
                                                    <img src='https://via.placeholder.com/100' class='w-100' width='100' height='100' alt='' />
                                                    <h5>tea</h5>
                                                    <input type='text' name='tea' value='15' hidden />
                                                    <span>15 LE</span>
                                                    <span>2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- ! ./table three -->
                                </tr>

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
