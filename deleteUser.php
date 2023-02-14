<?php
    include_once('db_conn.php');
    $userid = $_SERVER['QUERY_STRING'];
    $userid = substr($userid,3);
    // echo $userid;
    $sql = "DELETE FROM users WHERE id='".$userid."' ";
    $result = $conn->query($sql);
    
    header('Location: users.php');
?>


