<?php 
include("config/config.php");
include("common/class/common.php");
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
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>AdminPanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo SITE_URL; ?>AdminPanel/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- jQuery --> 
<script src="<?php echo SITE_URL; ?>AdminPanel/plugins/jquery/jquery.min.js"></script> 
<!-- Bootstrap 4 --> 
<script src="<?php echo SITE_URL; ?>AdminPanel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- AdminLTE App --> 
<script src="<?php echo SITE_URL; ?>AdminPanel/dist/js/adminlte.min.js"></script>
<?php include('../common/templates/validation_js.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <img src="<?php echo SITE_URL; ?>assets/images/logo.png" class="brandImg" /> </div>
  <!-- /.login-logo -->
  <div style="color: red;text-align: center;margin-bottom: 10px;"> </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Reset Password</p>
       <form class="form" action="login.php" method="get" style="text-align: center;">
    <p>
      We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
    </p>
      <p>Please login into your email account and click on the link we sent to reset your password</p>
      <div class="container col-md-4">
          <div class="text-center">
            <input type="submit" name="btnsubmit" id="btnsubmit" value="Ok" class="btn btn-primary btn-block" />
          </div>
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


<style>
.brandImg {
  height: auto;
  width: 250px;
}
.login-box-msg{font-weight:700; text-transform:uppercase;}
.login-card-body{ border-radius:10px;}
</style>


<script type="text/javascript" language="javascript">
$(document).ready(function() {
  <?php
        if(!empty($_SESSION['toastr']) && isset($_SESSION['toastr']) && !empty($_SESSION['toastr']['type']))
        {
            echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'")'; 
            unset($_SESSION['toastr']);
        }
    ?>
});
  document.getElementById('txt_usermail').focus();
</script>