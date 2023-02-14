<?php    
    include_once('db_conn.php');

    $userid = $_POST['userid'];
    $firstname = $_POST['userfname'];
    $lastname = $_POST['usersname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $email = $_POST['email'];

    $username = $_POST['username'];

    $phone = $_POST['phone'];

    $password = $_POST['userpassword'];

    foreach($_POST['role'] as $selected){
        $role= $selected;
    }   
  
    $sql = "UPDATE users SET firstname='".$firstname."' , lastname='".$lastname."' ,country='".$country."' ,city='".$city."' ,address='".$address."' ,email='".$email."' ,username='".$username."' ,phone='".$phone."' ,password='".$password."' ,role='".$role."' WHERE id='".$userid."' ";
    $result = $conn->query($sql);

    header('Location: users.php');


?>