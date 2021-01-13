<?php
  $dsn = "mysql:dbname=cafe;dbhost=127.0.0.1;dbport=3306";
  Define("DB_USER", "root");
  Define("DB_PASS", "");
  $db = new PDO($dsn, DB_USER, DB_PASS);
  if($db){
    $sqlQuery = "select u.user_name,u.Id,sum(p.product_price*op.quantity) as total from Orders as o,productOrder as op ,Product as p , User as u where p.product_Id=op.product_Id and o.order_Id=op.order_Id and u.Id=o.user_Id group by o.user_Id order by total desc";
    $stmt = $db->prepare($sqlQuery);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($users); $i++) {
        $usersNames[] = $users[$i]['user_name'];
        $usersTotal[] = $users[$i]['total'];
        $usersIds[] = $users[$i]['Id'];
        $sqlUserOrders = "SELECT * FROM  `productOrder` , `orders` where user_Id=  $usersIds[$i] and `orders`.`order_Id`=`productorder`.`order_Id` ORDER BY `orders`.`order_date` DESC ";
        $ordrs = $db->prepare($sqlUserOrders);
        $ordrs->execute();
        $userOrders = $ordrs->fetchAll(PDO::FETCH_ASSOC);
        array_push($users[$i],   $userOrders);
//        var_dump(end($users[$i]))
        for($p=0;$p<count(end($users[$i]));$p++){

              $id=end($users[$i])[$p]['product_Id'];
              $singleproductquery = "SELECT * FROM  `Product`  where `product_Id`= $id";
              $singleproduct = $db->prepare($singleproductquery);
              $singleproduct->execute();
              $singleProductData = $singleproduct->fetchAll(PDO::FETCH_ASSOC);
        }

    }
  }else {
    echo "connection failed";
  }
   ?>
