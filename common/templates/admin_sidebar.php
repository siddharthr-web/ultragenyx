        <!-- Main Sidebar Container -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"> 
    <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown"> <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="username">
        <?php echo $_SESSION["LOGIN"]["username"]?></span> </a>
        <div class="dropdown-menu dropdown-menu-right"> 
          <a class="dropdown-item " href="<?php echo SITE_URL; ?>admin/logout.php" data-type="Sub Item 01">Logout</a>
          <!-- <a class="dropdown-item " href="#" data-type="Sub Item 02">Sub Item 02</a> 
          <a class="dropdown-item " href="#" data-type="Sub Item 03">Sub Item 03</a> -->
         </div>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link"> 
            <img src="<?php echo SITE_URL; ?>assets/images/logo-icon.png" alt="" class="brandlogo_icon" />
            <img src="<?php echo SITE_URL; ?>assets/images/logo1.png" alt="" class="brandlogo" /> </a>
            <div class="sidebar">
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a class="nav-link border2" title="Dashboard" href="<?php echo SITE_URL; ?>admin/dashboard.php"> <i class="nav-icon fas fa-briefcase"></i>
                      <p> Dashboard </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" title="Job Requests" href="<?php echo SITE_URL; ?>/admin/job-requests.php"> <i class="nav-icon fas fa-tasks"></i>
                      <p> Job Requests </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" title="Candidate List" href="<?php echo SITE_URL; ?>/admin/candidate_list.php"> <i class="nav-icon fas fa-address-book"></i>
                      <p> Candidates </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" title="User List" href="<?php echo SITE_URL; ?>/admin/user_list.php"> <i class="nav-icon fas fa-users"></i>
                      <p> Users </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview">
                    <a class="nav-link" title="Change Password" href="<?php echo SITE_URL; ?>admin/changepassword.php"> <i class="nav-icon fas fa-key"></i>
                      <p> Change Password </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview">
                    <a class="nav-link" title="Logout" href="<?php echo SITE_URL; ?>admin/logout.php"> <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p> Logout </p>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
  </aside>