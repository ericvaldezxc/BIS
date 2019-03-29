<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    session_start();
    $passwordText = $_POST['passwordText'];
    $passwordText = md5($passwordText);
    $username = $_SESSION['username'];

    $stmt = $connection->prepare("update r_user set user_password = ? where user_username = ? ");
    $stmt->bind_param("ss",$passwordText,$username );
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