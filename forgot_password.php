

<?php 
include("config/config.php");
include("common/class/common.php");


if (isset($_POST["btnsubmit"]))
{
  //echo '<script>alert("123")</script>';
  $isvalid = true;
  
  if(empty($_POST["txt_usermail"])){
    $isvalid = false;
  }

  if (!empty($_POST["txt_usermail"]) && !filter_var($_POST["txt_usermail"], FILTER_VALIDATE_EMAIL)) {
    $isvalid = false;
  }
  $email = $_POST["txt_usermail"];
  if($isvalid){
    
    $getUserresult = "SELECT * FROM tbl_user WHERE user_email ='". setVal($connection, $email)."' AND is_active = 1 LIMIT 0,1";
     
    $result = selectQuery($connection, $getUserresult);
    $numberRecords = mysqli_num_rows($result);

    if($numberRecords <= 0)
    {
        $_SESSION['toastr']['type'] = "error";
       echo $_SESSION['toastr']['message'] = "User is not registered in the system."; die;
    }
    else{
      //
        // generate a unique random token of length 100
         $token = bin2hex(random_bytes(50));
         $expFormat = mktime(
          date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
          );
          $expDate = date("Y-m-d H:i:s",$expFormat);
      
          // store token in the password-reset database table against the user's email
          $sql = "INSERT INTO tbl_password_reset(user_email, token,expire_date)
           VALUES ('". setVal($connection, $email)."', '". setVal($connection, $token)."','" .setVal($connection, $expDate). "')";
          $results = insertQuery($connection, $sql);
      
          // Send email to user with the token in a link they can click on
          $url = SITE_URL."/reset_password.php?token=".$token." target= _blank";
          $email_to = $email;
          $subject = "Password Recovery - Sagax Team";
          // $body = "Hi there, click on this <a href= $url>link</a> to reset your password on our site";
          // $body = wordwrap($body,70);

          
$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.="<p><a href= $url>Reset Password</a></p>";   
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';    
$output.='<p>Thanks,</p>';
$output.='<p>Ultragenyx</p>';
$body = $output; 


    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <sagaxteam@malinator.com>' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";


          mail($email_to, $subject, $body , $headers);
          header('location: pendingapproval.php?email=' . $email);

      //
    }
  }
  else{
    $_SESSION['toastr']['type'] = "error";
    $_SESSION['toastr']['message'] = "Please enter valid email address.";
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
      <p class="login-box-msg">RESET PASSWORD</p>
      <form id="frm_reset_password" class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control validate[required, custom[email]]" placeholder="Email"  data-val="true" data-val-required="The Email field is required." id="txt_usermail" name="txt_usermail" value="">
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4"></div>
          <div class="col-4">
            <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-block">
            <input type="button" name="btndupsubmit" id="btndupsubmit" class="btn" value="Submit" style="display:none;"/>
          </div>
          <div class="col-4"></div>
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


<style>
.brandImg {
  height: auto;
  width: 250px;
}
.login-box-msg{font-weight:700; text-transform:uppercase;}
.login-card-body{ border-radius:10px;}
</style>


<script type="text/javascript">
  $(document).ready(function() {
<?php
    if(!empty($_SESSION['toastr']) && isset($_SESSION['toastr']) && !empty($_SESSION['toastr']['type']))
    {
        echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'")'; 
        unset($_SESSION['toastr']);
    }
  ?>
      jQuery("#frm_reset_password").validationEngine();
});
  document.getElementById('txt_usermail').focus();
</script>