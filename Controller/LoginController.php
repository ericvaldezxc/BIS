<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT (SELECT COUNT(*) FROM r_user WHERE user_username = ? AND user_password = ?) AS USERPASSMATCH,(SELECT COUNT(*) FROM r_user WHERE user_username = ? ) AS USERMATCH";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sss", $username,$password,$username);
    $stmt->execute();
    $stmt->bind_result($userpassmatch, $usermatch);
    $departments = array();
    while($stmt->fetch())
    {
        $temp = [
            'userpassmatch'=>$userpassmatch,
            'usermatch'=>$usermatch
        ];

        if($usermatch == '1')
        {
            session_start();
            $_SESSION["username"] = $username;
            
        }
        echo json_encode($temp);
       
    }  

    
   
    
    $connection->close();
    

?>