<?php 
include('header.php');
$type = $_GET['type'];
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo ucfirst($type); ?>  - Add</h3>
			<div class="card-tools"> <a href="./masters.php?type=<?php echo $type; ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
		  <form class="form">
			<div class="card-body">
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label"><?php echo ucfirst($type); ?> Name</label>: <span class="requireClass">*</span>
					<input type="text" name="" class="form-control" placeholder="Enter <?php echo ucfirst($type); ?> Name">            
				  </div>
				</div>
				<div class="col-md-6">
				  
				</div>
			  </div>
			 
			</div>
			<!-- /.card-body -->
			<!-- <div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
			  <a class="btn btn-default white mr-0" href="./product-management.php"><i class="ft ft-x-circle"></i> Cancel</a> 
			</div>  -->   
		  </form>
		</div>
		
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-default white mr-0" href="./masters.php?type=<?php echo $type; ?>"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div>
		
      </section>
    </section>
  </div>
  
<?php include('footer.php'); ?>