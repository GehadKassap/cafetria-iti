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
}