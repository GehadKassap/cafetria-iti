<?php
require_once 'DBconnect.php';
class admin extends dbc {

    //admin login
    public function admin_login($username,$password){
        $sql="select user_name ,user_password from user where user_name=:username and user_password=:password and user_role='1'";
        $result=$this->conn->prepare($sql);
        $result->execute(['username'=>$username,'password'=>$password]);
        $row=$result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    //check input
    public function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
            return $data;
    }
    // error message
    public function showMessage($type,$message){
        return '<div class="alert alert-'.$type.' alert-dismissible">
        <strong class="text-center">'.$message.'</strong>
        </div>';
    }
    // fetch all orders
    public function fetchAllOrders($val){
        $sql = "select o.order_date,o.order_Id , u.user_name, u.room_no,u.ext from orders o, user u
where u.Id=o.user_Id order by order_date desc;";
        $result=$this->conn->prepare($sql);
        $result->execute();
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    // show order details
    public function showOrderDetails($id){
        $sql="select c.catagory_name, order_Id,product_name,product_price,product_picture ,order_price, user_name
 from orders o 
 join user on Id=o.user_Id 
 join product p  on p.user_ID=o.user_Id 
 join catagory c on p.catagory_Id=c.catagory_Id  where order_Id=:id;";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    // cancel order
    public function OrderCancel($id){
        $sql="Delete from orders where order_Id:id ;";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;


    }

}