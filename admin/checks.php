<?php
include_once 'test.php';
?>
<!DOCTYPE html>
<html>
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
                <!-- date-picker -->
                <form action="checks.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="from-group">
                                <label for="start">Start date:</label>
                                <input type="date" class="form-control start" name="start" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="end">End date:</label>
                                <input type="date" class="form-control end" name="end" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="select-user from-group">
                                <select name="users" class="form-control">
                                    <?php
                                        // for ($i = 1; $i < count($users); $i++) {
                                        //     $ordersQuery = "SELECT * FROM `Orders` WHERE `user_Id`= $i";
                                        //     $ord = $db->prepare($ordersQuery);
                                        //     // $ord->bindParam($i, PDO::PARAM_INT);
                                        //     $ord->execute();
                                        //     $userOrders = $ord->fetchAll(PDO::FETCH_ASSOC);
                                        //     $orderData[$i - 1] = $userOrders;
                                        // }
                                        // for ($i = 0; $i < count($orderData); $i++) {
                                        //     $orderDate[] = $orderData[$i]['order_date'];
                                        // }

                                        // display users
                                        foreach ($usersNames as $userName) {
                                            echo "<option value='strtolower($ $userName)'>$userName</option>";
                                        }
                                        // $ordersQuery = "select * from orders";
                                        // $ord = $db->prepare($ordersQuery);
                                        // $ord->execute();
                                        // $orders = $ord->fetchAll(PDO::FETCH_ASSOC);
                                        // foreach ($orders as $ordr) {
                                        // $orderDate[] =
                                        // $usersAmount[] = $ordr['order_price'];
                                        // $orderId[] = $ordr['order_id'];
                                        // }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">filter</button>
                        </div>
                    </div>
                </form>
                <!-- ./date-picker -->
            </div>
        </section>

        <section class="main-padding">
            <div class="container">
                <!-- user-checks -->
                <div class="user-checks">
                    <!-- ! table one  -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- * first user -->
                            <?php
                            for ($i = 0; $i < count($users); $i++) { ?>
                            <tr class='user'>
                            <td>
                                <i class='fa fa-plus-square'></i>
                                <span><?= $usersNames[$i] ?></span>
                            </td>
                            <td><?=$usersTotal[$i]?></td>
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
                                      <?php for($j=0;$j<count(end($users[$i]));$j++){?>
                                        <tr class='user-data'>
                                            <td>
                                                <i class='fa fa-plus-square'></i>
                                                <span>
                                                <?= end($users[$i])[$j]['order_date'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?= end($users[$i])[$j]['quantity'] ?>
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
                                                    <!-- each-item -->
                                                    <div class='col-sm-3'>
                                                        <div class='each-order'>
                                                            <img src='https://via.placeholder.com/100' class='w-100' width='100' height='100' alt='' />
                                                            <h5>tea</h5>
                                                            <input type='text' name='tea' value='15' hidden />
                                                            <span>15 LE</span>
                                                            <span>3</span>
                                                        </div>
                                                    </div>
                                                    <!-- each-item -->
                                                    <div class='col-sm-3'>
                                                        <div class='each-order'>
                                                            <img src='https://via.placeholder.com/100' class='w-100' width='100' height='100' alt='' />
                                                            <h5>tea</h5>
                                                            <input type='text' name='tea' value='15 ' hidden />
                                                            <span>15 LE</span>
                                                            <span>5</span>
                                                        </div>
                                                    </div>
                                                    <!-- each-item -->
                                                    <div class='ol-sm-3'>
                                                            <img src='https://via.placeholder.com/100' class='w-100' width='100' height='100' alt='' />
                                                            <h5>tea</h5>
                                                            <input type='text' name='tea' value='15' hidden />
                                                            <span>15 LE</span>
                                                            <span>1</span>
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
                            <?php }  ?>
                            <!-- * second user -->
                            <!-- <tr class="user">
                            <td><i class="fa fa-plus-square"></i> <span> esraa</span></td>
                            <td>55</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                second user data
                            </td>
                        </tr>
                        <!-- * third user -->
                            <!-- <tr class="user">
                            <td><i class="fa fa-plus-square"></i> <span> abeer</span></td>
                            <td>20</td>
                        </tr> -->
                            <!-- <tr>
                            <td colspan="2">
                                third user data
                            </td>
                        </tr> -->
                        </tbody>
                    </table>
                    <!-- ! ./table one  -->
                </div>
            </div>
            <!-- ./user-checks -->
        </section>
    </main>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/checks.js"></script>
</body>

</html>
