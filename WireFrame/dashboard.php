<?php include('header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Dashboard</h3>            
          </div>
          <!-- Bootstrap 3 table -->
          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">				  
					<div class="float-right search btn-group" style="margin-right:5px;">
                        <div class="input-group">
                          <select class="form-control"> 
                                    <option>-Field-</option> 
                                    <option selected>Assembly Name</option> 
                                    <option>Material</option> 
                                    <option>Manufacturer</option> 
                                    <option>Process</option> 
                                    <option>Product</option> 
                                    <option>Status</option> 
                                </select> 

                                <select class="form-control"> 
                                    <option>=</option> 
                                    <option>Start with</option> 
                                    <option selected>End  with</option> 
                                    <option>Match</option> 
                                </select>

                      <input class="form-control search-input" type="text" placeholder="Search" autocomplete="off" value="Tubing">

                      <button class="btn btn-primary" type="submit" name="search_btn" id="search_btn" title="Search"> <i class="fa fa-search"></i> </button>

                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" name="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </button>
                          </div>
                        </div>
                      </div>
                </div>



                <h3 style="margin: 10px;"><i class="fas fa-tasks"></i> Assembly</h3>

                <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th style="text-align: center; " data-field=""> <div class="th-inner ">#</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Assembly Name</div>
                              <div class="fht-cell"></div>
                            </th>
                           <!--  <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Product Code</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Material</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Manufacturer</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th>
                            
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Product</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Components</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="operate"> <div class="th-inner ">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">1</a></td>
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Waste Tubing</a></td>
                            <!-- <td style="text-align: Center; ">01-00576</td> -->
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701,401</a></td>
                            <!-- <td style="text-align: center; ">Fittings</td> -->
                            <td style="text-align: center; ">Active</a></td>
                          </tr>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">2</a></td>
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Media Feed Tubing</a></td>
                            <!-- <td style="text-align: Center; ">01-00577</td> -->
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Polymer Type</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Thermo</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Clarification</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">701,401</a></td>
                            <!-- <td style="text-align: center; ">Bags</td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Active</a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">3</a></td>
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Vent Filter with Tubing</a></td>
                            <!-- <td style="text-align: Center; ">01-00578</td> -->
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,701</a></td>
                            <!-- <td style="text-align: center; ">Fittings</td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Active</a></td>
                          </tr>

                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">4</a></td>
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Vent Filter with Tubing</a></td>
                            <!-- <td style="text-align: Center; ">01-00578</td> -->
                            <td style="text-align: Center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">MOC (Material of Construction)</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Sartorius</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Filling</a></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">301,401</a></td>
                            <!-- <td style="text-align: center; ">Fittings</td> -->
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-product.php?id=1" title="Edit">Active</a></td>
                          </tr>
                        </tbody>
                </table>


                <h3 style="margin: 10px;"><i class="fas fa-tasks"></i> Sub Components</h3>

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
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Product</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Product Contact</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="ContactNumber"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th> -->
                           <!--  <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Equipment Used In</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="operate"> <div class="th-inner ">Assembly Used In</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-index="1" data-uniqueid="1">
                            <td colspan="8" style="text-align: center;">No Records Found.</a></td>
                          </tr>
                        </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
		<?php /* ?>
		    <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; Product Management</h3>
            <div class="card-tools">
              <!--<button id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()"> <i class="fa fa-plus"></i> Add </button> -->
            </div>
          </div>
          <!-- Bootstrap 3 table -->
          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <!--<div class="fixed-table-toolbar" style="position:relative; top:-10px;">
                      <div class="bs-bars float-left"></div>
                      <div class="columns columns-right btn-group float-right">
                        <button class="btn btn-primary" type="button" name="refresh" aria-label="Refresh" title="Refresh"> <i class="fa fa-sync"></i> </button>
                        <div class="keep-open btn-group" title="Columns">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-label="Columns" title="Columns"> <i class="fa fa-th-list"></i> <span class="caret"></span> </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="" value="0" checked="checked">
                              <span>#</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="AgencyURL" value="4" checked="checked">
                              <span>Agency URL</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="ContactNumber" value="5" checked="checked">
                              <span>Contact Number</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="CountryName" value="6" checked="checked">
                              <span>Country</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="CreatedDate" value="7">
                              <span>Created Date</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="ModifiedDate" value="8">
                              <span>Modified Date</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="IsActive" value="9" checked="checked">
                              <span>Active</span> </label>
                            <label class="dropdown-item dropdown-item-marker">
                              <input type="checkbox" data-field="operate" value="10" checked="checked">
                              <span>Actions</span> </label>
                          </div>
                        </div>
                        <div class="export btn-group">
                          <button class="btn btn-primary dropdown-toggle" aria-label="Export" data-toggle="dropdown" type="button" title="Export data"> <i class="fa fa-download"></i> <span class="caret"></span> </button>
                          <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item " href="#" data-type="csv">CSV</a> <a class="dropdown-item " href="#" data-type="excel">MS-Excel</a> <a class="dropdown-item " href="#" data-type="pdf">PDF</a> </div>
                        </div>
                      </div>
                      <div class="float-right search btn-group" style="margin-right:5px;">
                        <div class="input-group">
                          <input class="form-control search-input" type="text" placeholder="Search" autocomplete="off">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" name="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </button>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="tablescroll">
                      <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th style="text-align: center; " data-field=""> <div class="th-inner ">#</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Agency Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Agency Email</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Agency URL</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="ContactNumber"> <div class="th-inner sortable both">Contact Number</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Country</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Active</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="operate"> <div class="th-inner ">Actions</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Primson</td>
                            <td style="text-align: center; ">sales@primson.com</td>
                            <td style="text-align: center; ">https://www.primson.com</td>
                            <td style="text-align: center; ">9908899088</td>
                            <td style="text-align: center; ">United States</td>
                            <td style="text-align: center; "><div class="custom-control custom-checkbox m-0" style="width: 20px; margin: 0 auto !important;">
                                <input type="checkbox" data-size="" class="custom-control-input item-isactive" id="isactive-2" value="true" data-val="true" checked="true">
                                <label class="custom-control-label" for="isactive-2"></label>
                              </div></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="/primson/admin/agency/edit/2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Ace Infoway</td>
                            <td style="text-align: center; ">success@aceinfoway.com</td>
                            <td style="text-align: center; ">https://www.aceinfoway.com</td>
                            <td style="text-align: center; ">07940060912</td>
                            <td style="text-align: center; ">India</td>
                            <td style="text-align: center; "><div class="custom-control custom-checkbox m-0" style="width: 20px; margin: 0 auto !important;">
                                <input type="checkbox" data-size="" class="custom-control-input item-isactive" id="isactive-1" value="true" data-val="true" checked="true">
                                <label class="custom-control-label" for="isactive-1"></label>
                              </div></td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="/primson/admin/agency/edit/1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="fixed-table-pagination" style="">
                      <div class="float-left pagination-detail"> <span class="pagination-info">Showing 1 to 2 of 2 rows</span> <span class="page-list" style="display: none;"> <span class="btn-group dropdown dropup">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> <span class="page-size">10</span> <span class="caret"></span> </button>
                        <div class="dropdown-menu"> <a class="dropdown-item " href="#">5</a> </div>
                        </span> rows per page </span> </div>
                      <div class="float-right pagination" style="display: none;">
                        <ul class="pagination">
                          <li class="page-item page-pre"> <a class="page-link" aria-label="previous page" href="javascript:void(0)">‹</a> </li>
                          <li class="page-item active"> <a class="page-link" aria-label="to page 1" href="javascript:void(0)">1</a> </li>
                          <li class="page-item page-next"> <a class="page-link" aria-label="next page" href="javascript:void(0)">›</a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
          <h3 class="card-title"><i class="fas fa-th-large"></i>&nbsp; Sub Components</h3>
          <div class="card-tools"> <a href="/AceInfoway/Admin/Agency" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
          </div>
          <form class="form">
          <div class="card-body">
            <!-- <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Agency Name</label>: <span class="requireClass">*</span>
                <input class="form-control" type="text"  placeholder="Unique Agency Name" />            
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Agency Name</label>: <span class="requireClass">*</span>
                <input class="form-control" type="text"  placeholder="Unique Agency Name" />            
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Material</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Material</option>
                  <option value="0">Polymer Type</option>
                  <option value="1">MOC (Material of Construction)</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Manufacturer</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Manufacturer</option>
                  <option value="0">Thermo</option>
                  <option value="1">Sartorius</option>
                  <option value="2">Millipore</option>
                  <option value="3">Ect</option>
                </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Process</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Process</option>
                  <option value="0">Clarification</option>
                  <option value="1">Filling</option>
                  <option value="2">Concentration</option>
                  <option value="3">Separation</option>
                  <option value="4">Production (BioRx)</option>
                  <option value="5">Cell Culture</option>
                  <option value="6">Filtration</option>
                  <option value="7">Solution Preparation</option>
                  <option value="8">Heat Inactivation</option>
                  <option value="9">Misc/Others</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Equipment</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Equipment</option>
                  <option value="0">Single Use Bio Reactors</option>
                  <option value="1">Single Use Mixers</option>
                  <option value="2">Depth Filtration</option>
                  <option value="3">Chromatography</option>
                  <option value="4">Buffer Totes</option>
                </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Product/Program</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Product/Program</option>
                  <option value="0">301</option>
                  <option value="1">401</option>
                  <option value="2">701</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Components</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Components</option>
                  <option value="0">Bags</option>
                  <option value="1">Fittings</option>
                  <option value="2">Tubing</option>
                  <option value="3">Connectors</option>
                  <option value="4">Filters</option>
                  <option value="5">Valves</option>
                  <option value="6">Ports</option>
                  <option value="7">Filling Needles</option>
                  <option value="8">Pump Liner</option>
                  <option value="9">Centrifuge Liner</option>
                  <option value="10">Sensors</option>
                  <option value="11">Bottles</option>
                  <option value="12">Gasket/O-rings</option>
                  <option value="13">Clamps</option>
                  <option value="14">Chromatography Column</option>
                </select>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
          </div>    
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-database"></i>&nbsp; Full Assembly Page</h3>
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Upload Drawing of Drawing Assembly</label>: <span class="requireClass">*</span>
                            <input type="file" accept="image/*" onchange="loadFile(event)">
                            <img id="output"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Make a table</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Make a table" />
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Process Used In</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Process Used In" />
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Equipment Used In</label>: <span class="requireClass">*</span>
                          <input class="form-control" type="text"  placeholder="Equipment Used In" />
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Sub-Components Used</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Sub-Components Used" />
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">COTS/Custom (internal)</label>: <span class="requireClass">*</span>
                          <input class="form-control" type="text"  placeholder="COTS/Custom" />
                      </div>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-th-large"></i>&nbsp; Sub Components Page</h3>
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Drawing of SubComponent</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Drawing of SubComponent" />
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Product Contact or NonContact</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Product Contact or NonContact" />
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Assembly Used In</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Assembly Used In" />
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Process Used In</label>: <span class="requireClass">*</span>
                          <input class="form-control" type="text"  placeholder="Process Used In" />
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Equipment Used In</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Equipment Used In" />
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Material (what's its made of?)</label>: <span class="requireClass">*</span>
                          <input class="form-control" type="text"  placeholder="Material" />
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Brand/Model/Manufacturer Part #</label>: <span class="requireClass">*</span>
                        <input class="form-control" type="text"  placeholder="Brand/Model/Manufacturer Part #" />
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="control-label">Mating Ability (parts that can only connected together)</label>: <span class="requireClass">*</span>
                          <input class="form-control" type="text"  placeholder="Mating Ability" />
                      </div>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-database"></i>&nbsp; Data</h3>
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Leachable/Extractables Data</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Leachable/Extractables Data" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Validation</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Validation" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">CoA (sample)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="CoA" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Process used in</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Process used in" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Equipment used in</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Equipment used in" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Supplier Change Notification</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Supplier Change Notification" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Temp Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Temp Range" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">pH Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="pH Range" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Pressure Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Pressure Range" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be irritated? (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Can be irritated?" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be autoclaved? (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Can be autoclaved?" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div> <?php */ ?>
      </section>
    </section>
  </div>

  <style type="text/css">
    #search_btn{
      margin-right: 5px;
    }

    a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
    }
  </style>
<?php include('footer.php'); ?>