<?php 
include('header.php');
include ('queries/add-edit-product-query.php');
  $dataArray = getAllRecords($connection, 'tbl_sub_component', array('is_active'=>1));
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
      <form class="form" name="form_product" id="form_product" method="POST" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; Assembly - Add</h3>
			<div class="card-tools"> <a href="./product-management.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Assembly Name</label>: <span class="requireClass">*</span>
					<input type="text" name="name" id="name" class="form-control validate[required]" placeholder="Enter Assembly Name" value="<?php echo $name; ?>">            
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Internal Part No</label>: <span class="requireClass">*</span>
					<input type="text" name="internal_part_no" id="internal_part_no" class="form-control validate[required]" placeholder="Enter Internal Part No"  value="<?php echo $internal_part_no; ?>">            
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Upload Drawing of Assembly</label>:
					          <input name="drawing_of_assembly" id="drawing_of_assembly" class="form-control" type="file" value="<?php //echo ; ?>"  onchange="checkfile(this,'photo');">
					        <?php if(isset($_GET['id']) && $drawing_of_assembly!=""){ ?>
                    	<a href="../assets/uploads/drawing-assembly/<?php echo $drawing_of_assembly; ?>" target="_blank"><img src="../assets/uploads/drawing-assembly/<?php echo $drawing_of_assembly; ?>" width="100%" height="250"></a>
                	<?php } ?>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Vendor Part No.</label>: <span class="requireClass">*</span>
					<input name="vendor_part_no" id="vendor_part_no" class="form-control validate[required]" type="text" placeholder="Enter Vendor Part No." value="<?php echo $vendor_part_no; ?>">           
				  </div>
				</div>
			  </div>
			 
			</div>
		</div>

		<div class="card">
          <div class="card-header">
            <h3 class="card-title">Data</h3>            
          </div>
          <!-- Bootstrap 3 table -->
            <div class="card-body">

            	 <div class="row">
				
				<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Material</label>: <span class="requireClass">*</span>
          <select class='form-control validate[required]' name='material_id_fk' id='material_id_fk'>
            <option value="">-Select Material-</option>
					<?php echo getDropdown($connection, 'materials', 'id', 'name', array('is_active'=>1), $material_id_fk); ?>  
          </select>         
				  </div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Manufacturer</label>: <span class="requireClass">*</span>
          <select class='form-control validate[required]' name='manufacturer_id_fk' id='manufacturer_id_fk'>
            <option value="">-Select Manufacturer-</option>
					<?php echo getDropdown($connection, 'manufacturer', 'id', 'name', array('is_active'=>1), $manufacturer_id_fk); ?>
        </select>
				  </div>
				</div>
			  </div>
			  <div class="row">
				
				<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Process</label>: <span class="requireClass">*</span>
          <select class='form-control validate[required]' name='process_id_fk' id='process_id_fk'>
            <option value="">-Select Process-</option>
					<?php echo getDropdown($connection, 'process', 'id', 'name', array('is_active'=>1), $process_id_fk); ?>   
          </select>        
				  </div>
				</div>
				<div class="col-md-6">
				 <div class="form-group">
					<label class="control-label">Equipment</label>: <span class="requireClass">*</span>
					<select class='form-control validate[required]' name='equipment_id_fk' id='equipment_id_fk'>
            <option value="">-Select Equipment-</option>
          <?php echo getDropdown($connection, 'equipment', 'id', 'name', array('is_active'=>1), $equipment_id_fk); ?>
        </select>
				  </div>
				 
				</div>
			  </div>



		<div class="row">
			<div class="col-md-6">
			   <div class="form-group">
					<label class="control-label">Product/Program</label>: <span class="requireClass">*</span>
          <select class='form-control validate[required]' name='product_id_fk' id='product_id_fk'>
            <option value="">-Select Product/Program-</option>
					<?php echo getDropdown($connection, 'product', 'id', 'name', array('is_active'=>1), $product_id_fk); ?>
        </select>
				  </div>
				</div>
			<div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Leachable/Extractables Data</label>: <span class="requireClass">*</span>
                    <input name="leachable_extractables_data" id="leachable_extractables_data" class="form-control validate[required]" type="text"  placeholder="Leachable/Extractables Data"  value="<?php echo $leachable_extractables_data; ?>"/>
                </div>
            </div>
			</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Validation</label>: <span class="requireClass">*</span>
                            <input name="validation" id="validation" class="form-control validate[required]" type="text"  placeholder="Validation"  value="<?php echo $validation; ?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Temp Range </label>: <span class="requireClass">*</span>
	                         <div class="row">
	                            <div class="col-md-6">
	                            <input name="temp_range_from" id="temp_range_from" class="form-control validate[required]" type="text"  placeholder="From"  value="<?php echo $temp_range_from; ?>"/>
	                        </div>
	                        <div class="col-md-6">
	                            <input name="temp_range_to" id="temp_range_to" class="form-control validate[required]" type="text"  placeholder="To"  value="<?php echo $temp_range_to; ?>"/>
	                        </div>
	                       </div>
                     </div>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">pH Range </label>: <span class="requireClass">*</span>
                            <div class="row">
	                            <div class="col-md-6">
	                            <input name="ph_range_from" id="ph_range_from" class="form-control validate[required]" type="text"  placeholder="From"  value="<?php echo $ph_range_from; ?>"/>
	                        </div>
	                        <div class="col-md-6">
	                            <input name="ph_range_to" id="ph_range_to" class="form-control validate[required]" type="text"  placeholder="To"  value="<?php echo $ph_range_to; ?>"/>
	                        </div>
	                       </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Pressure Range </label>: <span class="requireClass">*</span>
                            <div class="row">
	                            <div class="col-md-6">
	                            <input name="pressure_range_from" id="pressure_range_from" class="form-control validate[required]" type="text"  placeholder="From"  value="<?php echo $pressure_range_from; ?>"/>
	                        </div>
	                        <div class="col-md-6">
	                            <input name="pressure_range_to" id="pressure_range_to" class="form-control validate[required]" type="text"  placeholder="To"  value="<?php echo $pressure_range_to; ?>"/>
	                        </div>
	                       </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be irradiated? </label>: <span class="requireClass">*</span>
                            <!-- <input class="form-control validate[required]" type="text"  placeholder="Can be can_be_irradiated?" /> --><?php //echo $can_be_irradiated; ?>
                            <select name="can_be_irradiated" id="can_be_irradiated" class="form-control validate[required]">
                            	<option value="1">Yes</option>
                            	<option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be autoclaved? </label>: <span class="requireClass">*</span>
                            <select name="can_be_autoclaved" id="can_be_autoclaved" class="form-control validate[required]">
                            	<option value="1">Yes</option>
                            	<option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>







        <div class="card">
          <div class="card-header">
            <h3 class="card-title">CoA (sample)</h3>            
          </div>
          <!-- Bootstrap 3 table -->
            <div class="card-body">
                <div class="row">
              <div class="col-md-12">
  						<div class="customer_records2 form-inline">
  							
							<input name="coa_sample_file" id="coa_sample_file" class="form-control" type="file"  placeholder="CoA" />
							<div class="export btn-group">
                            	<button class="btn btn-primary" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></button>
                    		</div>
						        
					          <!-- <br> -->
  						</div>







  						<div class="customer_records_dynamic2"></div>
					</div>
              </div>
              <div class="row">
                <div class="col-md-12">
            		<a class="btn btn-primary extra-fields-customer2 float-right" style="color:white;     margin-top: -40px; margin-right: 25px; background: blue;"><i class="fa fa-plus"></i></a>
            	</div>
        	</div>
            </div>
            <!-- /.card-body -->

              
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sub Component</h3>            
          </div>
          <!-- Bootstrap 3 table -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
					<!-- <label class="control-label">Sub Component</label>: <span class="requireClass">*</span> -->
  						<div class="customer_records1 form-inline">

                    <select class="form-control validate[required]" name="sub_copoment_id[]">
                      <option value="">-Select Sub-Component-</option>";
                      <?php
                      $subCompOptions = "";
                       while ($row = $dataArray->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['sub_copoment_name']; ?></option>
                       <?php
                      $subCompOptions = $subCompOptions."<option value='".$row['id']."'>".$row['sub_copoment_name']."</option>";
                        } ?>
                    </select>

						          <input name="" id="" type="text" class="form-control validate[required] inline_field" placeholder="Enter GPA">
						          <input name="" id="" type="text" class="form-control validate[required] inline_field" placeholder="Enter Description">
						          <!-- <textarea class="form-control validate[required] inline_field"  rows="2" cols="40" placeholder="Enter Description"></textarea> -->
						          <select class='form-control validate[required]' name='material_id_s' id='material_id_s'>
                           <option value="">-Select Material-</option>
                      <?php echo getDropdown($connection, 'materials', 'id', 'name', array('is_active'=>1), ""); ?>
                    </select>
						          <a class="form-control inline_field btn btnprimary" href="./add-edit-subcomponent?id=1" target="_blank">View</a>
						        
					          <!-- <br> -->
  						</div>
  						<div class="customer_records_dynamic1"></div>
				</div>
              </div>
              <div class="row">
                <div class="col-md-12">
            		<a class="btn btn-primary extra-fields-customer1 float-right" style="color:white;     margin-top: -40px; margin-right: 25px; background: blue;"><i class="fa fa-plus"></i></a>
            	</div>
        	</div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
              <a class="btn btn-default white mr-0" href="./product-management.php"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
        </div>
          </form>
      </section>
    </section>
  </div>


