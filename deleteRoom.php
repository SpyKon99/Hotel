<?php
    include_once('db_conn.php');
    $roomid = $_SERVER['QUERY_STRING'];
    $roomid = substr($roomid,3);
    // echo $roomid;
    $sql = "DELETE FROM rooms WHERE id='".$roomid."' ";
    $result = $conn->query($sql);
    
    header('Location: adminRooms.php');
?>


