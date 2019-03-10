<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select resident_active,resident_address,user_id,resident_gender,resident_alive,resident_avatar,resident_contact_number,resident_civil_status,resident_birth_day,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname,user_active from r_user inner join  r_resident on user_resident_id = resident_id where resident_active = 'Active' and user_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
    // $query = "select * from r_department ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($active,$address,$id,$gender,$alive,$avatar,$cn,$cs,$bday,$name,$accStat);
    
    $list = array();
    while($stmt->fetch()){
        
        if($accStat == "Active")
        {
            $accStat = " <div class='text-center'> <span class='label label-success active-label'>Active</span> </div>";            
        }
        else
        {
            $accStat = " <div class='text-center'> <span class='label label-danger active-label'>Inactive</span> </div>";         
        }

        if($alive == "Yes")
        {
            $alive = " <div class='text-center'> <span class='label label-success active-label'>Yes</span> </div>";            
        }
        else
        {
            $alive = " <div class='text-center'> <span class='label label-danger active-label'>No</span> </div>";         
        }

        $btn =  " <div class='text-center'> 
                <a class='btn btn-sm btn-danger btn-flat residentDelete' data-id='$id'>
                    <i class='fa fa-trash-o'></i>
                </a> </div>";

        $name = "<div class='pull-left image'>
                    <img src='../dist/avatar/$avatar' style='height:20px;width:20px' class='img-circle' alt='User Image'>
                </div>  $name";
        $templist = array($name,$alive,$accStat,$btn);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>