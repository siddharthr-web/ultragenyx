<?php 
require ("config/config.php");
require ("common/class/common.php");

$newpwd = $confirmpwd = "";
$errMsg = "";

if (isset($_POST["btnsubmit"])) {
    $isvalid = true;
    $token = $_POST['token'];
   
    if (empty($_POST["txt_confirmpwd"])) {
        $errMsg = "Confirm password is required";
        $isvalid = false;
    } else {
        $confirmpwd = $_POST["txt_confirmpwd"];
    }
   
    if (empty($_POST["txt_newpwd"])) {
        $errMsg = "New password is required";
        $isvalid = false;
    } else {
        $newpwd = $_POST["txt_newpwd"];
    }

    if ($isvalid) {
        $errMsg = checkStrength($newpwd);
        if($errMsg!=""){
            $errMsg = "New ".$errMsg;
            $isvalid = false;
        }
    } 
    if ($isvalid) {
        $errMsg = checkStrength($confirmpwd);
        if($errMsg!=""){
            $errMsg = "Confirm ".$errMsg;
            $isvalid = false;
        }
    } 
    if ($isvalid &&  $newpwd!=$confirmpwd) {
        $errMsg = "New password and Confirm password must be match.";
        $isvalid = false;
    }
   
    if($isvalid){
        $query = "SELECT user_email FROM tbl_password_reset WHERE token ='". setVal($connection, $token)."'
        AND expire_date >= CURRENT_DATE() LIMIT 1";
        $result = selectQuery($connection, $query);
       
        $numberRecords = mysqli_num_rows($result);
        if($numberRecords > 0)
        {
            while ($row = $result->fetch_assoc()) {
                    $query = "UPDATE tbl_user SET user_pass ='". setVal($connection,md5($newpwd))."' WHERE
                     user_email ='". setVal($connection, $row["user_email"])."'";
                    updateQuery($connection, $query);

                    $query = "DELETE FROM tbl_password_reset WHERE token ='". setVal($connection, $token)."'";
                    deleteQuery($connection, $query);

                    $_SESSION['toastr']['type'] = "success";
                    $_SESSION['toastr']['message'] = "Password reset successfully.";
                    header("location:" . SITE_URL);
            }
        }
       else{
            //echo "here ". $query;
            $_SESSION['toastr']['type'] = "error";
            $_SESSION['toastr']['message'] = "Link is expired or Password is already set using this link.";
       }
    }else{
        $_SESSION['toastr']['type'] = "error";
        $_SESSION['toastr']['message'] =  $errMsg==""?"Please fill all required fields.":$errMsg;
    }
}

function checkStrength($pwd)
{
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number = preg_match('@[0-9]@', $pwd);

    if (!$uppercase || !$lowercase || !$number || strlen($pwd) < 8) {
        return "Password must contain at least 8 characters,including UPPER/lowercase and numbers.";
    } else {
        return "";
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
        <div class="login-logo"><img src="<?php echo SITE_URL; ?>assets/images/logo.png" class="brandImg" /></div>
        <!-- /.login-logo -->
        <div style="color: red;text-align: center;margin-bottom: 10px;"> </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset Password</p>
                <form id="frm_reset_password" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"
                    style="text-align: center;" autocomplete="off">
                    <!-- <input type="password" style="display:none;"/> -->
                    <input type="hidden" value="<?php echo isset($_GET['token'])?$_GET['token']:"" ?>" name="token" />
                    <div class="row" style="text-align:left;margin-top:5px;">
                        <div class="col-md-6">
                            <label>New Password</label>:
                        </div>
                        <div class="col-md-6" style="text-align:left">
                         <input type="password" readonly onfocus="$(this).removeAttr('readonly');" style="display:none"/>
                            <input type="text" class="form-control validate[required,custom[passwordValidate]]" placeholder="New Password" name="txt_newpwd" id="txt_newpwd"
                             onfocus="changeTypeInput(this);" onblur="changeTypeInput(this)" value="<?php echo $newpwd; ?>" 
                             autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="row" style="text-align:left;margin-top: 5px;">
                        <div class="col-md-6">
                            <label>Confirm Password</label>:
                        </div>
                        <div class="col-md-6" style="text-align:left">
                            <input type="text" class="form-control validate[required, equals[txt_newpwd],custom[passwordValidate]]" placeholder="Confirm Password" id="txt_confirmpwd"
                             onfocus="changeTypeInput(this);"  onblur="changeTypeInput(this)" name="txt_confirmpwd"
                             value="<?php echo $confirmpwd; ?>" autocomplete="new-password"/>
                        </div>
                    </div>
                    <div class="container col-md-6" style="margin-top:10px;">
                        <div class="text-center">
                            <input type="submit" name="btnsubmit" id="btnsubmit" value="Reset Password"
                               class="btn btn-primary btn-block" />
                        </div>
                    </div>
                </form>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</body>

<script type="text/javascript" language="javascript">
 function changeTypeInput(inputElement){ 
   inputElement.type="password";
}
$(document).ready(function() {
    document.getElementById('txt_newpwd').setAttribute("type", "password"); 
    document.getElementById('txt_confirmpwd').setAttribute("type", "password"); 
    <?php
        if(!empty($_SESSION['toastr']) && isset($_SESSION['toastr']) && !empty($_SESSION['toastr']['type']))
        {
            echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'")'; 
            unset($_SESSION['toastr']);
        }
    ?>
      jQuery("#frm_reset_password").validationEngine();
});
</script>