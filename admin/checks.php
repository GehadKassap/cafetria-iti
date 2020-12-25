<?php 
$usersNames=[];
$dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
    Define("DB_USER","root");
    Define("DB_PASS","135790000");
    $db= new PDO($dsn,DB_USER,DB_PASS);
 if($db){
     $selQry="select * from `User` ";
       $stmt=$db->prepare($selQry);
    //    $stmt->bindParam(":sname",$name);
    //    $stmt->bindParam(":sid",$id);
       $stmt->execute();
       $users=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //    var_dump($users);
       foreach($users as $user){
         $usersNames[]=$user['user_name'];
       }
      var_dump($usersNames);
     }else{
         echo "not connected";
        }

        

 
 