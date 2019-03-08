<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $id = $_POST['id'];

    $query = "select concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) ,resident_first_name,ifnull(resident_middle_name,''),resident_last_name,resident_gender,resident_alive,resident_avatar,resident_contact_number,resident_address,resident_civil_status,resident_birth_day,term_name,baranggay_officer_position_position from r_baranggay_officer as t1 inner join r_resident on resident_id = baranggay_officer_resident_id inner join r_term on baranggay_officer_term_id = term_id inner join r_baranggay_officer_position as t2 on t2.baranggay_officer_position_id = t1.baranggay_officer_position_id where baranggay_officer_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($fullname,$fname,$mname,$lname,$gender,$alive,$avatar,$cn,$address,$cs,$bday,$term,$pos);
    
    $list = array();
    while($stmt->fetch()){
        $list = [ 
            "fname" => $fname ,
            "mname" => $mname ,
            "lname" => $lname ,
            "id" => $id,
            "gender" => $gender ,
            "alive" => $alive ,
            "avatar" => $avatar ,
            "address" => $address ,
            "cn" => $cn ,
            "cs" => $cs ,
            "fullname" => $fullname ,
            "bday" => $bday ,
            "term" => $term ,
            "pos" => $pos 
        
        ];
    }  
    echo json_encode($list);
    $connection->close();

?>