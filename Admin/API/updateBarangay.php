<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $name = utf8_decode($name);
    $stmt = $connection->prepare("update r_baranggay  set baranggay_name  = ?,baranggay_address  = ? where baranggay_id = ?");
    $stmt->bind_param("sss",$name, $address,$id);
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