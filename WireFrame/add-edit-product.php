<?php
 include('header.php'); ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
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
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes label { 
            display: block; 
        } 
  
        #checkBoxes label:hover { 
            background-color: #4F615E; 
        } 

        #checkBoxes1 { 
            display: none; 
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes1 label { 
            display: block; 
        } 
  
        #checkBoxes1 label:hover { 
            background-color: #4F615E; 
        } 

        #checkBoxes2 { 
            display: none; 
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes2 label { 
            display: block; 
        } 
  
        #checkBoxes2 label:hover { 
            background-color: #4F615E; 
        }

        #checkBoxes3 { 
            display: none; 
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes3 label { 
            display: block; 
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #4F615E; 
        } 

        #checkBoxes4 { 
            display: none; 
            border: 1px #8DF5E4 solid; 
        } 
  
        #checkBoxes4 label { 
            display: block; 
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #4F615E; 
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
			margin-left: 10px;
		}

		.card .card-body .customer_records_dynamic2 label input{
			margin-left: 0px;
		}


    </style> 
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
    </script> 

  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        
		<div class="card">
		  <div class="card-header">
			<h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; Assembly - Add</h3>
			<div class="card-tools"> <a href="./print_product.php" target="_blank" class="btn btn-primary btn-sm">Print</a> <a href="./product-management.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
		  </div>
		  <form class="form">
			<div class="card-body">
				<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Assembly Name</label>: <span class="requireClass">*</span>
					<input type="text" name="" class="form-control" placeholder="Enter Assembly Name" value="<?php echo isset($_GET['id']) ? 'Waste Tubing': ''; ?>">            
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Internal Part No</label>: 
					<input type="text" name="" class="form-control" placeholder="Enter Internal Part No"  value="<?php echo isset($_GET['id']) ? '01-00576': ''; ?>">            
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
					<div class="form-group">
				        <label for="assembly_drawing" class="control-label">Drawing of Assembly</label>
				        <input class="form-control" type="file" value="" id="assembly_drawing">
                            <?php if(isset($_GET['id'])){ ?>
                                <a href="./images/hqdefault.jpg" target="_blank"><img src="./images/hqdefault.jpg" width="100%" height="250"></a>
                            <?php } ?>
				    </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Vendor Part No.</label>: 
					<input class="form-control" type="text" placeholder="Enter Vendor Part No." value="<?php echo isset($_GET['id']) ? '01-00576': ''; ?>">           
				  </div>
				</div>
			  </div>
			 


			 <div class="row">
				<div class="col-md-6">
					<div class="form-group">
				        <label for="assembly_drawing" class="control-label">Intended Use Description</label>
				        <input class="form-control" type="text" value="" id="" placeholder="Enter Intended Use Description">
				    </div>
				</div>
				  <div class="col-md-6">
	                <div class="form-group">
	                    <label class="control-label">Type</label>: 
	                    <select class="form-control">
	                    	<option>Test type 1</option>
	                    	<option>Test type 2</option>
	                    </select>
	                </div>
	              </div>
			  </div>

			  <div class="row">
			  	<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Batch Record</label>: 
					<input class="form-control" type="text" placeholder="Enter Batch Record" value="<?php echo isset($_GET['id']) ? '01-00576': ''; ?>">           
				  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				        <label for="assembly_drawing" class="control-label">Product Contact?</label>
				        <select class="form-control">
				        	<option>Yes</option>
				        	<option>No</option>
				        </select>
				    </div>
				</div>
			  </div>

			  <div class="row">
			  	<div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be Irradiated? </label>: 
                            <!-- <input class="form-control" type="text"  placeholder="Can be Irradiated?" /> -->
                            <select class="form-control">
                            	<option>Yes</option>
                            	<option>No</option>
                            </select>
                        </div>
                    </div>
			  	 <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Can be autoclaved?</label>: 
                        <select class="form-control">
                        	<option>Yes</option>
                        	<option>No</option>
                        </select>
                    </div>
	              </div>
			  </div>



			  <div class="row">
				  <div class="col-md-6">
	                <div class="form-group">
	                    <label class="control-label">Status</label>: 
	                    <select class="form-control">
	                    	<option>Qualified</option>
	                    	<option>In Progress</option>
	                    	<option>Inactive</option>
	                    </select>
	                </div>
	              </div>
	          </div>
			  <!-- <div class="row">
				
				<div class="col-md-6">
				  <div class="form-group">
					<label class="control-label">Components</label>: 
					<select class="form-control">
					  <option value="0">Select</option>
					  <option value="1">Bags</option>
					  <option value="1">Fittings</option>
					  <option value="1">Tubing</option>
					  <option value="1">Connectors</option>
					  <option value="1">Filters</option>
					  <option value="1" <?php echo isset($_GET['id']) ? 'selected': ''; ?>>Valves</option>
					  <option value="1">Ports</option>
					  <option value="1">Filling Needles</option>
					  <option value="1">Pump Liner</option>
					  <option value="1">Centrifuge Liner</option>
					  <option value="1">Sensors</option>
					  <option value="1">Bottles</option>
					  <option value="1">Clamps</option>
					  <option value="1">Gasket/O-rings</option>
					  <option value="1">Chromatography Column</option>
					</select>            
				  </div>
				</div>
				<div class="col-md-6">
					
				</div>
			  </div> -->

			  <!-- <div class="row">
			  	<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Sub Component</label>: 
  						<div class="customer_records">
  							<div class="row">
	  							<div class="col-md-9">
						          <select class="form-control" style="margin: 10px;">
						          	<option>Select</option>
						          	<option>Iron</option>
						          	<option <?php echo isset($_GET['id']) ? 'selected': ''; ?>>Steel</option>
						          </select>
						        </div>

					          </div>
  						</div>
  						<div class="customer_records_dynamic"></div>
				  </div>
				</div>
			  	<div class="col-md-6"><a class="btn btn-primary extra-fields-customer" style="color:white;"><i class="fa fa-plus"></i> Add More</a></div>
			  </div> -->
			</div>
			<!-- /.card-body -->
			<!-- <div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
			  <a class="btn btn-default white mr-0" href="./product-management.php"><i class="ft ft-x-circle"></i> Cancel</a> 
			</div>  -->   
		  </form>
		</div>

		<div class="card">
          <div class="card-header">
            <h3 class="card-title">Details</h3>            
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
            	<div class="row">
				<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Material</label>: 
					<div class="selectBox" 
		                onclick="showCheckboxes('checkBoxes')"> 
		                <select class="form-control"> 
		                    <option>Select Material</option> 
		                </select> 
		                <div class="overSelect"></div> 
		            </div>
				    <div id="checkBoxes"> 
		                <label for="1"> 
		                    <input type="checkbox" id="1" /> 
		                    Polymer Type 
		                </label> 
		                  
		                <label for="2"> 
		                    <input type="checkbox" id="2" /> 
		                    MOC (Material of Construction) 
		                </label>
		            </div> 

				  </div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Manufacturer</label>: 
					<div class="selectBox" 
		                onclick="showCheckboxes1('checkBoxes1')"> 
		                <select class="form-control"> 
		                    <option>Select Manufacturer</option> 
		                </select> 
		                <div class="overSelect"></div> 
		            </div>
				    <div id="checkBoxes1"> 
		                <label for="3"> 
		                    <input type="checkbox" id="3" /> 
		                    Thermo 
		                </label> 
		                  
		                <label for="4"> 
		                    <input type="checkbox" id="4" /> 
		                    Sartorius
		                </label>

		                <label for="5"> 
		                    <input type="checkbox" id="5" /> 
		                    Millipore
		                </label>

		                <label for="6"> 
		                    <input type="checkbox" id="6" /> 
		                    Ect
		                </label>
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
				<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Product</label>: 

					<div class="selectBox" 
		                onclick="showCheckboxes2('checkBoxes2')"> 
		                <select class="form-control"> 
		                    <option>Select Product</option> 
		                </select> 
		                <div class="overSelect"></div> 
		            </div>
				    <div id="checkBoxes2"> 
		                <label for="7"> 
		                    <input type="checkbox" id="7" /> 
		                    301 
		                </label> 

		                <label for="8"> 
		                    <input type="checkbox" id="8" /> 
		                    401
		                </label>

		                <label for="9"> 
		                    <input type="checkbox" id="9" /> 
		                    701
		                </label>
		            </div> 



				  </div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
					<label class="control-label">Process</label>: 
					<div class="selectBox" 
		                onclick="showCheckboxes3('checkBoxes3')"> 
		                <select class="form-control"> 
		                    <option>Select Process</option> 
		                </select> 
		                <div class="overSelect"></div> 
		            </div>
				    <div id="checkBoxes3"> 
		                <label for="10"> 
		                    <input type="checkbox" id="10" /> 
		                    Clarification 
		                </label> 

		                <label for="11"> 
		                    <input type="checkbox" id="11" /> 
		                    Filling
		                </label>

		                <label for="12"> 
		                    <input type="checkbox" id="12" /> 
		                    Concentration
		                </label>
		                <label for="13"> 
		                    <input type="checkbox" id="13" /> 
		                    Separation 
		                </label> 

		                <label for="14"> 
		                    <input type="checkbox" id="14" /> 
		                    Production (BioRx)
		                </label>

		                <label for="15"> 
		                    <input type="checkbox" id="15" /> 
		                    Cell Culture
		                </label>
		                <label for="16"> 
		                    <input type="checkbox" id="16" /> 
		                    Filtration 
		                </label> 

		                <label for="17"> 
		                    <input type="checkbox" id="17" /> 
		                    Solution Preparation
		                </label>

		                <label for="18"> 
		                    <input type="checkbox" id="18" /> 
		                    Heat Inactivation
		                </label>
		                <label for="19"> 
		                    <input type="checkbox" id="19" /> 
		                    Misc/Others 
		                </label>
		            </div> 


				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				 <div class="form-group">
					<label class="control-label">Equipment</label>: 
					<div class="selectBox" 
		                onclick="showCheckboxes4('checkBoxes4')"> 
		                <select class="form-control"> 
		                    <option>Select Equipment</option> 
		                </select> 
		                <div class="overSelect"></div> 
		            </div>
				    <div id="checkBoxes4"> 
		                <label for="1"> 
		                    <input type="checkbox" id="1" /> 
		                    Single Use Bio Reactors 
		                </label> 

		                <label for="2"> 
		                    <input type="checkbox" id="2" /> 
		                    Single Use Mixers
		                </label>

		                <label for="3"> 
		                    <input type="checkbox" id="3" /> 
		                    Depth Filtration
		                </label>
		                <label for="4"> 
		                    <input type="checkbox" id="4" /> 
		                    Chromatography 
		                </label> 

		                <label for="5"> 
		                    <input type="checkbox" id="5" /> 
		                    Buffer Totes
		                </label>
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
          </form>
        </div>







        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data</h3>            
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
					<!-- <label class="control-label">Sub Component</label>:  -->
  						<div class="customer_records2 form-inline">
  							<label><span>File</span>
							<input class="form-control inline_field" type="file"  placeholder="CoA" />
							</label>
  							<label><span>Other Location</span>
							<input type="text" class="form-control inline_field" name="other_location" placeholder="Other Location">
							</label>
  							<label><span>Data</span>
							<select class="form-control leach inline_field">
								<option>Leachable</option>
								<option>Validation</option>
							</select>
							</label>
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
	    <h3 class="card-title">pH Range</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
	        <div class="row">
	            <div class="col-md-4">
	            	<label class="control-label">pH Min </label>: 
	            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="pH Min">
	            </div>
	            <div class="col-md-4">
	            	<label class="control-label">pH Max </label>: 
	            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="pH Max">
	            </div>
	        </div>
	    </div>


	    <!-- /.card-body -->
	</div>



	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Chemical Exposure</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
	        <div class="row">
	        	<textarea cols="150" rows="5"></textarea>
		  	</div>
		</div>
	</div>

	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Other Details</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
	        <div class="row">
	        	<textarea cols="150" rows="5"></textarea>
		  	</div>
		</div>
	</div>

	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Temperature Range</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
	       <div class="row">
	            <div class="col-md-4">
	            	<label class="control-label">Temperature Min </label>: 
	            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Temperature Min">
	            </div>
	            <div class="col-md-4">
	            	<label class="control-label">Temperature Max </label>: 
	            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Temperature Max">
	            </div>
	        </div>
	    </div>
	    <!-- /.card-body -->
	</div>


	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Pressure Range</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
			<div class="row">
		            <div class="col-md-4">
		            	<label class="control-label">Pressure Min </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Pressure Min">
		            </div>
		            <div class="col-md-4">
		            	<label class="control-label">Pressure Max </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Pressure Max">
		            </div>
	        </div>
	    </div>
	    <!-- /.card-body -->
	</div>


	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Flow Rate Range</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
			<div class="row">
		            <div class="col-md-4">
		            	<label class="control-label">Flow Rate Min </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Flow Rate Min">
		            </div>
		            <div class="col-md-4">
		            	<label class="control-label">Flow Rate Max </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Flow Rate Max">
		            </div>
	        </div>
	    </div>
	    <!-- /.card-body -->
	</div>


	<div class="card">
	  <div class="card-header">
	    <h3 class="card-title">Volume Range</h3>            
	  </div>
	  <!-- Bootstrap 3 table -->
	    <div class="card-body">
			<div class="row">
		            <div class="col-md-4">
		            	<label class="control-label">Volume Min </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Volume Min">
		            </div>
		            <div class="col-md-4">
		            	<label class="control-label">Volume Max </label>: 
		            		<input type="text" class="form-control inline_field chem_input" name="" placeholder="Volume Max">
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
					<!-- <label class="control-label">Sub Component</label>:  -->
  						<div class="customer_records1 form-inline">
  									<label>
  										<span>Sub Component</span>
						          	<select  id="subcomp" placeholder="Select Sub Component"  onchange="set_range()">
									  <option value=""></option>
									  <option value="Bags">Bags</option>
									  <option value="Fittings">Fittings</option>
									  <option value="Tubing">Tubing</option>
									  <option value="Connectors">Connectors</option>
									  <option value="Filters" <?php echo isset($_GET['id']) ? 'selected': ''; ?>>Filters</option>
									  <option value="Valves" <?php echo isset($_GET['id']) ? 'selected': ''; ?>>Valves</option>
									  <option value="Ports">Ports</option>
									  <option value="Filling Needles">Filling Needles</option>
									  <option value="Pump Liner">Pump Liner</option>
									  <option value="Centrifuge Liner">Centrifuge Liner</option>
									  <option value="Sensors">Sensors</option>
									  <option value="Bottles">Bottles</option>
									  <option value="Clamps">Clamps</option>
									  <option value="Gasket/O-rings">Gasket/O-rings</option>
									  <option value="Chromatography Column">Chromatography Column</option>
									</select> 
									</label>
									<label>
										<span>Material</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Material" id="material"></label>
						        <label><span>pH Range</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="pH Range" id="ph_range">
						         </label>
						        <label><span>Temp Range</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Temp Range" id="temp_range">
						         </label>
								<label><span>Pressure Range</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Pressure Range" id="pressure_range">
						         </label>
								<label><span>Volume Range</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Volume Range" id="volume_range">
						         </label>
								<label><span>Flow Rate Range</span>
						          <input type="text" class="form-control inline_field subcomp-input" name="" placeholder="Flow Rate Range" id="flow_rate_range">
						         </label>
						          <a class="form-control btn btnprimary" href="./add-edit-subcomponent.php?id=1" target="_blank">View</a>
						        
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
              <button type="submit" class="btn btn-primary"><?php echo isset($_GET['id']) ? 'Update': 'Add'; ?></button>
              <a class="btn btn-default white mr-0" href="./product-management.php"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div>
      </section>
    </section>
  </div>


