<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $term = $_POST['term'];
    $name = $_POST['name'];
    $position = $_POST['position'];
  
    $stmt = $connection->prepare("update r_baranggay_officer set baranggay_officer_resident_id = ?,baranggay_officer_position_id = ?,baranggay_officer_term_id = ? where baranggay_officer_id = ?");
    $stmt->bind_param("ssss",$name, $position, $term,$id);

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