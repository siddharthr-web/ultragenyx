<?php 
include("config/config.php");
include("common/class/common.php");
require("common/class/validation.php");


// echo "<pre>";
if(isset($_SESSION['LOGIN']))
 header("location:" . SITE_URL . "dashboard.php");
if (isset($_POST["btnsubmit"]))
{
  $isvalid = true;
  
  if(empty($_POST["txt_usermail"]) || empty($_POST["txt_password"])){
    $isvalid = false;
  }
 
  if (!empty($_POST["txt_usermail"]) && !filter_var($_POST["txt_usermail"], FILTER_VALIDATE_EMAIL)) {
    $isvalid = false;
  }
  if($isvalid){
    if (!empty($_SESSION["LOGIN"])) 
    {
      unset($_SESSION["LOGIN"]);  
    }
         
    $usermail = setVal($connection, trim(getval($_POST["txt_usermail"])));
    $pass = setVal($connection, trim(getval($_POST["txt_password"]))); 
  
    $getUserresult = "SELECT * FROM tbl_user WHERE user_email ='". setVal($connection, $usermail)."' 
    AND user_password = '".setval($connection, md5($pass))."' AND is_active = 1 LIMIT 0,1";
     
    $result = selectQuery($connection, $getUserresult);
    $numberRecords = mysqli_num_rows($result);

    if($numberRecords > 0) {
      while ($rows = mysqli_fetch_assoc($result)) {
        $_SESSION["LOGIN"]["username"] = $rows["name"];
        $_SESSION["LOGIN"]["user_id"] = $rows["user_id"];
      }

      $_SESSION["LOGIN"]["usermail"] = $usermail;
      $_SESSION["LOGIN"]["password"] = $pass;
      header("location:" . SITE_URL . "dashboard.php");
    } else {
      $_SESSION['toastr']['type'] = "error";
      $_SESSION['toastr']['message'] = "Incorrect username or password entered.";
    }
  }
  else{
    $_SESSION['toastr']['type'] = "error";
    $_SESSION['toastr']['message'] = "Incorrect username or password entered.";
  }
}

?>

<!DOCTYPE html>
<html lang="en" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>Ultragenyx</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>AdminPanel/plugins/fontawesome-free/css/all.min.css">
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
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/CustomCSS.css">

<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>assets/vendors/css/sweetalert2.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.css" rel="stylesheet"/>

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
<script src="<?php echo SITE_URL; ?>assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script> 
<script src="<?php echo SITE_URL; ?>assets/vendors/js/toastr.min.js" type="text/javascript"></script> 
<script src="<?php echo SITE_URL; ?>assets/vendors/js/switchery.min.js" type="text/javascript"></script> 
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
<?php include('common/templates/validation_js.php'); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <img src="<?php echo SITE_URL; ?>assets/images/logo.png" class="brandImg" /> </div>
  <!-- /.login-logo -->
  <div style="color: red;text-align: center;margin-bottom: 10px;"> </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>
      <form id="frm_login" class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control validate[required]" placeholder="Username"  data-val="true" data-val-required="The Email field is required." id="txt_usermail" name="txt_usermail" value="">
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control validate[required]" placeholder="Password" data-val="true" data-val-required="The Password field is required." id="txt_password" name="txt_password">
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
          </div>
        </div>

        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <p class="mb-1"> <a href="forgot_password.php">Forgot Password?</a> </p>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4 mr-auto ml-auto">
            <input type="submit" name="btnsubmit" id="btnsubmit" value="Login" class="btn btn-primary btn-block">
          </div>
          <!-- /.col --> 
        </div>

      </form>
      <!-- /.social-auth-links --> 
    </div>
    <!-- /.login-card-body --> 
  </div>
</div>
<!-- /.login-box --> 
</body>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    <?php
        if(isset($_SESSION['toastr']['type']) ) { 
                echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'");';  
            unset($_SESSION['toastr']);
        }
    ?>
      jQuery("#frm_login").validationEngine();

  });
</script>

<style>
.brandImg {
  height: auto;
  width: 250px;
}
.login-box-msg{font-weight:700; text-transform:uppercase;}
.login-card-body{ border-radius:10px;}
</style>