<?php
  $appendSubComponentHtml = "<div class='remove1 form-inline'><select class='form-control validate[required]' name='sub_copoment_id[]'><option value=''>-Select Sub-Component-</option>".$subCompOptions."</select><input name='' id='' type='text' class='form-control validate[required] inline_field' placeholder='Enter GPA'><input name='' id='' type='text' class='form-control validate[required] inline_field' placeholder='Enter Description'><select class='form-control validate[required]' name='material_id_s' id='material_id_s'><option value=''>-Select Material-</option>".getDropdown($connection, 'materials', 'id', 'name', array('is_active'=>1), '')."</select><a class='form-control inline_field btn btnprimary' href='./add-edit-subcomponent?id=1' target='_blank'>View</a><a href='#' class='remove-field1 btn-remove-customer1 inline_field' style='color:red;'><i class='fa fa-times'></i></a></div>";

  $appendCoaHtml = "<div class='form-inline single remove2'><input name='coa_sample_file' id='coa_sample_file' class='form-control validate[required]' type='file'  placeholder='CoA' /><div class='export btn-group'><button class='btn btn-primary' aria-label='Export' type='button' title='Export data'> <i class='fa fa-download'></i></button></div><a href='#' class='remove-field2 btn-remove-customer2 inline_field' style='color:red;'><i class='fa fa-times '></i></a></div>";
