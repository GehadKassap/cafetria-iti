<?php
$connection =new mysqli("localhost","root","2721997","cafe","3306") or die(mysqli_error($mysqli));
if(isset($_POST['update_btn'])){
    $edit_id= $_POST['edit_id'];
    $edit_name=$_POST['username'];
    $edit_email=$_POST['email'];
    $edit_password=$_POST['password'];
    $edit_room=$_POST['room'];
    $edit_ext=$_POST['ext'];
    $edit_image=$_FILES['profilePic']['name'];

    $query= "update user set user_name='$edit_name', user_email=' $edit_email', user_password=' $edit_password',room_no='$edit_room', ext='$edit_ext', user_profile_picture='$edit_image' where id='$edit_id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        move_uploaded_file($_FILES['profilePic']['tmp_name'],dirname(__DIR__, 1)."/imgs/".basename($_FILES['profilePic']['name']));
        header('location: ./allUsers.php?success');
    }else{
        header('location: addUser.php');
    }
}
?>