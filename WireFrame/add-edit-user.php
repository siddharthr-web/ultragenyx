<?php include('header.php'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; User - Add</h3>
			<div class="card-tools"> <a href="./users.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
		  <form class="form">
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Name</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control" name="" placeholder="Enter Name" value="<?php echo isset($_GET['id']) ? 'William Jhonsan': ''; ?>"/>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Email</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control" name="" placeholder="Enter Email" value="<?php echo isset($_GET['id']) ? 'willamj@malinator.com': ''; ?>"/>          
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Phone</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control" name="" placeholder="Enter Phone" value="<?php echo isset($_GET['id']) ? '+1 0321423232': ''; ?>"/>           
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Username</label>: <span class="requireClass">*</span>
					<input type="text" class="form-control" name="" placeholder="Enter Username" value="<?php echo isset($_GET['id']) ? 'willamj': ''; ?>"/>           
				  </div>
				</div>
			  </div>

			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Password</label>: <span class="requireClass">*</span>
					<input type="password" class="form-control" name="" placeholder="Enter Password" value="<?php echo isset($_GET['id']) ? '': ''; ?>"/>           
				  </div>
				</div>
				<div class="col-md-6">
				 
				</div>
			  </div>

			</div>
			<!-- /.card-body -->
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary"><?php echo isset($_GET['id']) ? 'Update': 'Add'; ?></button>
			  <a class="btn btn-default white mr-0" href="./users.php"><i class="ft ft-x-circle"></i> Cancel</a> 
			</div>    
		  </form>
		</div>

      </section>
    </section>
  </div>
  
<?php include('footer.php'); ?>