<script type="text/javascript">
//   $('.extra-fields-customer').click(function() {
//   $('.customer_records').clone().appendTo('.customer_records_dynamic');
//   $('.customer_records_dynamic .customer_records').addClass('single remove');
  
//   $('.single .row').append('<div class="col-md-3"><a href="#" class="remove-field btn-remove-customer"><i class="fa fa-times "></i></a></div>');
//   $('.customer_records_dynamic > .single').attr("class", "remove");

//   $('.customer_records_dynamic input').each(function() {
//     var count = 0;
//     var fieldname = $(this).attr("name");
//     $(this).attr('name', fieldname + count);
//     count++;
//   });

// });

// $(document).on('click', '.remove-field', function(e) {
//   $(this).parent().parent().parent('.remove').remove();
//   e.preventDefault();
// });


// ----------------------
	
	$(document).ready(function () {
	      $('#subcomp').selectize({
	          sortField: 'text'
	      });
	  });


   function set_range(){
   	$("#ph_range").val("30-50");
   	$("#temp_range").val("100-150");

   	$("#pressure_range").val("50-80");
   	$("#volume_range").val("70-100");
   	$("#flow_rate_range").val("200-350");
   	$("#material").val("Cubitainer Cap");
   }


$('.extra-fields-customer1').click(function() {
  $('.customer_records1').clone().appendTo('.customer_records_dynamic1');
  $('.customer_records_dynamic1 .customer_records1').addClass('form-inline single remove1').append('<a href="#" class="remove-field1 btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  $('.customer_records_dynamic1 .customer_records1 span').remove();
  
  // $('.single .row')
  $('.customer_records_dynamic1 > .single').attr("class", "remove1 form-inline");

  $('.customer_records_dynamic1 input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
    count++;
  });

});



$('.extra-fields-customer2').click(function() {
  $('.customer_records2').clone().appendTo('.customer_records_dynamic2');
  $('.customer_records_dynamic2 .customer_records2').addClass('form-inline single remove2').append('<a href="#" class="remove-field2 btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');

  $('.customer_records_dynamic2 .customer_records2 span').remove();
  
  // $('.single .row')
  $('.customer_records_dynamic2 > .single').attr("class", "remove2 form-inline");

  $('.customer_records_dynamic2 input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
    count++;
  });

});



$('.extra-fields-customer3').click(function() {
  $('.customer_records3').clone().appendTo('.customer_records_dynamic3');
  $('.customer_records_dynamic3 .customer_records3').addClass('form-inline single remove3').append('<a href="#" class="remove-field3 btn-remove-customer3 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
  
  // $('.single .row')
  $('.customer_records_dynamic3 > .single').attr("class", "remove3 form-inline");

  $('.customer_records_dynamic3 input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
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
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
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
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
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
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
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


<style type="text/css">
	.selectize-input {
		width: 200px !important;
	}

	.inline_field{
		margin-left: 10px;
	}

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
<?php include('footer.php'); ?>