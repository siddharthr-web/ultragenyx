<?php 
include('header.php');
include ('queries/add-edit-product-query.php');
include('selected_details.php');

// echo "<pre>";
// print_r($_REQUEST);
// exit;


  $dataArray = getAllRecords($connection, 'tbl_sub_component', array('is_active'=>1));
  $isAddEdit = (!isset($_GET['id']) || $subComponentArray->num_rows==0) ? 'add' : 'edit';

  $query = "SELECT * FROM tbl_dcfd";
  $queryResults = selectQuery($connection, $query);

  $query1 = "SELECT * FROM tbl_su_assembly";
  $queryResults1 = selectQuery($connection, $query1);

  // error_reporting(E_ALL);
	// ini_set('display_errors',1);
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> -->
  <style type="text/css">
    @media print {
    body * {
      visibility: hidden;
    }
    #section-to-print, #section-to-print * {
      visibility: visible;
    /*display: none;*/
    }
    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }

  #section-to-print {
      visibility: hidden;
  }

  .remove-field2_edit, .remove-field2{
      margin-left: 10px;
    }

    .remove-field-margin{
      margin-left: 10px;
    }
  </style>


  <style> 

        .selectBox { 
            position: relative; 
        } 
  
        .selectBox select { 
            width: 100%; 
            font-weight: bold; 
        } 
  
        .overSelect { 
            position: absolute; 
            left: 0; 
            right: 0; 
            top: 0; 
            bottom: 0; 
        } 
  
        #checkBoxes { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes1 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes1 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes1 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes2 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes2 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes2 label:hover { 
            background-color: #E2E2E2; 
        }

        #checkBoxes3 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes3 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes3 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes4 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes4 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #E2E2E2; 
        } 

    .card .card-body .customer_records1{
      margin-top: 10px;
    }

    .card .card-body .customer_records1.form-inline label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      font-size: 14px;
    }

    .card .card-body .customer_records1.form-inline label input{
      margin-left: 0px;
    }

    .customer_records{
      margin-top: 10px;
    }

    .card .card-body .customer_records_dynamic1 label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      font-size: 14px;
    }

    .card .card-body .customer_records_dynamic1 label input{
      margin-left: 0px;
    }


    .card .card-body .customer_records2 label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      /*font-size: 14px;*/
    }

    .card .card-body .customer_records2 label input{
      margin-left: 0px;
    }

    .card .card-body .customer_records2_edit label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      /*font-size: 14px;*/
    }

    .card .card-body .customer_records2_edit label input{
      margin-left: 0px;
    }

    .card .card-body .customer_records_dynamic2 label{
      margin-left: 10px;
    }

    .card .card-body .customer_records_dynamic2 label input{
      margin-left: 0px;
    }

  .selectize-input {
    width: 200px !important;
  }

  /*.inline_field{
    margin-left: 10px;
  }*/

  .remove1{
    margin-top: 10px;
  }

  .remove2 {
    margin-top: 10px;
  }

  .remove3 {
    margin-top: 10px;
  }
  
  .remove4 {
    margin-top: 10px;
  }

  .remove5 {
    margin-top: 10px;
  }

  .remove6 {
    margin-top: 10px;
  }

  .leach {
    margin-left: 5px;
  }

  .btnprimary{
    color: blue;
  }

  .export{
    margin-left: 10px;
  }

  .range_field{
    width: 100px !important;
  }

  .other_field{
    width: 250px !important;
  }

  .chem_input {
    width: 280px !important;
  }

  .subcomp-input{
    width: 100px !important;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
  <form class="form" name="form_product" id="form_product" method="POST" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo isset($_GET['id']) ? "SU Assembly - Edit": "SU Assembly - Add"; ?></h3>
			<div class="card-tools">
        <?php if(isset($_REQUEST['id'])){ ?>
            <a href="./print_product.php?id=<?php echo $_REQUEST['id']; ?>&type=assembly" target="_blank" class="btn btn-primary btn-sm">Print</a>
        <?php } ?>
        <a href="./product-management.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
      </div>
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
					<label class="control-label">Internal Part No</label>:
					<input type="text" name="internal_part_no" id="internal_part_no" class="form-control" placeholder="Enter Internal Part No"  value="<?php echo $internal_part_no; ?>">            
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Upload Drawing of Assembly</label>:
					          <input name="drawing_of_assembly" id="drawing_of_assembly" class="form-control" type="file" value="<?php //echo ; ?>" onchange="checkfile(this,'photo');">
					        <?php if(isset($_GET['id']) && $drawing_of_assembly!=""){ ?>
                    	<a  href="./assets/uploads/drawing-assembly/<?php echo $drawing_of_assembly; ?>" target="_blank"><img src="./assets/uploads/drawing-assembly/<?php echo $drawing_of_assembly; ?>" width="30%" height="80" style="margin-top:10px;"></a>
                	<?php } ?>
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Vendor Part No.</label>:
					<input name="vendor_part_no" id="vendor_part_no" class="form-control" type="text" placeholder="Enter Vendor Part No." value="<?php echo $vendor_part_no; ?>">           
				  </div>
				</div>
			  </div>
			 
       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
                <label for="intended_use_description" class="control-label">Intended Use Description:</label>
                <input name="intended_use_description" id="intended_use_description" class="form-control" type="text" value="<?php echo $intended_use_description; ?>"  placeholder="Intended Use Description">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Assembly Type</label>: 
                <select name="type_id" id="type_id" class="form-control">
                  <?php echo $typeDropdown; ?>
                </select>
            </div>
         </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <label class="control-label">Batch Record</label>: 
            <input name="batch_record" id="batch_record" class="form-control" type="text" placeholder="Enter Critical Functional Single Use Part Attributes." value="<?php echo $batch_record; ?>">           
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                  <label for="assembly_drawing" class="control-label">Product Contact?</label>
                  <select name="product_contact" id="product_contact" class="form-control">
                    <option value="1" <?php echo ($product_contact=='1')?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo ($product_contact=='0')?'selected':''; ?>>No</option>
                  </select>
              </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Can be Irradiated? </label>
                  <select name="can_be_irradiated" id="can_be_irradiated" class="form-control">
                    <option value="1" <?php echo ($can_be_irradiated=='1')?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo ($can_be_irradiated=='0')?'selected':''; ?>>No</option>
                  </select>
              </div>
             </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Can be autoclaved? </label>
                    <select name="can_be_autoclaved" id="can_be_autoclaved" class="form-control">
                      <option value="1" <?php echo ($can_be_autoclaved=='1')?'selected':''; ?>>Yes</option>
                      <option value="0" <?php echo ($can_be_autoclaved=='0')?'selected':''; ?>>No</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">DCFD</label>
                    <select name="parent_dcfd" id="parent_dcfd" class="form-control parent_dcfd">
                    <option value="">Select Dcfd</option>
                        <?php
                              while ($rows = $queryResults->fetch_assoc()) 
                              { ?>
                                <option value=<?php echo $rows['id']; ?>  <?=$rows['id'] == $parent_dcfd_id ? ' selected="selected"' : '';?>><?php echo $rows['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">SU number</label>
                    <select name="su_assembly" id="su_assembly" class="form-control su_assembly">
                       
                    </select>
                </div>
            </div>




        </div>

        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Status</label>: 
                <select name="is_active" id="is_active" class="form-control">
                  <option value="Qualified" <?php echo ($is_active=='Qualified')?'selected':''; ?>>Qualified</option>
                  <option value="In Progress" <?php echo ($is_active=='In Progress')?'selected':''; ?>>In Progress</option>
                  <option value="Inactive" <?php echo ($is_active=='Inactive')?'selected':''; ?>>Inactive</option>
                </select>
            </div>
          </div>
        </div>

			</div>
		</div>

		<div class="card">
          <div class="card-header">
            <h3 class="card-title">Details</h3>            
          </div>
          <!-- Bootstrap 3 table -->
            <div class="card-body">
              <div class="row">
        <div class="col-md-6">
        <div class="form-group">




          <label class="control-label">Material</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes('checkBoxes')"> 
                    <select class="form-control"> 
                        <option>
                          <?php 
                          if(isset($selectedMaterialsString))
                          {
                            echo $selectedMaterialsString;
                          
                          }
                          else
                          {
                            echo "Select Material";
                          }
                            ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes"> 
              
                <?php 
                    $i=1; 
                  foreach ($allMaterials as $value) { 
                 ?>
                    <label for="material_<?php echo $i; ?>"> 
                        <input type="checkbox" name="material_id_fk[]" id="material_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $materialIds) ? "checked" : ""; ?>/>
                        <?php echo $value['name']; ?> 
                    </label> 
                 <?php $i++; } ?>
                </div> 

          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
          <label class="control-label">Manufacturer</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes1('checkBoxes1')"> 
                    <select class="form-control"> 
                        <option><?php 
                          if(isset($selectedManufacturersString))
                          { 
                              echo $selectedManufacturersString; 
                          } 
                          else 
                          { 
                            
                            echo "Select Manufacturer";

                          } ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes1"> 
                    <?php 
                        $i=1; 
                      foreach ($allManufacturer as $value) { 
                    ?>
                    <label for="manufacturer_<?php echo $i; ?>"> 
                        <input  class="allmanufacturee" type="checkbox" name="manufacturer_id_fk[]" id="manufacturer_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $manufacturerIds) ? "checked" : ""; ?>/> 
                        <?php echo $value['name']; ?> 
                    </label> 
                 <?php $i++; } ?>
                </div>           
          </div>
        </div>
        </div>

               <div class="row">
        
        <!-- <div class="col-md-6">
          <div class="form-group">
          <label class="control-label">Material</label>: 
          <select class="form-control">
            <option value="0">-Select Material-</option>
            <option value="1" <?php //echo isset($_GET['id']) ? 'selected': ''; ?>>Polymer Type</option>
            <option value="1">MOC (Material of Construction)</option>
          </select>            
          </div>
        </div> -->

        <div class="col-md-6" style="display: none;">
          <div class="form-group">
            <label class="control-label">Product</label>: 
            <div class="selectBox" 
                    onclick="showCheckboxes2('checkBoxes2')"> 
                    <select class="form-control"> 
                        <option><?php
                        if(isset($selectedProductsString))
                        {
                           
                           echo $selectedProductsString;
                        }
                        else
                        {
                          echo "Select Product";
                        }
                        ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
            </div>
            <div id="checkBoxes2"> 
                    <?php 
                        $i=1; 
                      foreach ($allProduct as $value) { 
                    ?>
                    <label for="product_<?php echo $i; ?>"> 
                        <input type="checkbox" name="product_id_fk[]" id="product_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $productIds) ? "checked" : ""; ?>/> 
                        <?php echo $value['name']; ?> 
                    </label> 
                 <?php $i++; } ?>
            </div> 
          </div>
        </div>

        <div class="col-md-6" style="display: none;">
          <div class="form-group">
          <label class="control-label">Process</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes3('checkBoxes3')"> 
                    <select class="form-control"> 
                        <option>
                          <?php 
                            if(isset($selectedProcessesString))
                            {
                              echo $selectedProcessesString;
                            }
                            else
                            {
                              echo "Select Process";
                            }
                            ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes3"> 
                    <?php 
                        $i=1; 
                      foreach ($allProcess as $value) { 
                    ?>
                    <label for="process_<?php echo $i; ?>"> 
                        <input type="checkbox" name="process_id_fk[]" id="process_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $processIds) ? "checked" : ""; ?>/> 
                        <?php echo $value['name']; ?> 
                    </label> 
                 <?php $i++; } ?>
                </div> 


          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6" style="display: none;">
            <div class="form-group">
              <label class="control-label">Equipment</label>: 
              <div class="selectBox" 
                        onclick="showCheckboxes4('checkBoxes4')"> 
                        <select class="form-control"> 
                            <option><?php 
                            if(isset($selectedEquipmentsString))
                            {
                              echo $selectedEquipmentsString;
                              
                            }
                            else
                            {
                              echo "Select Equipment"; 
                            }  ?></option> 
                        </select> 
                        <div class="overSelect"></div> 
                    </div>
                <div id="checkBoxes4"> 
                        <?php 
                            $i=1; 
                          foreach ($allEquipment as $value) { 
                        ?>
                        <label for="equipment_<?php echo $i; ?>"> 
                            <input type="checkbox" name="equipment_id_fk[]" id="equipment_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $equipmentIds) ? "checked" : ""; ?>/> 
                            <?php echo $value['name']; ?> 
                        </label> 
                    <?php $i++; } ?>
                    </div>            
            </div>
          </div>

        <div class="col-md-6">
           
        </div>

        </div>



      <div class="row">
        <!-- <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Leachable/Extractables Data</label>: 
                      <input class="form-control" type="text"  placeholder="Leachable/Extractables Data"  value="<?php //echo isset($_GET['id']) ? 'Waste Tubing': ''; ?>"/>
                  </div>
              </div> -->

         <!-- <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label">Validation</label>: 
                      <input class="form-control" type="text"  placeholder="Validation"  value="<?php //echo isset($_GET['id']) ? 'Passed': ''; ?>"/>
                  </div>
              </div> -->
      </div>

            </div>
            <!-- /.card-body -->  
        </div>







        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data</h3>            
          </div>
          <!-- Bootstrap 3 table -->

          <!-- ---------------------------- -->



      <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <!-- <label class="control-label">Sub Component</label>:  -->
              <?php if($id!="" && mysqli_num_rows($coaSampleArray)!=0){  
                    $i=0;
                     while ($coaVal = $coaSampleArray->fetch_assoc()) { 
                            $coaId = $coaVal["id"];
                            $coaFileName = $coaVal["coa_sample_file"];
                            $coaOtherLocation = $coaVal["other_location"];
                            $coaDataId = $coaVal["data_id_fk"];
                    ?>

              <div class="customer_records2_edit form-inline" style="margin-top: 5px;">
                <label> <?php echo ($i==0) ? "<span>File</span>" : ""; ?>
              <input type="" class="form-control" name="saved_coa[]" id="saved_coa_<?php echo $coaId; ?>" value="<?php echo $coaFileName; ?>" readonly />
              </label>
                <label> <?php echo ($i==0) ? "<span>Other Location</span>" : ""; ?>
              <input type="text" class="form-control inline_field" name="saved_other_location[]" id="saved_other_location_<?php echo $coaId; ?>" placeholder="Other Location" value="<?php echo $coaOtherLocation; ?>">
              </label>
                <label> <?php echo ($i==0) ? "<span>Data</span>" : ""; ?> 
                  <select name="saved_data_id_fk[]" id="saved_data_id_fk_<?php echo $coaId; ?>" class="form-control leach">
                        <?php echo getDropdown($connection, 'data', 'id', 'name', array('is_active'=>1), $coaDataId); ?>
                  </select>
              </label>
              <div class="export btn-group">
                    <a href="<?php echo SITE_URL.'assets/uploads/coa-sample-assembly/'.$coaFileName; ?>" class="btn btn-primary" aria-label="Export" type="button" title="Export data" download><i class="fa fa-download"></i></a>
              </div>
                    
              <a href="#" class="remove-field2_edit btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
                    <!-- <br> -->
              </div>

          
          <?php  
               $i++;
                } 
               }  
          ?> 
        </div>
        </div>





    <div class="row">
        <div class="col-md-12">
             <!-- <label class="control-label">Sub Component</label>:  -->
            <div class="customer_records2 form-inline">
              <label><span>File</span>
              <input name="coa_sample_file[]" id="coa_sample_file" class="form-control" type="file"  placeholder="CoA" onchange="checkfile(this,'coa');" />
              </label>
              <label><span>Other Location</span>
              <input name="other_location[]" id="other_location" type="text" class="form-control inline_field" placeholder="Other Location">
              </label>
              <label><span>Data</span>
              <select name="data_id_fk[]" id="data_id_fk" class="form-control leach">
                 <?php echo $dataDropdown; ?>
              </select>
              </label>
              <!-- <div class="export btn-group">
                    <button class="btn btn-primary" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></button>
              </div> -->
                  
                  <!-- <br> -->
            </div>

            <div class="customer_records_dynamic2"></div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <a class="btn btn-primary extra-fields-customer2 float-right" style="color:white;     margin-top: -40px; margin-right: 25px;"><i class="fa fa-plus"></i></a>
      </div>
    </div>
    
  </div>


            <!-- --------------------------------------- -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">pH Range</h3>
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
          <div class="row">
              <div class="col-md-4">
                <label class="control-label">pH Min </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="ph_min" id="ph_min" placeholder="pH Min"  value="<?php echo $ph_min; ?>" min="0" onchange="compareRange('ph_min', 'ph_max', 'pH')">
                  <div id="ph_min_msg" class="error_message" style="color: red;"></div>
              </div>
              <div class="col-md-4">
                <label class="control-label">pH Max </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="ph_max" id="ph_max" placeholder="pH Max"  value="<?php echo $ph_max; ?>" min="0" onchange="compareRange('ph_min', 'ph_max', 'pH')">
                  <div id="ph_max_msg" class="error_message" style="color: red;"></div>
              </div>
          </div>
      </div>


      <!-- /.card-body -->
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Temperature Range (&deg;C)</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
         <div class="row">
              <div class="col-md-4">
                <label class="control-label">Temperature Min </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="temp_min"  id="temp_min" placeholder="Temperature Min" value="<?php echo $temp_min; ?>" onchange="compareRange('temp_min', 'temp_max', 'Temperature')">
                  <div id="temp_min_msg" class="error_message" style="color: red;"></div>
              </div>
              <div class="col-md-4">
                <label class="control-label">Temperature Max </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="temp_max"  id="temp_max" placeholder="Temperature Max" value="<?php echo $temp_max; ?>" onchange="compareRange('temp_min', 'temp_max', 'Temperature')">
                  <div id="temp_max_msg" class="error_message" style="color: red;"></div>
              </div>
          </div>
      </div>
      <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pressure Range (psig)</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
      <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Pressure Min </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="pressure_min" id="pressure_min" min="0" placeholder="Pressure Min" value="<?php echo $pressure_min; ?>" onchange="compareRange('pressure_min', 'pressure_max', 'Pressure')">
                  <div id="pressure_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Pressure Max </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="pressure_max" id="pressure_max" min="0" placeholder="Pressure Max" value="<?php echo $pressure_max; ?>" onchange="compareRange('pressure_min', 'pressure_max', 'Pressure')">
                  <div id="pressure_max_msg" class="error_message" style="color: red;"></div>
                </div>
          </div>
      </div>
      <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Flow Rate Range (lpm)</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
      <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Flow Rate Min </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="flow_rate_min" id="flow_rate_min" min="0" placeholder="Flow Rate Min" value="<?php echo $flow_rate_min; ?>" onchange="compareRange('flow_rate_min', 'flow_rate_max', 'Flow Rate')">
                    <div id="flow_rate_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Flow Rate Max </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="flow_rate_max" id="flow_rate_max" min="0" placeholder="Flow Rate Max" value="<?php echo $flow_rate_max; ?>" onchange="compareRange('flow_rate_min', 'flow_rate_max', 'Flow Rate')">
                    <div id="flow_rate_max_msg" class="error_message" style="color: red;"></div>
                </div>
          </div>
      </div>
      <!-- /.card-body -->
  </div>


  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Volume Range (L)</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
      <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Volume Min </label>: 
                    <input type="number" name="volume_min" id="volume_min" class="form-control inline_field chem_input" min="0" placeholder="Volume Min" value="<?php echo $volume_min; ?>" onchange="compareRange('volume_min', 'volume_max', 'Volume')">
                    <div id="volume_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Volume Max </label>: 
                    <input type="number" name="volume_max" id="volume_max" class="form-control inline_field chem_input" name="" min="0" placeholder="Volume Max" value="<?php echo $volume_max; ?>" onchange="compareRange('volume_min', 'volume_max', 'Volume')">
                    <div id="volume_max_msg" class="error_message" style="color: red;"></div>
                </div>
          </div>
      </div>
      <!-- /.card-body -->
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Chemical Exposure:</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
          <div class="row">
            <textarea cols="150" rows="5" name="chemical_exposure" id="chemical_exposure"><?php echo $chemical_exposure; ?></textarea>
        </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Other Details:</h3>            
    </div>
    <!-- Bootstrap 3 table -->
      <div class="card-body">
          <div class="row">
            <textarea name="other_details" id="other_details" cols="150" rows="5"><?php echo $other_details; ?></textarea>
        </div>
    </div>
  </div>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sub Component</h3>            
      </div>
      <!-- Bootstrap 3 table -->

        <div class="card-body sub-component-div">
            <div class="row">
                <div class="col-md-12">
			<!-- <label class="control-label">Sub Component</label>:  -->
      <?php if($isAddEdit=='add') { ?>
					<div class="customer_records1 form-inline">
                <label>
                  <span>Sub Component</span>
                    <select  name='sub_component_id[]' id="subcomp" class="form-control" placeholder="Select Sub Component" onchange="setSubCompDetails('', this.value)">
                        <option value=""></option>
                        <?php echo $subComponentDropdown; ?>
                    </select> 
                </label>
              <!-- <label>
                <span>Material</span>
                      <input type="text" class="form-control inline_field subcomp-input" name="material" id="material" placeholder="Material">
                  </label> -->
                <label>
                  <span>pH Range</span>
                  <input type="text" class="form-control inline_field subcomp-input" name="ph_range" id="ph_range" placeholder="pH Range" readonly>
                 </label>
                <label>
                  <span>Temp Range</span>
                  <input type="text" class="form-control inline_field subcomp-input" name="temp_range" id="temp_range" placeholder="Temp Range" readonly>
                 </label>
                <label>
                   <span>Pressure Range</span>
                      <input type="text" class="form-control inline_field subcomp-input" name="pressure_range" id="pressure_range" placeholder="Pressure Range" readonly>
                     </label>
                <label>
                   <span>Volume Range</span>
                      <input type="text" class="form-control inline_field subcomp-input" name="volume_range" id="volume_range" placeholder="Volume Range" readonly>
                     </label>
                <label>
                  <span>Flow Rate Range</span>
                    <input type="text" class="form-control inline_field subcomp-input" name="flow_rate_range" id="flow_rate_range" placeholder="Flow Rate Range" readonly>
                 </label>
                 <label>
                   <span>Type</span>
                    <input type="text" class="form-control inline_field subcomp-input" name="type" id="type" placeholder="Type" readonly>
                 </label>
                  <!-- <a class="form-control btn btnprimary" href="./add-edit-subcomponent.php?id=1" target="_blank">View</a> -->
				        
			          <!-- <br> -->
				  </div>
        <?php } ?>
				<div class="customer_records_dynamic1">
            <?php
            $i=1;


  //           foreach ($result as $value) {
  //   array_push($resultArray, $value[$selectFiled]);
  // }
  
      foreach ($subComponentArray as $value) { 
        if($isAddEdit=='edit' && $i==1) { 
          $labelSubComponent = '<span>Sub Component</span>';
          $labelPhRange = '<span>pH Range</span>';
          $labelTempRange = '<span>Temp Range</span>';
          $labelPressureRange = '<span>Pressure Range</span>';
          $labelVolumeRange = '<span>Volume Range</span>';
          $labelFlowRateRange = '<span>Flow Rate Range</span>';
          $labelType = '<span>Type</span>';
         }else{
          $labelSubComponent = $labelPhRange = $labelTempRange = $labelPressureRange = $labelVolumeRange = $labelFlowRateRange = $labelType = '';
         }
        ?>
          <div class="customer_records form-inline form-inline single remove1">
                <label>
                  <?php echo $labelSubComponent; ?>
                  <select id="subcomp_edit_<?php echo $i; ?>"  class="form-control" placeholder="Select Sub Component" onchange="setSubCompDetails('_edit_<?php echo $i; ?>', this.value)" disabled>
                      <option value=""></option>
                      <?php echo getDropdown($connection, 'tbl_sub_component', 'id', 'sub_copoment_name', array('is_active!'=>"Inactive"), $value['sub_component_id_fk']); ?>
                  </select> 
                  <input type="hidden" name="sub_component_id[]" value="<?php echo $value['sub_component_id_fk']; ?>">
              </label>
              <!-- <label>
                      <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Material" id="material_edit_<?php echo $i; ?>">
                </label> -->
                <label>
                  <?php echo $labelPhRange; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="pH Range" id="ph_range_edit_<?php echo $i; ?>" value="<?php echo $value['ph_min'].'-'.$value['ph_max']; ?>" readonly>
                 </label>
                <label>
                  <?php echo $labelTempRange; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Temp Range" id="temp_range_edit_<?php echo $i; ?>" value="<?php echo $value['temp_min'].'-'.$value['temp_max']; ?>" readonly>
                 </label>
                  <label>
                  <?php echo $labelPressureRange; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Pressure Range" id="pressure_range_edit_<?php echo $i; ?>" value="<?php echo $value['pressure_min'].'-'.$value['pressure_max']; ?>" readonly>
                 </label>
                 <label>
                  <?php echo $labelVolumeRange; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Volume Range" id="volume_range_edit_<?php echo $i; ?>" value="<?php echo $value['volume_min'].'-'.$value['volume_max']; ?>" readonly>
                 </label>
                 <label>
                  <?php echo $labelFlowRateRange; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Flow Rate Range" id="flow_rate_range_edit_<?php echo $i; ?>" value="<?php echo $value['flow_rate_min'].'-'.$value['flow_rate_max']; ?>" readonly>
                 </label>
                 <label>
                  <?php echo $labelType; ?>
                  <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Type" id="type_edit_<?php echo $i; ?>" value="<?php echo $value['type']; ?>" readonly>
                 </label>
                  <a class="form-control btn btnprimary" href="./add-edit-subcomponent.php?id=<?php echo $value['sub_component_id_fk']; ?>" target="_blank" style="margin-top:16px;">View</a>
                  
                  <a href="#" class="remove-field1 btn-remove-customer1 inline_field" style="color:red; margin-top:17px;"><i class="fa fa-times "></i></a>
                <!-- <br> -->
          </div>
          <?php 
              $i++; 
            } ?>      
          </div>
		    </div>
          </div>
          <div class="row">
            <div class="col-md-12">
        		<a class="btn btn-primary extra-fields-customer1 float-right" style="color:white;     margin-top: -40px; margin-right: 25px;"><i class="fa fa-plus"></i></a>
        	</div>
    	</div>
    </div>
        <!-- /.card-body -->

        <div class="card-footer">

          <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
          <?php } ?>

          <a class="btn btn-default white mr-0" href="./product-management.php"><i class="ft ft-x-circle"></i> Cancel</a>
          <div id="submit_msg" style="color:red;"></div>
        </div>    
    </div>
          </form>
      </section>
    </section>
  </div>


<script type="text/javascript">
$(document).ready(function() 
{
      var dcfd_id = "<?php echo $parent_dcfd_id; ?>";
      var su_assembly_id = "<?php echo $su_assembly_id; ?>";
   

       $.ajax({
            url:"insert-update.php",  
            type: "post", 
            data: {dcfd_id: dcfd_id,su_assembly_id : su_assembly_id, type: "onchange_dcfd"},
            success:function(result)
            {
                $(".su_assembly").html("");
                $(".su_assembly").html(result);
            }
        });


    $(document).on("change",".parent_dcfd",function(){
         var dcfd_id = $(this).val();
         $.ajax({
            url:"insert-update.php",  
            type: "post", 
            data: {dcfd_id: dcfd_id, type: "onchange_dcfd"},
            success:function(result)
            {
                $(".su_assembly").html("");
                $(".su_assembly").html(result);
            }
        });
    });


    $(".error_message").css("display", "none");
    jQuery("#form_product").validationEngine();
    <?php
          if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
              echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
              unset($_SESSION['toast_list']);
          }
      ?>
      
     var incr = (function () {
        var i = $('#customer_records_dynamic1 .remove1').length;
        return function () {
            return i++;
    }
    })();

    var incr2 = (function () {
        var i = $('#customer_records_dynamic2 .remove2').length;
        return function () {
            return i++;
    }
    })();



  var arrayFromPHP = "<?php if(isset($subComponentDropdownArray)){ echo json_encode($subComponentDropdownArray);} ?>";
  let subComponentDropdown = "<option value=''></option>";
  let oldVal = [];

  $('.sub-component-div select > option:selected').each(function() {
      $(this).val() && oldVal.push($(this).val());
  });

  if(arrayFromPHP!="")
  {
    const filterArrayFromPHP = arrayFromPHP.filter(subComp => {
          return oldVal.indexOf(subComp.id) > -1 ? false : true;
    });
  
    for (const [key, value] of Object.entries(filterArrayFromPHP)) {
      subComponentDropdown += "<option value='"+value.id+"'>"+value.name+"</option>";
    }

    $("#subcomp").html(subComponentDropdown)
  }

//   $('.extra-fields-customer1').click(function() {
//   var cnt = incr();
//   $(".customer_records_dynamic1").append("<div class='remove1 form-inline'><select class='form-control' name='sub_component_id_array[]' id='sub_component_id_array"+cnt+"' onchange='setSubCompDetails("+cnt+", this.value, this.value)'><option value=''>-Select Sub-Component-</option><?php //echo $subCompOptions; ?></select><input id='gpa"+cnt+"' type='text' class='form-control inline_field' placeholder='GPA'><input id='description"+cnt+"' type='text' class='form-control inline_field' placeholder='Description'><input id='material"+cnt+"' type='text' class='form-control inline_field' placeholder='Material' value='' disabled><a class='form-control inline_field btn btnprimary' href='./add-edit-subcomponent?id=1' target='_blank'>View</a><a href='#' class='remove-field1 btn-remove-customer1 inline_field' style='color:red;'><i class='fa fa-times'></i></a></div>");
// });

// $('.extra-fields-customer2').click(function() {
//   var cnt2 = incr2();
//   $(".customer_records_dynamic2").append("<div class='form-inline single remove2'><input name='coa_sample_file[]' id='coa_sample_file"+cnt2+"' class='form-control' type='file'  placeholder='CoA'  onchange='checkfile(this);' /><a href='#' class='remove-field2 btn-remove-customer2 inline_field' style='color:red;'><i class='fa fa-times '></i></a></div>");
// });

    // $('#subcomp').selectize({
    //     sortField: 'text'
    // });
});



  function compareRange(first, second,label) {
    var firstInput = parseFloat($("#"+first).val());
    var secondInput = parseFloat($("#"+second).val());
    $("#submit").attr('disabled',false);
    $("#submit_msg").html("");

   if (firstInput > secondInput) {
        $("#"+first+"_msg").css("display", "block").html(label+" min should be less than "+label+" max");
        $("#"+second+"_msg").css("display", "block").html(label+" max should be greater than "+label+" min");
    }else{
        $("#"+first+"_msg").css("display", "none").html("");
        $("#"+second+"_msg").css("display", "none").html("");
    }

    $( ".error_message" ).each(function() {
      if ($(this).is(":visible")) {
        $("#submit").attr('disabled',true);
        $("#submit_msg").html("Please enter valid data.");
      }
    });
  }

$(document).on('click', '.remove-field1', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field2', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field2_edit', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});




