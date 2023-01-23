<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate book object
include_once '../objects/book.php';
 
$database = new Database();
$db = $database->getConnection();
 
$book = new Book($db);
 
// set book property values
$book->userid = $_POST['userid'];
$book->roomid = $_POST['roomid'];
$book->checkin = $_POST['checkin'];
$book->checkout	= $_POST['checkout'];
$book->numberofguests = $_POST['numberofguests'];
$book->created = date('Y-m-d H:i:s');
$book->numberofstays = $_POST['numberofstays'];
$book->totalprice = $_POST['totalprice'];
 
// create the book
if($book->book()){
    $book_arr=array(
        "status" => true,
        "message" => "Successfully Booking!",
        "id" => $book->id,
        "userid" => $book->userid
    );
}
else{
    $book_arr=array(
        "status" => false,
        "message" => "Please select another dates!"
    );
}
print_r(json_encode($book_arr));
?>