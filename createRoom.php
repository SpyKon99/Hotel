<?php
    include_once('db_conn.php');

    $roomName = $_POST['roomName'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $numberOfGuests = $_POST['numberOfGuests'];

    foreach($_POST['airportPickup'] as $selected){
        $airportPickup= $selected;
    }  
    foreach($_POST['breakfast'] as $selected){
        $breakfast= $selected;
    }  
    foreach($_POST['parking'] as $selected){
        $parking= $selected;
    }  
    foreach($_POST['wifi'] as $selected){
        $wifi= $selected;
    } 

    $sql = "INSERT INTO rooms (roomName, description, image, price, numberOfGuests, airportPickup, breakfast, parking, wifi) VALUES('".$roomName."', '".$description."', '".$image."','".$price."','".$numberOfGuests."', '".$airportPickup."', '".$breakfast."', '".$parking."', '".$wifi."')";
    $result = $conn->query($sql);
    header('Location: adminRooms.php');
?>