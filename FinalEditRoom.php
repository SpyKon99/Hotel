<?php
    include_once('db_conn.php');

    $roomid = $_POST['roomid'];
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
     
  
    $sql = "UPDATE rooms SET roomName='".$roomName."' , description='".$description."' ,image='".$image."' ,price='".$price."' ,numberOfGuests='".$numberOfGuests."' ,airportPickup='".$airportPickup."' ,breakfast='".$breakfast."' ,parking='".$parking."' ,wifi='".$wifi."' WHERE id='".$roomid."' ";

    $result = $conn->query($sql);
    header('Location: adminRooms.php');
?>