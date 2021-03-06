<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $userImage = "default-user.png";
    $image = $_POST['image'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $name = $_POST['avatarName'];
    $id = $_POST['id'];
    
    $cn = $_POST['cn'];
    $bday = $_POST['bday'];
    $isMale = $_POST['isMale'];
    $address = $_POST['address'];
    $civilStatus = $_POST['civilStatus'];

    if($image != 'No')
    {
        if($_FILES["file"]["name"] != '')
        {
            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = $name . '.' . $ext;
            $location = '../../dist/avatar/' . $name;  
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            $userImage = "";
        }

    }
    
    
    if($userImage != "default-user.png")
    {
        $userImage = $name;
    }

    $bday = strtotime($bday); 
    $bday = date("Y-m-d",$bday);

    if(!$mname)
    {
        $mname = null;
    }

    $gender = "Male";
    if($isMale != "true")
    {
        $gender = "Female";

    }

    $stmt = $connection->prepare("update r_resident set resident_first_name = ? ,resident_middle_name = ? ,resident_last_name = ? ,resident_gender = ? ,resident_contact_number = ? ,resident_address = ?,resident_civil_status = ?,resident_birth_day =? where resident_id = ?");
    $stmt->bind_param("sssssssss",$fname, $mname, $lname,$gender,$cn,$address,$civilStatus,$bday,$id);
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