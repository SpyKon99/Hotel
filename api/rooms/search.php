<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/room.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$room = new Room($db);

// set ID property of user to be editeds
$room->roomname = isset($_GET['roomname']) ? $_GET['roomname'] : die();


// read the details of user to be edited
$stmt = $room->search();

if($stmt->rowCount() > 0){
    // create array
    $room_arr=array(
        "status" => true,

       "rooms" => []
    );

    $rooms = [];
    foreach($stmt as $result) {
        $rooms[] = [
            "id" => $result['id'],
            "room" => $result['roomName'],
            "description" => $result['description'],
            "image" => $result['image'],
            "price" => $result['price'],
            "numberofguests" => $result['numberOfGuests'],
        ];
    }

    $room_arr['rooms'] = $rooms;
}
else{
    $room_arr=array(
        "status" => false,
        "message" => "Did not find something!",
    );
}

// make it json format
print_r(json_encode($room_arr));

?>