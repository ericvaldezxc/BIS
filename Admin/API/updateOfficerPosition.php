<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $name = utf8_decode($name);
    $stmt = $connection->prepare("update r_baranggay_officer_position  set baranggay_officer_position_position  = ? ,baranggay_officer_position_type = ? where baranggay_officer_position_id = ?");
    $stmt->bind_param("sss",$name , $type ,$id);
    $stmt->execute();
    $stmt->close();

    if( $stmt ) 
    {
        echo "Success";
    }
    else
    {
        echo "Error";

    }

?>