<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/book.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$book = new Book($db);

// set ID property of user to be editeds
$book->userid = isset($_GET['userid']) ? $_GET['userid'] : die();
$book->roomid = isset($_GET['roomid']) ? $_GET['roomid'] : die();

// read the details of user to be edited
$stmt = $book->update();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // create array
    $book_arr=array(
        "status" => true,
        "message" => "We are looking forward to see you!",
    );


    header("index.php");
}
else{
    $book_arr=array(
        "status" => false,
        "message" => "Something went wrong!",
    );
}

// make it json format
print_r(json_encode($book_arr));
?>