function checkfile(sender, doctype="") {
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
        alert("Valid file extensions are " + validExts.toString());
        $(sender).val('');
        return false;
        } else {
            $('#doc_type').val(doctype);
            return true;
        }
    }
}


function isNumeric (e) {  // Accept only alpha numerics, no special characters 
    var regex = new RegExp("^[0-9 ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
}


function isDecimal(evt, element){
    var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
    return false;
  else {
    var len = $(element).val().length;
    var index = $(element).val().indexOf('.');
    if (index > 0 && charCode == 46) {
      return false;
    }
    if (index > 0) {
      var CharAfterdot = (len + 1) - index;
      if (CharAfterdot > 3) {
        return false;
      }
    }

  }
  return true;
}

function setSubCompDetails (id_concat, subCompId) {
  // alert("concat id "+id_concat+" --- Subcomp ID "+subCompId)
  if(subCompId===""){
    $("#ph_range"+id_concat).val("");
    $("#pressure_range"+id_concat).val("");
    $("#volume_range"+id_concat).val("");
    $("#flow_rate_range"+id_concat).val("");
    $("#type"+id_concat).val("");
  }
  $.ajax({
    url: "./ajax_data.php",
    type: "post",
    dataType: "json",
    async: false,
    data: { 
         sub_comp_id : subCompId,
         type : 'get_subcomponent_by_id'
       },
    success: function (response) {
      $("#ph_range"+id_concat).val(response.ph_min+"-"+response.ph_max);
      $("#temp_range"+id_concat).val(response.temp_min+"-"+response.temp_max);
      $("#pressure_range"+id_concat).val(response.pressure_min+"-"+response.pressure_max);
      $("#volume_range"+id_concat).val(response.volume_min+"-"+response.volume_max);
      $("#flow_rate_range"+id_concat).val(response.flow_rate_min+"-"+response.flow_rate_max);
      $("#type"+id_concat).val(response.type);
    }
  });


}

</script>
<script type="text/javascript">
//   $('.extra-fields-customer').click(function() {
//   $('.customer_records').clone().appendTo('.customer_records_dynamic');
//   $('.customer_records_dynamic .customer_records').addClass('single remove');
  
//   $('.single .row').append('<div class="col-md-3"><a href="#" class="remove-field btn-remove-customer"><i class="fa fa-times "></i></a></div>');
//   $('.customer_records_dynamic > .single').attr("class", "remove");

//   $('.customer_records_dynamic input').each(function() {
//     var count = 0;
//     var fieldId = $(this).attr("id");
//     $(this).attr('id', fieldId + count);
//     count++;
//   });

// });

// $(document).on('click', '.remove-field', function(e) {
//   $(this).parent().parent().parent('.remove').remove();
//   e.preventDefault();
// });


// ----------------------

$('.extra-fields-customer1').click(function() {
  // $('.customer_records1').clone()
  var arrayFromPHP = "<?php if(isset($subComponentDropdown)){ echo $subComponentDropdown; } ?>";

  // console.log("55555555",arrayFromPHP);
  
  var subComponentDropdown = "";
  let oldVal = [];

  $('.sub-component-div select > option:selected').each(function() {
      $(this).val() && oldVal.push($(this).val());
  });

  if(arrayFromPHP!="")
  {
      // const filterArrayFromPHP = arrayFromPHP.filter(subComp => {
      //       return oldVal.indexOf(subComp.id) > -1 ? false : true;
      // });

      // for (const [key, value] of Object.entries(filterArrayFromPHP)) {
      //   subComponentDropdown += "<option value='"+value.id+"'>"+value.name+"</option>";
      // }

      subComponentDropdown = arrayFromPHP;


  }


  let count = $(".customer_records_dynamic1").children().length+1;
  let selectId = "_"+count;
  var html = "<div class='remove1 form-inline'><label><select name='sub_component_id[]' id='subcomp_"+count+"' class='form-control' placeholder='Select Sub Component' onchange='setSubCompDetails(\""+selectId+"\", this.value)'><option value=''></option>"+subComponentDropdown+"</select></label><label><input type='text' readonly class='form-control inline_field subcomp-input' name='' placeholder='pH Range' id='ph_range_"+count+"'></label><label><input type='text' class='form-control inline_field subcomp-input' name='' readonly placeholder='Temp Range' id='temp_range_"+count+"'></label><label><input type='text' readonly class='form-control inline_field subcomp-input' name='' placeholder='Pressure Range' id='pressure_range_"+count+"'></label><label><input type='text' class='form-control inline_field subcomp-input' readonly name='' placeholder='Volume Range' id='volume_range_"+count+"'></label><label><input type='text' readonly class='form-control inline_field subcomp-input' name='' placeholder='Flow Rate Range' id='flow_rate_range_"+count+"'></label><label><input type='text' class='form-control inline_field subcomp-input' readonly name='' placeholder='Type' id='type_"+count+"'></label><a href='#' class='remove-field1 remove-field-margin btn-remove-customer1 inline_field' style='color:red;'><i class='fa fa-times '></i></a></div>";
  // <a class='form-control btn btnprimary' href='./add-edit-subcomponent.php?id=1' target='_blank'>View</a>
  $(html).appendTo('.customer_records_dynamic1');
  $('.customer_records_dynamic1 .customer_records1').addClass('form-inline single remove1').append('<a href="#" class="remove-field1 btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  $('.customer_records_dynamic1 .customer_records1 span').remove();
  
  // $('.single .row')
  $('.customer_records_dynamic1 > .single').attr("class", "remove1 form-inline");

  // each(function() {
  //   var count = parseInt(1);
  //   count++;
  // });

});

// $('.extra-fields-customer2').click(function() {
//   $('.customer_records2').clone().appendTo('.customer_records_dynamic2');
//   $('.customer_records_dynamic2 .customer_records2').addClass('form-inline single remove2').append('<a href="#" class="remove-field2 btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
//   $('.customer_records_dynamic2 .customer_records2 span').remove();
  
//   // $('.single .row')
//   $('.customer_records_dynamic2 > .single').attr("class", "remove2 form-inline");

//   $('.customer_records_dynamic2 input').each(function() {
//     var count = 0;
//     var fieldId = $(this).attr("id");
//     $(this).attr('id', fieldId + count);
//     count++;
//   });
// });








$('.extra-fields-customer2').click(function() {
  // $('.customer_records2').clone().appendTo('.customer_records_dynamic2');
  // $('.customer_records_dynamic2 .customer_records2').addClass('form-inline single remove2').append('<a href="#" class="remove-field2 btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  let count = $(".customer_records_dynamic2").children().length+1;
  
  var html = "<div class='remove2 form-inline'><label><input name='coa_sample_file[]' id='coa_sample_file_"+count+"' class='form-control' type='file' placeholder='CoA' onchange='checkfile(this,'coa');'></label><label><input name='other_location[]' id='other_location_"+count+"' type='text' class='form-control inline_field' placeholder='Other Location'></label><label><select name='data_id_fk[]' id='data_id_fk_"+count+"' class='form-control leach'><?php echo $dataDropdown; ?></select></label><a href='#' class='remove-field2 btn-remove-customer2 inline_field' style='color:red;'><i class='fa fa-times '></i></a></div>";
  $(html).appendTo('.customer_records_dynamic2');
  

  $('.customer_records_dynamic2 .customer_records2 span').remove();
  
  // $('.single .row')
  $('.customer_records_dynamic2 > .single').attr("class", "remove2 form-inline");


  // $('.customer_records_dynamic2 input').each(function() {
  //   var count = parseInt(0);
  //   var fieldId = $(this).attr("id");
  //   $(this).attr('id', fieldId + count);
  //   alert(count);
  //   count++;
  // });
});





$('.extra-fields-customer3').click(function() {
  $('.customer_records3').clone().appendTo('.customer_records_dynamic3');
  $('.customer_records_dynamic3 .customer_records3').addClass('form-inline single remove3').append('<a href="#" class="remove-field3 btn-remove-customer3 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  // $('.single .row')
  $('.customer_records_dynamic3 > .single').attr("class", "remove3 form-inline");

  $('.customer_records_dynamic3 input').each(function() {
    var count = 0;
    var fieldId = $(this).attr("id");
    $(this).attr('id', fieldId + count);
    count++;
  });

});

$('.extra-fields-customer4').click(function() {
  $('.customer_records4').clone().appendTo('.customer_records_dynamic4');
  $('.customer_records_dynamic4 .customer_records4').addClass('form-inline single remove4').append('<a href="#" class="remove-field4 btn-remove-customer4 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  // $('.single .row')
  $('.customer_records_dynamic4 > .single').attr("class", "remove4 form-inline");

  $('.customer_records_dynamic4 input').each(function() {
    var count = 0;
    var fieldId = $(this).attr("id");
    $(this).attr('id', fieldId + count);
    count++;
  });

});


$('.extra-fields-customer5').click(function() {
  $('.customer_records5').clone().appendTo('.customer_records_dynamic5');
  $('.customer_records_dynamic5 .customer_records5').addClass('form-inline single remove5').append('<a href="#" class="remove-field5 btn-remove-customer5 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  // $('.single .row')
  $('.customer_records_dynamic5 > .single').attr("class", "remove5 form-inline");

  $('.customer_records_dynamic5 input').each(function() {
    var count = 0;
    var fieldId = $(this).attr("id");
    $(this).attr('id', fieldId + count);
    count++;
  });

});


$('.extra-fields-customer6').click(function() {
  $('.customer_records6').clone().appendTo('.customer_records_dynamic6');
  $('.customer_records_dynamic6 .customer_records6').addClass('form-inline single remove6').append('<a href="#" class="remove-field6 btn-remove-customer6 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  // $('.single .row')
  $('.customer_records_dynamic6 > .single').attr("class", "remove6 form-inline");

  $('.customer_records_dynamic6 input').each(function() {
    var count = 0;
    var fieldId = $(this).attr("id");
    $(this).attr('id', fieldId + count);
    count++;
  });

});


$(document).on('click', '.remove-field1', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field2', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field3', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});

$(document).on('click', '.remove-field4', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});

$(document).on('click', '.remove-field5', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});


$(document).on('click', '.remove-field6', function(e) {
  $(this).parent().remove();
  e.preventDefault();
});

</script>

  <!-- Content Wrapper. Contains page content -->
    
    <script> 
        var show = true; 
  
        function showCheckboxes(id) { 
            var checkboxes =  
                document.getElementById(id); 
  
            if (show) { 
                checkboxes.style.display = "block"; 
                show = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show = true; 
            } 
        } 


        var show1 = true; 
  
        function showCheckboxes1(id) 
        { 
            var checkboxes =  
                document.getElementById(id); 
  
            if (show1) { 
                checkboxes.style.display = "block"; 
                show1 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show1 = true; 
            }
        }
        
        $(document).on("click",'.allmanufacturee',function()
        {
            var $box = $(this);
            if ($box.is(":checked")) 
            {
              var group = "input:checkbox[name='" + $box.attr("name") + "']";
              $(group).prop("checked", false);
              $box.prop("checked", true);
            }
            else 
            {
              $box.prop("checked", false);
            }
        });





        var show2 = true; 
  
        function showCheckboxes2(id) { 
            var checkboxes =  
                document.getElementById(id); 
  
            if (show2) { 
                checkboxes.style.display = "block"; 
                show2 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show2 = true; 
            } 
        } 


        var show3 = true; 
  
        function showCheckboxes3(id) { 
            var checkboxes =  
                document.getElementById(id); 
  
            if (show3) { 
                checkboxes.style.display = "block"; 
                show3 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show3 = true; 
            } 
        }

        var show4 = true; 
  
        function showCheckboxes4(id) { 
            var checkboxes = document.getElementById(id); 
  
            if (show4) { 
                checkboxes.style.display = "block"; 
                show4 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show4 = true; 
            } 
        } 
    </script> 
<?php include('footer.php'); ?>