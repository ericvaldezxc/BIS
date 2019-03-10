<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 


    $name = $_POST['name'];
    $username = $_POST['username'];
    $name = utf8_decode($name);
    $password = md5("password");
    $stmt = $connection->prepare("insert into r_user  (user_username,user_password,user_resident_id) values (?,?,?)");
    $stmt->bind_param("sss",$username,$password,$name );
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