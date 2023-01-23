<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/room.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare room object
$room = new Room($db);

// set ID property of user to be editeds
$room->id = isset($_GET['id']) ? $_GET['id'] : die();

// read the details of room to be edited
$stmt = $room->specificRoom();

if($stmt->rowCount() > 0){
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // create array
    $room_arr=array(
        "status" => true,
        "message" => "Found!",
        "id" => $row['id'],
        "room" => $row['roomName'],
        "description" => $row['description'],
        "image" => $row['image'],
        "price" => $row['price'],
        "numberofguests" => $row['numberOfGuests'],
        "airportPickup" => $row['airportPickup'],
        "airportPickup" => $row['airportPickup'],
        "breakfast" => $row['breakfast'],
        "parking" => $row['parking'],
        "wifi" => $row['wifi']
    );
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