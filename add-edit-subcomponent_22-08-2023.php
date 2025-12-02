<?php 
include('header.php');
include ('queries/add-edit-subcomponent-query.php');
include('selected_details.php');

$disabled = (isset($_SESSION['LOGIN']['user_id']) && !empty($_SESSION['LOGIN']['user_id'])) ? "" : "disabled";
?>
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

    #checkBoxes3 { 
        display: none; 
        border: 1px #DEDEDE solid; 
    } 

    #checkBoxes3 label { 
        display: block; 
        margin-left: 5px;
    } 

    #checkBoxes3 label:hover { 
        background-color: #E2E2E2; 
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


    .card .card-body .customer_records_dynamic2 label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      /*font-size: 14px;*/
    }

    .card .card-body .customer_records_dynamic2 label input{
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


    </style> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
    <form class="form" name="form_sub_comp" id="form_sub_comp" method="POST" action="<?php echo $formAction; ?>" enctype="multipart/form-data">
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo isset($_GET['id']) ? "Sub Component - Edit": "Sub Component - Add"; ?></h3>
			<div class="card-tools">
      <?php if(isset($_REQUEST['id'])){ ?>
        <a href="./print_sub_component.php?id=<?php echo $_REQUEST['id']; ?>" target="_blank" class="btn btn-primary btn-sm">Print</a>
      <?php } ?>
        <a href="./sub-components.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
      </div>
		  </div>
			<div class="card-body">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Sub Component Name</label>: <span class="requireClass">*</span>
                    <input name="sub_copoment_name" id="sub_copoment_name" class=" form-control validate[required]" type="text" placeholder="Enter Sub Component Name"  value="<?php echo $sub_copoment_name; ?>" <?php echo $disabled; ?> />            
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Internal Part No</label>: 
                    <input name="internal_part_no" id="internal_part_no" class=" form-control" type="text"  placeholder="Enter Internal Part No"   value="<?php echo $internal_part_no; ?>" />            
                  </div>
                </div> -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Vendor Part No.</label>: 
                    <input name="vendor_part_no" id="vendor_part_no" class=" form-control" type="text" placeholder="Enter Vendor Part No." value="<?php echo $vendor_part_no; ?>" <?php echo $disabled; ?>>           
                  </div>
                </div>
              </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Drawing of Sub-Component</label>:
					<input name="drawing_of_sub_component" id="drawing_of_sub_component" class="fordrawing_of_sub_componentm-control" type="file" onchange="checkfile(this,'photo');" <?php echo $disabled; ?> /> 
                        <?php if(isset($_GET['id']) && $drawing_of_sub_component!=""){ ?>
                            <a href="./assets/uploads/drawing-sub-component/<?php echo $drawing_of_sub_component; ?>" target="_blank">
                                <img style="margin-top:10px;" src="./assets/uploads/drawing-sub-component/<?php echo $drawing_of_sub_component; ?>" height="80"></a>
                        <?php } ?>          
				  </div>
				</div>				
			  </div>
        <div class="row">
          
          <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">SubComponent Type</label>: 
                  <select name="type_id" id="type_id" class="form-control" <?php echo $disabled; ?>>
                    <?php echo $typeDropdown; ?>
                  </select>
              </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
                  <label for="assembly_drawing" class="control-label">Product Contact?</label>
                  <select name="product_contact" id="product_contact" class="form-control" <?php echo $disabled; ?>>
                    <option value="1" <?php echo ($product_contact=='1')?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo ($product_contact=='0')?'selected':''; ?>>No</option>
                  </select>
              </div>
          </div>
        </div>
			  
        <div class="row">
          <!-- <div class="col-md-6">
            <div class="form-group">
                  <label for="assembly_drawing" class="control-label">Intended Use Description:</label>
                  <input name="intended_use_description" id="intended_use_description" class="form-control" type="text" placeholder="Intended Use Description" value="<?php echo $intended_use_description; ?>">
              </div>
          </div> -->
          <!-- <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Batch Record</label>: 
              <input name="batch_record" id="batch_record" class="form-control" type="text" placeholder="Enter Critical Functional Single Use Part Attributes." value="<?php echo isset($_GET['id']) ? '01-00576': ''; ?>">           
            </div>
          </div> -->          
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Can be Irradiated? </label>
                <!-- <input class="form-control" type="text"  placeholder="Can be can_be_irradiated?" /> --><?php //echo $can_be_irradiated; ?>
                <select name="can_be_irradiated" id="can_be_irradiated" class="form-control" <?php echo $disabled; ?>>
                  <option value="1" <?php echo ($can_be_irradiated=='1')?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo ($can_be_irradiated=='0')?'selected':''; ?>>No</option>
                </select>
            </div>
           </div>
           <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Can be autoclaved? </label> 
                <select name="can_be_autoclaved" id="can_be_autoclaved" class="form-control" <?php echo $disabled; ?>>
                  <option value="1" <?php echo ($can_be_autoclaved=='1')?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo ($can_be_autoclaved=='0')?'selected':''; ?>>No</option>
                </select>
              </div>
           </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Status</label>: 
                <select name="is_active" id="is_active" class="form-control" <?php echo $disabled; ?>>
                  <option value="Qualified" <?php echo ($is_active=='Qualified')?'selected':''; ?>>Qualified</option>
                  <option value="In Progress" <?php echo ($is_active=='In Progress')?'selected':''; ?>>In Progress</option>
                  <option value="Inactive" <?php echo ($is_active=='Inactive')?'selected':''; ?>>Inactive</option>
                </select>
            </div>
          </div>
          </div>
			</div>
			<!-- /.card-body -->
			<!-- <div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
			  <a class="btn btn-default white mr-0" href="./sub-components.php"><i class="ft ft-x-circle"></i> Cancel</a> 
			</div>   -->  
		</div>


    <div class="card">
          <div class="card-header">
            <h3 class="card-title">Details</h3>            
          </div>
          <!-- Bootstrap 3 table -->
            <div class="card-body">
              <div class="row">
        <!-- <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Material</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes('checkBoxes')"> 
                    <select class="form-control"> 
                        <option><?php //echo ($selectedMaterialsString=="") ? "Select Material" : $selectedMaterialsString; ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes"> 
                    <?php 
                      //   $i=1; 
                      // foreach ($allMaterials as $value) { 
                    ?>
                    <label for="material_<?php //echo $i; ?>"> 
                        <input type="checkbox" name="material_id_fk[]" id="material_<?php //echo $i; ?>" value="<?php //echo $value['id']; ?>" <?php //echo in_array($value['id'], $materialIds) ? "checked" : ""; ?>/> 
                        <?php //echo $value['name']; ?> 
                    </label> 
                 <?php //$i++; } ?>
                </div> 

          </div>
        </div> -->

        <div class="col-md-6">
          <div class="form-group">
          <label class="control-label">Manufacturer</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes1('checkBoxes1')"> 
                    <select class="form-control" <?php echo $disabled; ?>> 
                        <option><?php echo ($selectedManufacturersString=="") ? "Select Manufacturer" : $selectedManufacturersString; ?></option>
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes1"> 
                    <?php 
                        $i=1; 
                      foreach ($allManufacturer as $value) { 
                    ?>
                    <label for="manufacturer_<?php echo $i; ?>"> 
                        <input type="checkbox" name="manufacturer_id_fk[]" id="manufacturer_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $manufacturerIds) ? "checked" : ""; ?> <?php echo $disabled; ?>/> 
                        <?php echo $value['name']; ?> 
                    </label> 
                 <?php $i++; } ?>
                </div>           
          </div>
        </div>
        
        <!--  </div>
     <div class="row">
        
         <div class="col-md-6">
          <div class="form-group">
          <label class="control-label">Material</label>: 
          <select class="form-control">
            <option value="0">-Select Material-</option>
            <option value="1" <?php //echo isset($_GET['id']) ? 'selected': ''; ?>>Polymer Type</option>
            <option value="1">MOC (Material of Construction)</option>
          </select>            
          </div>
        </div> -->
        <!-- <div class="col-md-6">
        <div class="form-group">
          <label class="control-label">Product</label>: 

          <div class="selectBox" 
                    onclick="showCheckboxes2('checkBoxes2')"> 
                    <select class="form-control"> 
                        <option><?php echo ($selectedProductsString=="") ? "Select Product" : $selectedProductsString; ?></option> 
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

        <div class="col-md-6">
          <div class="form-group">
          <label class="control-label">Process</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes3('checkBoxes3')"> 
                    <select class="form-control"> 
                        <option><?php echo ($selectedProcessesString=="") ? "Select Process" : $selectedProcessesString; ?></option> 
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
        <div class="row">-->
        <div class="col-md-6">
         <div class="form-group">
          <label class="control-label">Equipment</label>: 
          <div class="selectBox" 
                    onclick="showCheckboxes4('checkBoxes4')"> 
                    <select class="form-control" <?php echo $disabled; ?>> 
                        <option><?php echo ($selectedEquipmentsString=="") ? "Select Equipment" : $selectedEquipmentsString; ?></option> 
                    </select> 
                    <div class="overSelect"></div> 
                </div>
            <div id="checkBoxes4"> 
                    <?php 
                        $i=1; 
                      foreach ($allEquipment as $value) { 
                    ?>
                    <label for="equipment_<?php echo $i; ?>"> 
                        <input type="checkbox" name="equipment_id_fk[]" id="equipment_<?php echo $i; ?>" value="<?php echo $value['id']; ?>" <?php echo in_array($value['id'], $equipmentIds) ? "checked" : ""; ?> <?php echo $disabled; ?>/> 
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
              <input type="" class="form-control" name="saved_coa[]" id="saved_coa_<?php echo $coaId; ?>" value="<?php echo $coaFileName; ?>" readonly <?php echo $disabled; ?>/>
              </label>
                <label> <?php echo ($i==0) ? "<span>Other Location</span>" : ""; ?>
              <input type="text" class="form-control inline_field" name="saved_other_location[]" id="saved_other_location_<?php echo $coaId; ?>" placeholder="Other Location" value="<?php echo $coaOtherLocation; ?>" <?php echo $disabled; ?>>
              </label>
                <label> <?php echo ($i==0) ? "<span>Data</span>" : ""; ?> 
                  <select name="saved_data_id_fk[]" id="saved_data_id_fk_<?php echo $coaId; ?>" class="form-control leach" <?php echo $disabled; ?>>
                        <?php echo getDropdown($connection, 'data', 'id', 'name', array('is_active'=>1), $coaDataId); ?>
                  </select>
              </label>
              <div class="export btn-group">
                    <a href="<?php echo SITE_URL.'assets/uploads/coa-sample-assembly/'.$coaFileName; ?>" class="btn btn-primary" aria-label="Export" type="button" title="Export data" download><i class="fa fa-download"></i></a>
              </div>
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                <a href="#" class="remove-field2_edit btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
              <?php } ?>
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
              <input name="coa_sample_file[]" id="coa_sample_file" class="form-control" type="file"  placeholder="CoA" onchange="checkfile(this,'coa');" <?php echo $disabled; ?>/>
              </label>
              <label><span>Other Location</span>
              <input name="other_location[]" id="other_location" type="text" class="form-control inline_field" placeholder="Other Location" <?php echo $disabled; ?>>
              </label>
              <label><span>Data</span>
              <select name="data_id_fk[]" id="data_id_fk" class="form-control leach" <?php echo $disabled; ?>>
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
      <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
        <div class="col-md-12">
            <a class="btn btn-primary extra-fields-customer2 float-right" style="color:white;     margin-top: -40px; margin-right: 25px; background: blue;"><i class="fa fa-plus"></i></a>
        </div>
      <?php } ?>
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
                <label class="control-label">pH Min: </label>
                  <input type="number" class="form-control inline_field chem_input" name="ph_min" id="ph_min" placeholder="pH Min"  value="<?php echo $ph_min; ?>" min="0" onchange="compareRange('ph_min', 'ph_max', 'pH')" <?php echo $disabled; ?>>
                  <div id="ph_min_msg" class="error_message" style="color: red;"></div>
              </div>
              <div class="col-md-4">
                <label class="control-label">pH Max </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="ph_max" id="ph_max" placeholder="pH Max"  value="<?php echo $ph_max; ?>" min="0" onchange="compareRange('ph_min', 'ph_max', 'pH')" <?php echo $disabled; ?>>
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
                  <input type="number" class="form-control inline_field chem_input" name="temp_min"  id="temp_min" placeholder="Temperature Min" value="<?php echo $temp_min; ?>" onchange="compareRange('temp_min', 'temp_max', 'Temperature')" <?php echo $disabled; ?>>
                  <div id="temp_min_msg" class="error_message" style="color: red;"></div>
              </div>
              <div class="col-md-4">
                <label class="control-label">Temperature Max </label>: 
                  <input type="number" class="form-control inline_field chem_input" name="temp_max"  id="temp_max" placeholder="Temperature Max" value="<?php echo $temp_max; ?>" onchange="compareRange('temp_min', 'temp_max', 'Temperature')" <?php echo $disabled; ?>>
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
                    <input type="number" class="form-control inline_field chem_input" name="pressure_min" id="pressure_min" min="0" placeholder="Pressure Min" value="<?php echo $pressure_min; ?>" onchange="compareRange('pressure_min', 'pressure_max', 'Pressure')" <?php echo $disabled; ?>>
                  <div id="pressure_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Pressure Max </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="pressure_max" id="pressure_max" min="0" placeholder="Pressure Max" value="<?php echo $pressure_max; ?>" onchange="compareRange('pressure_min', 'pressure_max', 'Pressure')" <?php echo $disabled; ?>>
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
                    <input type="number" class="form-control inline_field chem_input" name="flow_rate_min" id="flow_rate_min" min="0" placeholder="Flow Rate Min" value="<?php echo $flow_rate_min; ?>" onchange="compareRange('flow_rate_min', 'flow_rate_max', 'Flow Rate')" <?php echo $disabled; ?>>
                    <div id="flow_rate_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Flow Rate Max </label>: 
                    <input type="number" class="form-control inline_field chem_input" name="flow_rate_max" id="flow_rate_max" min="0" placeholder="Flow Rate Max" value="<?php echo $flow_rate_max; ?>" onchange="compareRange('flow_rate_min', 'flow_rate_max', 'Flow Rate')" <?php echo $disabled; ?>>
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
                    <input type="number" name="volume_min" id="volume_min" class="form-control inline_field chem_input" min="0" placeholder="Volume Min" value="<?php echo $volume_min; ?>" onchange="compareRange('volume_min', 'volume_max', 'Volume')" <?php echo $disabled; ?>>
                    <div id="volume_min_msg" class="error_message" style="color: red;"></div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Volume Max </label>: 
                    <input type="number" name="volume_max" id="volume_max" class="form-control inline_field chem_input" name="" min="0" placeholder="Volume Max" value="<?php echo $volume_max; ?>" onchange="compareRange('volume_min', 'volume_max', 'Volume')" <?php echo $disabled; ?>>
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
            <textarea cols="150" rows="5" name="chemical_exposure" id="chemical_exposure" <?php echo $disabled; ?>><?php echo $chemical_exposure; ?></textarea>
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
            <textarea cols="150" rows="5" name="other_details" id="other_details" <?php echo $disabled; ?>><?php echo $other_details; ?></textarea>
        </div>
    </div>

    <!-- card-footer -->
        <div class="card-footer">
          
          <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
            <input type="submit" name="submit" id="submit" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>" class="btn btn-primary">
          <?php } ?>
          <a class="btn btn-default white mr-0" href="./sub-components.php"><i class="ft ft-x-circle"></i> Cancel</a> 
          <div id="submit_msg" style="color:red;"></div>
        </div> 
     <!-- /.card-footer -->

     
  </div>



          </form>
		
      </section>
    </section>
  </div>
  
