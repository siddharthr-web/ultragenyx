<?php include('header.php'); ?>
<link rel="stylesheet" type="text/css" href="./css/multiselect_dropdown.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; Assembly Management</h3>
            <div class="card-tools">
              <a href="./add-edit-product.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
            </div>
          </div>
          <!-- Bootstrap 3 table -->
          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <div class="fixed-table-toolbar" style="position:relative; top:-10px;">
                      <div class="bs-bars float-left"></div>
                      <div class="float-right search btn-group">
                        <div class="input-group">
                                <select class="form-control"> 
                                    <option>-Field-</option> 
                                    <option>Assembly Name</option> 
                                    <option>Material</option> 
                                    <option>Manufacturer</option> 
                                    <option>Process</option> 
                                    <option>Product</option> 
                                    <option>Status</option> 
                                    <!-- <option>pH Range</option> 
                                    <option>Temperature Range</option> 
                                    <option>Pressure Range</option> 
                                    <option>Flow Rate Range</option> 
                                    <option>Volume Range</option> 
                                    <option>Type</option>  -->
                                </select> 

                                <select class="form-control"> 
                                    <option>Begins With</option> 
                                    <option>Contains</option> 
                                    <option>Does Not Contains</option> 
                                    <option>Ends With</option> 
                                    <option>Equal To</option> 
                                    <option>Greater Than</option> 
                                    <option>Greater Than Or Equal To</option> 
                                    <option>Less Than</option> 
                                    <option>Less Than Or Equal To</option> 
                                    <option>Not Equal To</option> 
                                </select>

                      <input class="form-control search-input" type="text" placeholder="Search" autocomplete="off">

                      <button class="btn btn-primary" type="submit" name="submit" title="Search"> <i class="fa fa-search"></i> </button>

                      <a href="" class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </a>
                          
                      <button class="btn btn-primary" id="download_btn" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></button>

                        </div>
                      </div>
                    </div>
                    <div class="tablescroll">
                      <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th style="text-align: center; " data-field=""> <div class="th-inner ">#</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Assembly Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Material</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Manufacturer</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="ContactNumber"> <div class="th-inner sortable both">Equipment</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Product</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Components</div>
                              <div class="fht-cell"></div>
                            </th> -->
                           <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <?php if(!isset($_GET['sid'])){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">
                              1/2" Male to 1/4" Female Adapter
                          </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type ,<br> MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">2</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Waste Tubing</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type ,<br> MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">3</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Media Feed Tubing</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type ,<br> MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!--  <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">4</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Vent Filter with Tubing</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">5</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/4" Cap and Plug</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type ,<br> MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">6</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/2" Cap and Plug</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td>  -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">7</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">EKV Production Filter Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">8</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/4" Female to Female Adapter</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">9</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/4" Male to Male Adapter</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">10</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/2" Sanitary Line</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">11</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Vent Filter with Tubing</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">12</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/4" Cap and Plug</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                        </tbody>
                      <?php }else{ ?>
                        <tbody>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">10</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/2" Sanitary Line</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">11</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Vent Filter with Tubing</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Mixers</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">401</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Fittings</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">12</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1/4" Cap and Plug</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Single Use Bio Reactors</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Bags</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Qualified</a></td>
                          </tr>
                        </tbody>
                      <?php } ?>
                      </table>
                    </div>
                    <div class="fixed-table-pagination" style="">
                      <div class="float-left pagination-detail"> <span class="pagination-info">Showing 1 to 10 of 12 rows</span> <span class="page-list" style="display: none;"> <span class="btn-group dropdown dropup">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class="page-size">10</span> <span class="caret"></span> </button>
                        <div class="dropdown-menu"> <a class="dropdown-item " href="#">5</a> </div>
                        </span> rows per page </span></div>
                      <div class="float-right pagination" style=";">
                        <label>Show <select name="example_length" aria-controls="example" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="-1">All</option></select> entries</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </section>
    </section>
  </div>
<script> 
        var show1 = true; 
        var show2 = true; 
        var show3 = true; 
        var show4 = true; 
  
        function showCheckboxes() { 
            var checkboxes =  
                document.getElementById("checkBoxes"); 
  
            if (show1) { 
                checkboxes.style.display = "block"; 
                show1 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show1 = true; 
            } 
        }

        function showCheckboxes2() { 
            var checkboxes =  
                document.getElementById("checkBoxes2"); 
  
            if (show2) { 
                checkboxes.style.display = "block"; 
                show2 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show2 = true; 
            } 
        }

        function showCheckboxes3() { 
            var checkboxes =  
                document.getElementById("checkBoxes3"); 
  
            if (show3) { 
                checkboxes.style.display = "block"; 
                show3 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show3 = true; 
            } 
        }
        

        function showCheckboxes4() { 
            var checkboxes =  
                document.getElementById("checkBoxes4"); 
  
            if (show4) { 
                checkboxes.style.display = "block"; 
                show4 = false; 
            } else { 
                checkboxes.style.display = "none"; 
                show4 = true; 
            } 
        }
</script>
<script type="text/javascript">
  $(document).ready( function () {
    $('table.data-table').DataTable({
        "bFilter": false,
         "bInfo": false,
         "bLengthChange": true,
         "pageLength": 50,
         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });

    $(".dataTables_length").hide();
} );

  $(document).on("keyup", ".search-input", function() {
      $('table.data-table').search($(this).val()).draw();
    });

  $(document).mouseup(function(e) {
      var container = $(".checkBoxes");
      var selectBox = $(".selectBox");
         if (!container.is(e.target) && container.has(e.target).length === 0 && !selectBox.is(e.target) && selectBox.has(e.target).length === 0) {
          container.css("display", "none"); 
                show1 = true; 
                show2 = true; 
                show3 = true; 
                show4 = true; 
      }
  });
</script>
<?php include('footer.php'); ?>

<style type="text/css">
  select {
    margin-right: 5px;
  }

  #download_btn,#clearSearch {
    margin-left: 5px; 
  }

  a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
}
</style>