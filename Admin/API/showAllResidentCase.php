<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select resident_case_complainant,resident_avatar,resident_case_id,resident_case_status,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')),case_name,DATE_FORMAT(resident_case_date_updated, '%M %e, %Y')  from t_resident_case inner join r_resident on resident_id = resident_case_resident_id inner join r_case on case_id =  resident_case_case_id where resident_case_active = 'Active'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($complain,$avatar,$id,$status,$name,$case,$date);
    
    $list = array();
    while($stmt->fetch()){
        $btn =  " <div class='text-center'> 
                    <a class='btn btn-sm btn-danger btn-flat itemDelete' data-id='$id'>
                        <i class='fa fa-trash-o'></i>
                    </a> </div>";

        if($status == 'Pending')
        {
            $btn =  " <div class='text-center'> 
                    <a class='btn btn-sm btn-success btn-flat itemEdit' data-id='$id'>
                        <i class='fa fa-edit'></i>
                    </a>
                    <a title='Flag Solved' class='btn btn-sm btn-vk btn-flat itemSolved' data-id='$id'>
                        <i class='fa fa-gavel'></i>
                    </a>
                    <a class='btn btn-sm btn-danger btn-flat itemDelete' data-id='$id'>
                        <i class='fa fa-trash-o'></i>
                    </a> </div>";
        }

        $name = "<div class='pull-left image'>
                    <img src='../dist/avatar/$avatar' style='height:20px;width:20px' class='img-circle' alt='User Image'>
                </div>  $name";
        $templist = array($name,$case,$status,$complain,$date,$btn);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>