?>

<script type="text/javascript">
$(document).ready(function() {
    jQuery("#form_product").validationEngine();

});
$('.extra-fields-customer1').click(function() {
  $(".customer_records_dynamic1").append("<?php echo $appendSubComponentHtml; ?>");
});

$('.extra-fields-customer2').click(function() {
  $(".customer_records_dynamic2").append("<?php echo $appendCoaHtml; ?>");
});


$(document).on('click', '.remove-field1', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field2', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});




function checkfile(sender, doctype) {
    var validExts = doctype == "photo" ? new Array(".png", ".jpg", ".jpeg") : new Array(".pdf"); //,".doc",".docx"
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    var FileSize = sender.files[0].size / 1024 / 1024; // in MiB
    if (FileSize > 5) {
        alert('File size exceeds 5 MB');
        $(sender).val('');
        return false;
    } else {
        if (validExts.indexOf(fileExt) < 0) {
        alert("Valid file extensions are " + validExts.toString() + ".");
        $(sender).val('');
        return false;
        } else {
            $('#doc_type').val(doctype);
            return true;
        }
    }
}
</script>


<style type="text/css">
	.inline_field{
		margin-left: 10px;
	}

	.remove1{
		margin-top: 10px;
	}

	.remove2 {
		margin-top: 10px;
	}
	
	.btnprimary{
		color: blue;
	}

	.export{
		margin-left: 10px;
	}
</style>
<?php include('footer.php'); ?>