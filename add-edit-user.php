<?php 
include('header.php');
include ('queries/add-edit-user-query.php');
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
		<div class="card">
		  <div class="card-header">
		  	<?php if(isset($_GET['type'])){ ?>
				<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; My Profile</h3>
		  	<?php }else{ ?>
				<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; 
					<?php echo isset($_GET['id']) ? "User - Edit": "User - Add"; ?>
				</h3>
			<?php } ?>
			<div class="card-tools"> <a href="./users.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
		  <form class="form" name="form_user" id="form_user" method="POST" action="<?php echo $formAction; ?>">
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Name</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control validate[required]" name="name" id="name"  placeholder="Enter Name" value="<?php echo $name; ?>"/>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Email</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control validate[required,custom[email]]" name="user_email" id="user_email" placeholder="Enter Email" value="<?php echo $user_email; ?>"/>          
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Phone</label>:
					<input type="text" class="form-control validate[custom[phone],minSize[10],maxSize[10]]" name="user_phone" id="user_phone" placeholder="Enter Phone" value="<?php echo $user_phone; ?>" maxlength="10" />           
				  </div>
				</div>
				
				
			  <div class="col-md-6">
                   <div class="form-group">
                       <label class="control-label">Password</label>: <span class="requireClass">*</span>
                       <div class="input-group-append password-wrapper">
                           <input type="password" class="form-control validate[required, custom[passwordValidate]]" name="user_password" id="user_password" autocomplete="off" placeholder="Enter Password" value="" />          
                           <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                               <i class="fa fa-eye"></i>
                           </button>
                       </div>
                   </div>
               	</div>

			  </div>

			</div>
			<!-- /.card-body -->
			<div class="card-footer">
			  <input type="submit" name="submit" class="btn btn-primary" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
			  <a class="btn btn-default white mr-0" href="./users.php"><i class="ft ft-x-circle"></i> Cancel</a> 
			</div>    
		  </form>
		</div>

      </section>
    </section>
  </div>
  <script type="text/javascript">
  	$(document).ready(function() {
  		jQuery("#form_user").validationEngine();
      <?php
          if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
              echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
              unset($_SESSION['toast_list']);
          }
      ?>
	});

	$(document).ready(function(){
		$("#togglePassword").click(function(){
			let input = $("#user_password");
			let newType = input.attr("type") === "password" ? "text" : "password";

			// Clone the input and replace it to bypass jQuery 1.8.2 restriction
			let newInput = input.clone().attr("type", newType);
			input.replaceWith(newInput);

			if(newInput.attr("type") === "text"){
				$(this).html('<i class="fa fa-eye"></i>');
			} else {
				$(this).html('<i class="fa fa-eye-slash"></i>');
			}
			
			
		});
    });
  </script>
<?php include('footer.php'); ?>