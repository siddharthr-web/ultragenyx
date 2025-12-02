<?php 
include('header.php');
?>
<link rel="stylesheet" type="text/css" href="./css/multiselect_dropdown.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; Sub Components</h3>
            <div class="card-tools">
              <a href="./add-edit-subcomponent.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
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
                      <div class="columns columns-right btn-group float-right">
                        <!-- <button class="btn btn-primary" type="button" name="refresh" aria-label="Refresh" title="Refresh"> <i class="fa fa-sync"></i> </button> -->
                        
                        <div class="export btn-group">
                          <button class="btn btn-primary" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></button>
                          <!-- <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item " href="#" data-type="csv">CSV</a> <a class="dropdown-item " href="#" data-type="excel">MS-Excel</a> <a class="dropdown-item " href="#" data-type="pdf">PDF</a> </div> -->
                        </div>
                      </div>
                      <div class="float-right search btn-group" style="margin-right:5px;">
                        <div class="input-group">

                                <select class="form-control"> 
                                    <option>-Field-</option> 
                                    <option>Sub Component Name</option> 
                                    <option>Material</option> 
                                    <option>Product</option> 
                                    <option>Product Contact</option> 
                                    <option>Status</option> 
                                    <!-- <option>pH Range</option> 
                                    <option>Temperature Range</option> 
                                    <option>Pressure Range</option> 
                                    <option>Flow Rate Range</option> 
                                    <option>Volume Range</option> 
                                    <option>Type</option> -->
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

                              <div class="input-group-append">
                                <button class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </button>
                              </div>
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
                           <!--  <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Drawing of Sub-Component</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Sub Component Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Material</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Manufacturer</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="ContactNumber"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <!-- <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Equipment Used In</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Product</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Product Contact</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="operate"> <div class="th-inner ">Assembly <br> Used In</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">1</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">1/4" Sanitary Line with Female MPC Connecter</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->




                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>





                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,701,401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              <a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>


                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">2</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Cubitainer Cap</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>
                            
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->





                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td> 





                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              701
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">3</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">3</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Inlet Sanitization Assemnbly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>
                            
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->





                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                           





                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,701
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">4</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Cross Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->






                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>



                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              701,401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center;"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>


                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">5</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Filtrate Line</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->




                              <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                              <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>






                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,701
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center;"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">6</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Univerasal C-flex to Kleenpak</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->

                              <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                              <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">7</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Outlet Sanitization Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->






                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>




                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,701
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center;"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">8</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">3/4" Sanitary Gaskets (2)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->


                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>


                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301,701,401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">9</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">EKV Buffer Prep Filter Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">10</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Luer to Female Coupling Adapter</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">11</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">3/8" Sanitary line with Female MPC Connecter</a></td>

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->


                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>


                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">12</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->










                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Modified SUB Inoctulation Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->

                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">13</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">2L Bottle tle Assembly</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              401
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">14</a></td>
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><img src="./images/hqdefault.jpg" width="100"></a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">3/8" Sanitary line with Male MPC Connecter</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Polymer Type, MOC</a></td>

                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Straightened</a></td> -->
                            <!-- <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Steel</a></td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">thermo,Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification,Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              301
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Yes</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                              Qualified
                            </a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr>
                          <!-- 
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">2</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">Ace Infoway</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">success@aceinfoway.com</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">https://www.aceinfoway.com</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">07940060912</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">India</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><div class="custom-control custom-checkbox m-0" style="width: 20px; margin: 0 auto !important;">
                                <input type="checkbox" data-size="" class="custom-control-input item-isactive" id="isactive-1" value="true" data-val="true" checked="true">
                                <label class="custom-control-label" for="isactive-1"></label>
                              </div></a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit"><a href="./product-management.php?sid=2"><span class="circle">1</span></a></td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                    <div class="fixed-table-pagination" style="">
                      <div class="float-left pagination-detail"> <span class="pagination-info">Showing 1 to 10 of 14 rows</span> <span class="page-list" style="display: none;"> <span class="btn-group dropdown dropup">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class="page-size">10</span> <span class="caret"></span> </button>
                        <div class="dropdown-menu"> <a class="dropdown-item " href="#">5</a> </div>
                        </span> rows per page </span> </div>
                      <div class="float-right pagination" style="">
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