<script type="text/javascript">
    
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


  $(document).ready(function() {
    $(".error_message").css("display", "none");

    
    jQuery("#form_sub_comp").validationEngine();

     <?php
      if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
          echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
          unset($_SESSION['toast_list']);
      }
    ?>

    var incr2 = (function () {
        var i = $('#customer_records_dynamic2 .remove2').length;
        return function () {
            return i++;
    }
    })();


      $('.extra-fields-customer2').click(function() {
        $('.customer_records2').clone().find("input").val("").end().appendTo('.customer_records_dynamic2');
          $('.customer_records_dynamic2 .customer_records2').addClass('form-inline single remove2').append('<a href="#" class="remove-field2 btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
          $('.customer_records_dynamic2 .customer_records2 span').remove();
          // $('.single .row')
          $('.customer_records_dynamic2 > .single').attr("class", "remove2 form-inline");

          $('.customer_records_dynamic2 input').each(function() {
            var count = 0;
            var fieldId = $(this).attr("id");
            $(this).attr('id', fieldId + count);
            count++;
          });
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


  $(document).on('click', '.remove-field2_edit', function(e) {
    $(this).parent().remove();
    e.preventDefault();
  });

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
</script>

<style type="text/css">
    /*.inline_field{
        margin-left: 10px;
    }*/

    .remove2 {
        margin-top: 10px;
    }

    .remove-field2_edit, .remove-field2{
      margin-left: 10px;
    }
    
    .btnprimary{
        color: blue;
    }

    .export{
        margin-left: 10px;
    }
</style>


<style type="text/css">
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
  
   /*     #checkBoxes { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes label:hover { 
            background-color: #4F615E; 
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
            background-color: #4F615E; 
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
            background-color: #4F615E; 
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
            background-color: #4F615E; 
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
            background-color: #4F615E; 
        } 

         #checkBoxes5 label:hover { 
            background-color: #4F615E; 
        } 

        #checkBoxes5 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes5 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes5 label:hover { 
            background-color: #4F615E; 
        } */
    </style> 
    <script> 
    var show = true; 

    function checkfile(sender, doctype="") {
      var validExts = doctype == "photo" ? new Array(".png", ".jpg", ".jpeg") : new Array(".pdf"); //,".doc",".docx"
      var fileExt = sender.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.')).toLowerCase();
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
  
        function showCheckboxes1(id) { 
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


        var show5 = true; 
  
        function showCheckboxes5(id) { 
            var checkboxes = document.getElementById(id); 
  
            if (show5) { 
                checkboxes.style.display = "block"; 
                show5 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show5 = true; 
            } 
        } 

    </script>
<?php include('footer.php'); ?>