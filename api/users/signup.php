<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// set user property values
$user->firstname = $_POST['firstname'];
$user->lastname = $_POST['lastname'];
$user->country = $_POST['country'];
$user->city = $_POST['city'];
$user->address = $_POST['address'];
$user->email = $_POST['email'];
$user->username = $_POST['username'];
$user->phone = $_POST['phone'];
$user->password = $_POST['password'];
$user->role = $_POST['role'];
$user->created = date('Y-m-d H:i:s');
 
// create the user
if($user->signup()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "username" => $user->username
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Username or email already exists!"
    );
}
print_r(json_encode($user_arr));
?>