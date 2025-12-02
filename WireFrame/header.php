<!DOCTYPE html>
<html lang="en" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>Ultragenyx Pharmaceutical</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="AdminPanel/plugins/fontawesome-free/css/all.min.css">
<!-- bootstrap-switch. -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.css" rel="stylesheet" /> -->
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Theme style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.12.0/css/OverlayScrollbars.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- summernote -->
<link rel="stylesheet" href="css/CustomCSS.css">

<link rel="stylesheet" type="text/css" href="assets/vendors/css/sweetalert2.min.css">

<!-- BEGIN JS--> 
<!-- jQuery --> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
<!-- jQuery UI 1.11.4 --> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>  -->
<!-- <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> 
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script>  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> --> 
<!-- Bootstrap 4 --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- Bootstrap Switch --> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>  -->
<!-- overlayScrollbars --> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.12.0/js/jquery.overlayScrollbars.min.js"></script>  -->
<!-- AdminLTE App --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> 
<!--For Sweet Alerts--> 
<script src="assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script> 
<script src="assets/vendors/js/toastr.min.js" type="text/javascript"></script> 
<script src="assets/vendors/js/switchery.min.js" type="text/javascript"></script> 
<!-- <script src="js/bootstrap-datatable-common-funcation.js"></script>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script> 
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script> 
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/extensions/export/bootstrap-table-export.min.js"></script> 
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script> 
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script> 
<script src="js/common-js.js"></script> 
<script src="js/common.list.function.js"></script> 
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.17.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF/jspdf.min.js"></script>
<script src="https://unpkg.com/tableexport.jquery.plugin/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<!-- <script src="https://www.sagaxteam.com/assets/js/common-js.js"></script> -->
<!-- <script src="https://www.sagaxteam.com/assets/js/common.list.function.js"></script> -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<!-- END JS--> 

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper"> 
  <nav class="main-header navbar navbar-expand navbar-white navbar-light"> 
    <ul class="navbar-nav">
      <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown"> <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="username">Ace Admin</span> </a>
        <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item " href="#" data-type="Sub Item 01">Logout</a></div>
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <a href="#" class="brand-link"> <img src="images/logo-icon.png" alt="" class="brandlogo_icon" /> <img src="images/logo1.png" alt="" class="brandlogo" /> </a>     
    <div class="sidebar"> 
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item"> <a class="nav-link border2" title="Dashboard" href="dashboard.php"> <i class="nav-icon fas fa-briefcase"></i>
            <p> Dashboard </p>
            </a> </li>
          <li class="nav-item"> <a class="nav-link" title="Assembly Management" href="product-management.php"> <i class="nav-icon fas fa-tasks"></i>
            <p> Assembly Management </p>
            </a> </li>
          <li class="nav-item"> <a class="nav-link" title="Sub Components" href="sub-components.php"> <i class="nav-icon fas fa-th-large"></i>
            <p> Sub Components </p>
            </a> </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Admin Only
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="./masters.php?type=component" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Component</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./masters.php?type=process" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Process</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./masters.php?type=product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./masters.php?type=equipment" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Equipment</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./masters.php?type=materials" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Materials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./masters.php?type=manufacturer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manufacturer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./masters.php?type=data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./masters.php?type=type" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item"> <a class="nav-link" title="Users" href="./users.php"> <i class="nav-icon fas fa-users-cog"></i>
            <p> Users </p>
            </a> </li>
          <li class="nav-item has-treeview"> <a class="nav-link" title="My Profile" href="./add-edit-user.php?id=1"> <i class="nav-icon fas fa-user"></i>
            <p> My Profile </p>
            </a> </li>
          <li class="nav-item has-treeview"> <a class="nav-link" title="Logout" href="./login.php"> <i class="nav-icon fas fa-sign-out-alt"></i>
            <p> Logout </p>
            </a> </li>
        </ul>
      </nav>      
    </div>
  </aside>