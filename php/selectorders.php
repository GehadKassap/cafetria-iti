<?php
class selectOrders extends dbc {
    protected function SelectAllOrders(){
        $sql ="select o.order_date , u.user_name, u.room_no,u.ext from orders o, user u
                      where u.Id=o.user_Id order by order_date desc;";
        $result=$this->connect()->query($sql);
        $numRows=$result->num_rows;
        if ($numRows >0){
            while ($row = $result->fetch_assoc())
            {
                $data[]=$row;
            }
            return $data;
        }

    }
}