<?php
class showorders extends selectOrders{
    public function ShowAllOrders(){
        $datas=$this->SelectAllOrders();

            echo "<div class='container'>
    <h1>orders</h1>
    <table class='table'>
        <thead class='table-bordered'>
        <tr>
            <th scope='col'>Order Date</th>
            <th scope='col'>Name</th>
            <th scope='col'>Room</th>
            <th scope='col'>Ext</th>
            <th scope='col'>Action</th>
        </tr>
        </thead>";
        foreach ($datas as $data){
        echo "<tbody class='table-bordered' >
         <tr> <td>" . $data["order_date"] . "</td>" .
               "<td>" . $data["user_name"] . "</td>" .
               "<td>" . $data["room_no"] . "</td>" .
               "<td>" . $data["ext"] . "</td></tr>";
       };
        echo "</tbody>

    </table>

</div>";




        }

}