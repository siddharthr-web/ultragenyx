<?php 
include('header.php');
include ('queries/add-edit-masters-query.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
	   <form class="form" name="form_master" id="form_master" method="POST" action="<?php echo $formAction; ?>">
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo isset($_GET['id']) ? ucfirst('Assembly Type')." - Edit": ucfirst('Assembly Type')." - Add"; ?></h3>
			<div class="card-tools"> <a href="./masters.php?type=<?php echo $type; ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label"><?php echo ucfirst($type); ?> Name</label>: <span class="requireClass">*</span>
					<input type="text" name="name" class="form-control validate[required]" placeholder="Enter <?php echo ucfirst($type); ?> Name" value="<?php echo $name; ?>">            
				  </div>
				</div>
				<div class="col-md-6">
				  
				</div>
			  </div>
			 
			</div>
			</div>

	        <!-- /.card-body -->
	        <div class="card-footer">
	          <input type="submit" name="submit" class="btn btn-primary" value="<?php echo ($id=="") ? "Add" : "Update"; ?>">
	          <a class="btn btn-default white mr-0" href="./masters.php?type=<?php echo $type; ?>"><i class="ft ft-x-circle"></i> Cancel</a> 
	        </div>    
	      </form>
	    </div>
	  </section>
	</section>
  </div>
  <script type="text/javascript">
  	$(document).ready(function() {
    jQuery("#form_master").validationEngine();
    <?php
          if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
              echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
              unset($_SESSION['toast_list']);
          }
      ?>
	});
  </script>
<?php include('footer.php'); ?>