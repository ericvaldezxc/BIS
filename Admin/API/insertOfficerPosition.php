<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 


    $name = $_POST['name'];
    $type = $_POST['type'];
    $name = utf8_decode($name);
    $stmt = $connection->prepare("insert into r_baranggay_officer_position  (baranggay_officer_position_position,baranggay_officer_position_type) values (?,?)");
    $stmt->bind_param("ss",$name,$type );
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