<style type="text/css">
  a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
}

  select {
    margin-right: 5px;
  }

  .circle {
    border-radius: 50%;
    width: 14px;
    height: 14px;
    padding: 3px;
    border: 1px solid;
    color: #000;
    text-align: center;
    font: 15px Arial, sans-serif;
    background-color: #DF9FE3;
}

  #clearSearch{
    margin-left: 5px;
  }


</style>

<script> 
        var show1 = true; 
        var show2 = true; 
  
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
</script>


<script type="text/javascript">
  Array.prototype.search = function(elem) {
    for(var i = 0; i < this.length; i++) {
        if(this[i] == elem) return i;
    }
    
    return -1;
};

var Multiselect = function(selector) {
    if(!$(selector)) {
        console.error("ERROR: Element %s does not exist.", selector);
        return;
    }

    this.selector = selector;
    this.selections = [];

    (function(that) {
        that.events();
    })(this);
};

Multiselect.prototype = {
    open: function(that) {
        var target = $(that).parent().attr("data-target");

        // If we are not keeping track of this one's entries, then
        // start doing so.
        if(!this.selections) {
            this.selections = [ ];
        }

        $(this.selector + ".multiselect").toggleClass("active");
    },

    close: function() {
        $(this.selector + ".multiselect").removeClass("active");
    },

    events: function() {
        var that = this;

        $(document).on("click", that.selector + ".multiselect > .title", function(e) {
            if(e.target.className.indexOf("close-icon") < 0) {
                that.open();
            }
        });

        $(document).on("click", that.selector + ".multiselect option", function(e) {
            var selection = $(this).attr("value");
            var target = $(this).parent().parent().attr("data-target");

            var io = that.selections.search(selection);

            if(io < 0) that.selections.push(selection);
            else that.selections.splice(io, 1);

            that.selectionStatus();
            that.setSelectionsString();
        });

        $(document).on("click", that.selector + ".multiselect > .title > .close-icon", function(e) {
            that.clearSelections();
        });

        $(document).click(function(e) {
            if(e.target.className.indexOf("title") < 0) {
                if(e.target.className.indexOf("text") < 0) {
                    if(e.target.className.indexOf("-icon") < 0) {
                        if(e.target.className.indexOf("selected") < 0 ||
                           e.target.localName != "option") {
                            that.close();
                        }
                    }
                }
            }
        });
    },

    selectionStatus: function() {
        var obj = $(this.selector + ".multiselect");

        if(this.selections.length) obj.addClass("selection");
        else obj.removeClass("selection");
    },

    clearSelections: function() {
        this.selections = [];
        this.selectionStatus();
        this.setSelectionsString();
    },

    getSelections: function() {
        return this.selections;
    },

    setSelectionsString: function() {
        var selects = this.getSelectionsString().split(", ");
        $(this.selector + ".multiselect > .title").attr("title", selects);

        var opts = $(this.selector + ".multiselect option");

        if(selects.length > 6) {
            var _selects = this.getSelectionsString().split(", ");
            _selects = _selects.splice(0, 6);
            $(this.selector + ".multiselect > .title > .text")
                .text(_selects + " [...]");
        }
        else {
            $(this.selector + ".multiselect > .title > .text")
                .text(selects);
        }

        for(var i = 0; i < opts.length; i++) {
            $(opts[i]).removeClass("selected");
        }

        for(var j = 0; j < selects.length; j++) {
            var select = selects[j];

            for(var i = 0; i < opts.length; i++) {
                if($(opts[i]).attr("value") == select) {
                    $(opts[i]).addClass("selected");
                    break;
                }
            }
        }
    },

    getSelectionsString: function() {
        if(this.selections.length > 0)
            return this.selections.join(", ");
        else return "Select";
    },

    setSelections: function(arr) {
        if(!arr[0]) {
            error("ERROR: This does not look like an array.");
            return;
        }

        this.selections = arr;
        this.selectionStatus();
        this.setSelectionsString();
    },
};

</script>

<script type="text/javascript">
  $(document).ready( function () {

    $('table.data-table').DataTable({
        "bFilter": false,
         "bInfo": false,
         "bLengthChange": true,
         "pageLength": 50
    });

    $(".dataTables_length").hide();

  });

  $(document).mouseup(function(e) {
      var container = $(".checkBoxes");
      var selectBox = $(".selectBox");
         if (!container.is(e.target) && container.has(e.target).length === 0 && !selectBox.is(e.target) && selectBox.has(e.target).length === 0) {
          container.css("display", "none"); 
                show1 = true; 
                show2 = true; 
      }
  });
</script>

<?php include('footer.php'); ?>