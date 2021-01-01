<?php
session_start();
$mysqli = new mysqli("localhost","root","2721997","cafe","3306") or die(mysli_error($mysqli));
$id=0;
$username='';
$room='';
$pic='';
$ext='';
$update = false;
if(isset($_POST['save'])){
    $username = $_POST['user_name'];
    $room = $_POST['room_no'];
    $pic= $_POST['user_profile_picture'];
    $ext = $_POST['ext'];

    $mysqli->query("INSERT INTO user (user_name,room_no,user_profile_picture,ext) VALUES('$username','$room','$pic','$ext')") or die($mysqli->error);
    header("location: allUsers.php");
}

if (isset($_GET["delete"])){
    $id = $_GET['delete'];
    $mysqli->query("delete from user where id=$id") or die($mysqli->error());
    header("location: allUsers.php");
}


if (isset($_GET["edit"])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("select * from user where id=$id") or die($mysqli->error());
    // var_dump($result);
    if(count([$result]) == 1){
        $row = $result->fetch_array();
        $username = $row['user_name'];
        $room = $row['room_no'];
        $pic= $row['user_profile_picture'];
        $ext = $row['ext'];
    }
}

if(isset($_POST['update'])){
    $id =$_POST['Id'];
    $username = $_POST['user_name'];
    $room = $_POST['room_no'];
    $pic= $_POST['user_profile_picture'];
    $ext = $_POST['ext'];
    $mysqli->query("update user set user_name='$username', room_no='$room',user_profile_picture='$pic',ext='$ext' where id=$id")or die($mysqli->error);
    header("location: allUsers.php");
}