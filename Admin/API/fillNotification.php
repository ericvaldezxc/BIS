<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    
    $query = "select count(*) from t_request_certificate where request_certificate_active = 'Active' and request_certificate_seen = 'Send' ";

    $stmt = $connection->prepare($query);

    $stmt->execute();
    $stmt->bind_result($count);
    while($stmt->fetch()){
        
    }  
    $header  = ' <li class="header">No new request</li>';
    if($count == 0)
    {
        $count = '';

    }
    else
    {
        $header  = ' <li class="header">You have '.$count.' unread request</li>';

    }

    $query = "select request_certificate_resident_id,request_certificate_purpose,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name) as fullname,request_certificate_id,request_certificate_type,DATE_FORMAT(request_certificate_date_added, '%M %e, %Y')  from t_request_certificate inner join r_resident on resident_id = request_certificate_resident_id where request_certificate_active = 'Active' and    request_certificate_done = 'No' order by request_certificate_date_added desc ";

    $stmt = $connection->prepare($query);

    $stmt->execute();
    $notificationList = $header . '<li>';
    
    $stmt->bind_result($resId,$purpose,$name,$id,$type,$date);
    while($stmt->fetch()){
        $icon = 'clearance.png';
        $class = 'clearanceBtn';
        if($type == 'Indigency')
        {
            $icon = 'indigency.png';
            $class = 'indigencyBtn';

        }
        $notificationList = $notificationList . 
                        "<li><!-- start message -->
                            <a href='#' class='$class' data-type='$type' data-resident-id='$resId' data-id='$id' data-name='$name' data-purpose='$purpose' data-date='$date'>
                                
                                <h5>
                                $name
                                <small class='pull-right'><i class='fa fa-calendar-o'></i> $date</small>
                                </h5>
                                <small class='pull-right'><i class='fa fa-flag'></i> $type</small>
                                <p>$purpose</p>
                                
                            </a>
                        </li>";
        
    }  

    $notificationList = $notificationList . '<li>
    </ul>
                        </li>
                        
    <ul class="menu">';
    // <li class="footer"><a href="Request.php">See All Request</a></li>


    $list = [ 
        "Notification" => $notificationList ,
        "NewNotification" => $count 
    
    ];
    echo json_encode($list);
    $connection->close();
    

?>