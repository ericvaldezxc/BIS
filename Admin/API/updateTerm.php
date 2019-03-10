<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $name = utf8_decode($name);
    $stmt = $connection->prepare("update r_term  set term_name  = ? where term_id = ?");
    $stmt->bind_param("ss",$name,$id);
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