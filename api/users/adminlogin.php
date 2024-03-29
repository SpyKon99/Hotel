<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare user object
$user = new User($db);

// set ID property of user to be editeds
$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = isset($_GET['password']) ? $_GET['password'] : die();

// read the details of user to be edited
$stmt = $user->adminLogin();

if ($stmt->rowCount() > 0) {
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // create array
    $user_arr = array(
        "status" => true,
        "message" => "Successfully Login!",
        "id" => $row['id'],
        "username" => $row['username']
    );
    session_start();
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION["id"] = $row['id'];

    header("Refresh:0");
} else {
    $user_arr = array(
        "status" => false,
        "message" => "Invalid Username or Password or You are not a admin!",
    );
}

// make it json format
print_r(json_encode($user_arr));
?>