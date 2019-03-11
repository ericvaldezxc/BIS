<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select indigency_record_control_number,indigency_record_id,resident_alive,resident_avatar,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname,indigency_record_purpose,DATE_FORMAT(indigency_record_record_date_updated, '%M %e, %Y') from t_indigency_record inner join r_resident on resident_id = indigency_record_resident_id where resident_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
    // $query = "select * from r_department ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($controlNumber,$id,$alive,$avatar,$name,$purpose,$date);
    
    $list = array();
    while($stmt->fetch()){

        if($alive == "Yes")
        {
            $alive = " <div class='text-center'> <span class='label label-success active-label'>Yes</span> </div>";            
        }
        else
        {
            $alive = " <div class='text-center'> <span class='label label-danger active-label'>No</span> </div>";         
        }

        $btn =  " <div class='text-center'> 
                        <a class='btn btn-sm btn-info btn-flat downloadFile' data-id='$id'>
                            <i class='fa fa-download'></i>
                        </a> 
                    </div>";

        $name = "<div class='pull-left image'>
                    <img src='../dist/avatar/$avatar' style='height:20px;width:20px' class='img-circle' alt='User Image'>
                </div>  $name";
        $templist = array($controlNumber,$name,$alive,$purpose,$date);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>