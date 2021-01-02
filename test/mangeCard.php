<?php
  session_start();
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['add_order']))
    {
        if($_SESSION["cart"])
        {
        // $items =array_column($_SESSION['cart'] ,' drink_name');
        // if(in_array($_POST['drink_name'] ,$items ))
        // {
        //   echo "<h1 class='text-primary'>Drink added , lets enter your notes!</h1>" ; 
        // }




        //   $count = count($_SESSION['cart']);
        //   $_SESSION["cart"][$count] =array('drink_name'=>$_POST['drink_name']
        //   , 'drink_price'=>$_POST['drink_price'] 
        //   , 'drink_desc'=>$_POST['drink_desc']);
        //   print_r($_SESSION["cart"]);


        }
        else
        {

        //   $_SESSION["cart"][0] = array('drink_name'=>$_POST['drink_name']
        //                              , 'drink_price'=>$_POST['drink_price'] 
        //                              , 'drink_desc'=>$_POST['drink_desc']);
        //                              print_r($_SESSION["cart"]);
                                     echo "<h1 class='text-primary'>Drink added , lets enter your notes!</h1>" ;
        }
    }







}
?>