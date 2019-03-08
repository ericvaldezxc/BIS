<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $userImage = "default-user.png";
    $name = "";
    $term = $_POST['term'];
    $name = $_POST['name'];
    $position = $_POST['position'];
  
    $stmt = $connection->prepare("insert into r_baranggay_officer (baranggay_officer_resident_id,baranggay_officer_position_id,baranggay_officer_term_id) values (?,?,?)");
    $stmt->bind_param("sss",$name, $position, $term);

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