<?php
 
// get database connection
include_once '../config/database.php';
 
// instantiate book object
include_once '../objects/book.php';
 
$database = new Database();
$db = $database->getConnection();
 
$book = new Book($db);
 
// set ID property of user to be editeds
$book->userid = isset($_GET['userid']) ? $_GET['userid'] : die();

// read the details of user to be edited
$stmt = $book->reservations();

if($stmt->rowCount() > 0){
    // create array
    $reservations_arr=array(
        "status" => true,

       "reservations" => []
    );

    $reservations = [];
    foreach($stmt as $result) {
        $reservations[] = [
            "id" => $result['id'],
            "userid" => $result['userid'],
            "roomid" => $result['roomid'],
            "checkin" => $result['checkin'],
            "checkout" => $result['checkout'],
            "numberofguests" => $result['numberofguests'],
            "created" => $result['created'],
            "totalprice" => $result['totalprice']
        ];
    }

    $reservations_arr['reservations'] = $reservations;
}
else{
    $reservations_arr=array(
        "status" => false,
        "message" => "Did not find something!"
    );
}

// make it json format
print_r(json_encode($reservations_arr));
?>