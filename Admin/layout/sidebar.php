      <?php
        $query = "";
        $username = $_SESSION['username'];
        $query = "select concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name),resident_avatar from r_resident where resident_id = (SELECT user_resident_id FROM `r_user` where user_username = ?) ";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($fullname,$avatar);
        
        $list = array();
        while($stmt->fetch()){
           
        }  
      
      ?>
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/avatar/<?php echo $avatar; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fullname; ?></p>
          <small><?php echo $username; ?></small>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Sytem Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../index.html"><i class="fa fa-circle-o"></i> Case</a></li>
            <li><a href="../index2.html"><i class="fa fa-circle-o"></i> Officer Position</a></li>
            <li><a href="../index2.html"><i class="fa fa-circle-o"></i> Term</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Resident.php"><i class="fa fa-circle-o"></i> Resident</a></li>
            <li><a href="Officer.php"><i class="fa fa-circle-o"></i> Officer</a></li>
            <li><a href="Case.php"><i class="fa fa-circle-o"></i> Cases</a></li>
            <li><a href="Activity.php"><i class="fa fa-circle-o"></i> Activity</a></li>
          </ul>
        </li>
      </ul>
      