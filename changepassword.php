<?php 
include('header.php');
$currentpwd = isset($_POST["txt_currentpwd"]) ? md5($_POST["txt_currentpwd"]) : "";
$newpwd = isset($_POST["txt_newpwd"]) ? $_POST["txt_newpwd"] : "";
$confirmpwd = isset($_POST["txt_confirmpwd"]) ? $_POST["txt_confirmpwd"] : "";
$errMsg = "";
$errMsgReq = "";
$confirmpwdErr = $newpwdErr = $currentpwdErr = "";

if (isset($_POST["submit"])) {
    $isvalid = true;
    if (empty($_POST["txt_currentpwd"]) || empty($_POST["txt_newpwd"]) || empty($_POST["txt_confirmpwd"])) {
        $errMsgReq = "Please enter all fields";
        $isvalid = false;
    }

    if ($newpwd!=$confirmpwd) {
        $errMsg = "New password and Confirm password must be match.";
        $isvalid = false;
    }

    if ($errMsg == "") {
        $newpwdErr = checkStrength($newpwd);
        $confirmpwdErr = checkStrength($confirmpwd);
        if($newpwdErr!="" || $confirmpwdErr!=""){
            $errMsg = $confirmpwdErr;
            $isvalid = false;
        }
    } 
    
   
    if($isvalid){
        $query = "SELECT user_id,user_password FROM tbl_user WHERE user_email ='". setVal($connection, $_SESSION["LOGIN"]["usermail"])."' LIMIT 1";
        $userpwd = selectQuery($connection, $query);
        while ($row = $userpwd->fetch_assoc()) {
            if($row["user_password"]!=$currentpwd){
                $_SESSION['toast_list']['type'] = "error";
                $_SESSION['toast_list']['message'] = "Current password is incorrect";
                $isvalid = false;
            }else{
                $query = "UPDATE tbl_user SET user_password ='". setVal($connection,md5($newpwd))."' WHERE user_id ='". setVal($connection, $row["user_id"])."'";
                updateQuery($connection, $query);
                $_SESSION['toast_list']['type'] = "success";
                $_SESSION['toast_list']['message'] = "Password changed successfully.";
            }
        }
    } else {
        $_SESSION['toast_list']['type'] = "error";
        $_SESSION['toast_list']['message'] = ($errMsgReq!="") ? $errMsgReq : $errMsg;
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
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="nav-icon fas fa-key"></i>&nbsp; Change Password</h3>
			<div class="card-tools"> <a href="./users.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
		  <form class="form" name="form_user" id="form_change_password" method="POST" action="changepassword.php">
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Current Password</label>: <span class="requireClass">*</span>
					<input type="password" class="form-control validate[required,custom[passwordValidate]]" name="txt_currentpwd" id="txt_currentpwd"  placeholder="Enter Current Password" value="<?php echo $currentpwd; ?>"/>
				  </div>
				</div>
				<div class="col-md-6">
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">New Password</label>: <span class="requireClass">*</span>
					<input type="password" class="form-control validate[required,custom[passwordValidate]]" name="txt_newpwd" id="txt_newpwd" placeholder="Enter New Password" value="<?php echo $newpwd; ?>"/>           
				  </div>
				</div>
				<div class="col-md-6">
				</div>
			  </div>

			  <div class="row">
  				<div class="col-md-6">
  				  <div class="form-group">
    					<label class="control-label">Confirm New Password</label>: <span class="requireClass">*</span>
    					<input type="password" class="form-control validate[required, equals[txt_newpwd],custom[passwordValidate]]" name="txt_confirmpwd" id="txt_confirmpwd" autocomplete="off" placeholder="Enter Confirm New Password" value="<?php echo $confirmpwd; ?>" />           
  				  </div>
  				</div>
  				<div class="col-md-6">
  				 
  				</div>
			  </div>

			</div>
			<!-- /.card-body -->
			<div class="card-footer">
			  <input type="submit" name="submit" class="btn btn-primary" value="Change Password">
			  <!-- <a class="btn btn-default white mr-0" href="./users.php"><i class="ft ft-x-circle"></i> Cancel</a>  -->
			</div>    
		  </form>
		</div>

      </section>
    </section>
  </div>
  <script type="text/javascript">
  	$(document).ready(function() {
  		jQuery("#form_change_password").validationEngine();
      <?php
          if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
              echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
              unset($_SESSION['toast_list']);
          }
      ?>
	});
  </script>
<?php include('footer.php'); ?>