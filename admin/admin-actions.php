<?php
require_once "admin-DB.php";
$admin =new admin();
session_start();
//  admin login
if (isset($_POST['action']) && $_POST['action'] =='adminLogin'){
$username =$admin->test_input($_POST['username']);
$password=$admin->test_input($_POST['password']);
$logInAdmin=$admin->admin_login($username,$password);
if($logInAdmin!=null){
 echo 'admin_login';
 $_SESSION['username']=$username;
}
else{
    echo $admin->showMessage('danger','Username or Password is Incorrect!');
}
}
//fetch all orders
if(isset($_POST['action']) && $_POST['action']=='fetchAllOrders'){
  $output='';
  $data=$admin->fetchAllOrders(0);
  if ($data){
      $output .='<table class="table table-striped table-bordered text-center">
      <thead>
      <tr>
        <th>Order Date</th>
        <th>User Name</th>
        <th>Room</th>
        <th>EXT.</th>
        <th>Action</th>
      </tr>
     </thead> 
     <tbody>';
      foreach ($data as $row){
      $output .='<tr>
                    <td>'.$row["order_date"].'</td>
                    <td>'.$row["user_name"].'</td>
                    <td>'.$row["room_no"].'</td>
                    <td>'.$row["ext"].'</td>
                    <td><a href="#" id="'.$row["order_Id"].'" title="View Details"class="text-primary orderDetIcon"><i class="fas fa-info-circle fa-lg">&nbsp;&nbsp;</i></a> 
                    <a href="#" id="'.$row["order_Id"].'" title="Cancel Order"class="text-danger cacelOrder"><i class="fas fa-trash-alt fa-lg">&nbsp;&nbsp;</i></a>
                    </td>
                 </tr>';
      }
  $output .='</tbody>
                 </table>';
      echo $output;
  }
  else{
      echo '<h3 class="text-center text-secondary">:( No orders Yet !</h3>';
  }

}