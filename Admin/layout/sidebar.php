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
        <li id="dashboard" >
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li id="sysSetup" class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Sytem Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="barangay"><a href="Barangay.php"><i class="fa fa-circle-o"></i> Barangay</a></li>
            <li id="case"><a href="Case.php"><i class="fa fa-circle-o"></i> Case</a></li>
            <li id="officerPosition"><a href="OfficerPosition.php"><i class="fa fa-circle-o"></i> Officer Position</a></li>
            <li id="term"><a href="Term.php"><i class="fa fa-circle-o"></i> Term</a></li>
            <li id="user"><a href="User.php"><i class="fa fa-circle-o"></i> User</a></li>
          </ul>
        </li>
        <li id="transaction" class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="resident"><a href="Resident.php"><i class="fa fa-circle-o"></i> Resident</a></li>
            <li id="residentCase"><a href="ResidentCase.php"><i class="fa fa-circle-o"></i> Resident Case</a></li>
            <li id="officer"><a href="Officer.php"><i class="fa fa-circle-o"></i> Officer</a></li>
            <li id="activity"><a href="Activity.php"><i class="fa fa-circle-o"></i> Activity</a></li>
          </ul>
        </li>
        <li id="report" class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="clearance"><a href="Clearance.php"><i class="fa fa-circle-o"></i> Clearance</a></li>
            <li id="indigency"><a href="Indigency.php"><i class="fa fa-circle-o"></i> Indigency</a></li>
          </ul>
        </li>
      </ul>
     