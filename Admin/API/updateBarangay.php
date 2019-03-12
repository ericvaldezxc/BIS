<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];
    $name = utf8_decode($name);
    $stmt = $connection->prepare("update r_baranggay  set baranggay_name  = ?,baranggay_address  = ?,baranggay_lat = ?,baranggay_long = ? where baranggay_id = ?");
    $stmt->bind_param("sssss",$name, $address,$lat,$long,$id);
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