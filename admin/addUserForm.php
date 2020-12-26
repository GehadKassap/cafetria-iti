<?php

class Database {

    protected $connection;
    
    public function __construct($dbhost='localhost', $dbuser='root', $dbpass='2721997', $dbname='cafateria')
    {
        try {
           
            $dsn = "mysql:dbname=".$dbname.";host=".$dbhost.";" ;
          
            $this->$connection = new PDO($dsn, $dbuser, $dbpass);
            $this->$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            //echo "hello";
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function closeDBConnection() {
        $this->connection = null;
    }
    public function addUser($username, $email, $password, $room, $ext){
        $sql = "INSERT INTO user (user_name, user_email, user_password, room_no, ext) values(?,?,?,?,?)";
        $stmt = $this->$connection->prepare($sql);
        try{
            $stmt->execute([$username, $email, $password, $room, $ext]);
            $result=$stmt->rowCount();
        }
        catch (Exception $e){
            return false;
        }
        return $result;
    }
    public function addUserWithPic($username, $email, $password, $room, $ext, $profilePic){
        $sql = "INSERT INTO user (user_name, user_email, user_password, room_no, ext, user_profile_picture) values(?,?,?,?,?,?)";
        $stmt = $this->$connection->prepare($sql);
        try{
            $stmt->execute([$username, $email, $password, $room, $ext, $profilePic]);
            $result=$stmt->rowCount();
        }
        catch (Exception $e){
            return false;
        }
        return $result;
    }
}


$db = new Database("localhost","root", "2721997", "cafateria");
$result=false;
if (isset($_FILES['profilePic']) && !empty($_FILES['profilePic']['name']) && validateFile() == 1) {
    
    if (validatePassword($_POST['password'], $_POST['confirmpassword'])) {
        
        $result = $db->addUserWithPic($_POST['username'], $_POST['email'], $_POST['password'], $_POST['room'], $_POST['ext'], $_FILES['profilePic']['name']);
    } else {
       
        header("location: ./addUser.php?error=password");
    }

} else {
    if (validatePassword($_POST['password'], $_POST['confirmpassword'])) {
        $result = $db->addUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['room'], $_POST['ext']);
    } else {
        $db->closeDBConnection();
        header("location: ./addUser.php?error=password");
    }

}
if($result){
    header("location: ./allUsers.php?success");
    $db->closeDBConnection();
} else{
    header("location: ./addUser.php?error=duplicate");
}

function validatePassword($pass, $confirm)
{
    if (strcmp($pass, $confirm) == 0) {
        return true;
    } else {
        return false;
    }
}

function validateFile(){    
    if(isset($_FILES['profilePic'])){
       $file_name = $_FILES['profilePic']['name'];
       $file_type=$_FILES['profilePic']['type'];
       $ext=explode('.',$_FILES['profilePic']['name']);
       $file_ext=strtolower(end($ext));     
       $extensions= array("jpeg","jpg","png");   
       if(in_array($file_ext,$extensions)=== false){
           $errors.="Extension is not allowed, please choose a JPEG or PNG image.";
       }      
       if(empty($errors)==true){
        
        if (move_uploaded_file($_FILES['profilePic']['tmp_name'],dirname(__DIR__, 1)."/imgs/".basename($_FILES['profilePic']['name']))) {
          echo "Uploaded";
      } else {
         echo "File was not uploaded";
      }
          
           return 1;
        
       }else{
        
         echo '<script>alert("extension not allowed, please choose a JPEG or PNG file.")</script>';
        return 0;
          //  print_r($errors);
       }
   }
}
