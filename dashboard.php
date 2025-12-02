<?php
include('header.php');
include('queries/dashboard_queries.php');
?>

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
                        <form method="post">
                        <div class="input-group">
                                <select class="form-control" name="field" required> 
                                    <option value="">-Field-</option> 
                                    <option value="name" <?php echo (isset($_POST['field']) && $_POST['field']=="name") ? "selected": ""; ?>>Assembly Name</option>
                                    <option value="sub_copoment_name" <?php echo (isset($_POST['field']) && $_POST['field']=="sub_copoment_name") ? "selected": ""; ?>>Sub Component Name</option>
                                    <option value="material" <?php echo (isset($_POST['field']) && $_POST['field']=="material") ? "selected": ""; ?>>Material</option> 
                                    <option value="manufacturer" <?php echo (isset($_POST['field']) && $_POST['field']=="manufacturer") ? "selected": ""; ?>>Manufacturer</option> 
                                    <option value="process" <?php echo (isset($_POST['field']) && $_POST['field']=="process") ? "selected": ""; ?>>Process</option> 
                                    <option value="product" <?php echo (isset($_POST['field']) && $_POST['field']=="product") ? "selected": ""; ?>>Product</option> 
                                    <option value="is_active" <?php echo (isset($_POST['field']) && $_POST['field']=="is_active") ? "selected": ""; ?>>Status</option> 
                                    <option value="ph_min" <?php echo (isset($_POST['field']) && $_POST['field']=="ph_min") ? "selected": ""; ?>>pH Min</option> 
                                    <option value="ph_max" <?php echo (isset($_POST['field']) && $_POST['field']=="ph_max") ? "selected": ""; ?>>pH Max</option> 
                                    <option value="temp_min" <?php echo (isset($_POST['field']) && $_POST['field']=="temp_min") ? "selected": ""; ?>>Temperature Min</option> 
                                    <option value="temp_max" <?php echo (isset($_POST['field']) && $_POST['field']=="temp_max") ? "selected": ""; ?>>Temperature Max</option> 
                                    <option value="pressure_min" <?php echo (isset($_POST['field']) && $_POST['field']=="pressure_min") ? "selected": ""; ?>>Pressure Min</option> 
                                    <option value="pressure_max" <?php echo (isset($_POST['field']) && $_POST['field']=="pressure_max") ? "selected": ""; ?>>Pressure Max</option> 
                                    <option value="flow_rate_min" <?php echo (isset($_POST['field']) && $_POST['field']=="flow_rate_min") ? "selected": ""; ?>>Flow Rate Min</option> 
                                    <option value="flow_rate_max" <?php echo (isset($_POST['field']) && $_POST['field']=="flow_rate_max") ? "selected": ""; ?>>Flow Rate Max</option> 
                                    <option value="volume_min" <?php echo (isset($_POST['field']) && $_POST['field']=="volume_min") ? "selected": ""; ?>>Volume Min</option> 
                                    <option value="volume_max" <?php echo (isset($_POST['field']) && $_POST['field']=="volume_max") ? "selected": ""; ?>>Volume Max</option> 
                                </select> 

                                <select class="form-control" name="operation" required> 
                                    <option value="">-Operation-</option> 
                                    <option value="1" <?php echo (isset($_POST['operation']) && $_POST['operation']=="1") ? "selected": ""; ?>>Begins With</option> 
                                    <option value="2" <?php echo (isset($_POST['operation']) && $_POST['operation']=="2") ? "selected": ""; ?>>Contains</option> 
                                    <option value="3" <?php echo (isset($_POST['operation']) && $_POST['operation']=="3") ? "selected": ""; ?>>Does Not Contains</option> 
                                    <option value="4" <?php echo (isset($_POST['operation']) && $_POST['operation']=="4") ? "selected": ""; ?>>Ends With</option> 
                                    <option value="5" <?php echo (isset($_POST['operation']) && $_POST['operation']=="5") ? "selected": ""; ?>>Equal To</option> 
                                    <option value="6" <?php echo (isset($_POST['operation']) && $_POST['operation']=="6") ? "selected": ""; ?>>Greater Than</option> 
                                    <option value="7" <?php echo (isset($_POST['operation']) && $_POST['operation']=="7") ? "selected": ""; ?>>Greater Than Or Equal To</option> 
                                    <option value="8" <?php echo (isset($_POST['operation']) && $_POST['operation']=="8") ? "selected": ""; ?>>Less Than</option> 
                                    <option value="9" <?php echo (isset($_POST['operation']) && $_POST['operation']=="9") ? "selected": ""; ?>>Less Than Or Equal To</option> 
                                    <option value="10" <?php echo (isset($_POST['operation']) && $_POST['operation']=="10") ? "selected": ""; ?>>Not Equal To</option> 
                                </select>

                      <input name="search" value="<?php echo isset($_POST['search']) ? $_POST['search']: ''; ?>" class="form-control search-input" type="text" placeholder="Search" autocomplete="off" required>

                      <button id="btn_search" class="btn btn-primary" type="submit" name="submit_search" title="Search"> <i class="fa fa-search"></i> </button>

                      <a href="./dashboard.php" class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </a>

                     </div>
                     </form>
                      </div>
                </div>
          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <div class="fixed-table-toolbar" style="position:relative; top:-10px;">
                     <div class=" search btn-group">
                        <h3 style="margin: 10px;"><i class="fas fa-tasks"></i> SU Assembly</h3>
                      </div>
                    </div>
                    <div class="tablescroll">
                      <form method="post">
                        <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                          <thead>
                            <tr>
                              <th style="text-align: center; " data-field=""> <div class="th-inner ">#</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Assembly Name</div>
                                <div class="fht-cell"></div>
                              </th>
                              <!-- <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Material</div>
                                <div class="fht-cell"></div>
                              </th> -->
                              <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Manufacturer</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Process</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Product</div>
                                <div class="fht-cell"></div>
                              </th>
                              <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Status</div>
                                <div class="fht-cell"></div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                            $i=1;
                            while ($row = $allRecordsAssembly->fetch_assoc()) {
                            ?>
                              <tr data-index="0" data-uniqueid="2">
                                <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>
                                <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name']; ?></a></td>
                                <!-- <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php //echo $row['id']; ?>" title="Edit"><?php //echo $row['materials_name'];  
                                //echo $row['materials']  ?></a></td> -->
                                <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['manufacturers']; ?></a></td>
                                <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['processes']; ?></a></td>
                                <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['products']; ?></a></td>
                                <td><a href="./add-edit-product.php?id=<?php echo $row['id']; ?>"><?php echo $row['is_active']; ?></a></td>
                              </tr>
                          <?php $i++; } ?>
                            </tbody>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <div class="fixed-table-toolbar" style="position:relative; top:-10px;">
                     <div class=" search btn-group">
                        <h3 style="margin: 10px;"><i class="fas fa-tasks"></i> Sub Components</h3>
                      </div>
                    </div>
                    <div class="tablescroll">
                      <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th style="text-align: center; " data-field=""> <div class="th-inner ">#</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Sub Component Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Material</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Manufacturer</div>
                              <div class="fht-cell"></div>
                            </th>
                            <!-- <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Process</div>
                              <div class="fht-cell"></div>
                            </th> -->
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Product</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Product Contact</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="operate"> <div class="th-inner ">Assembly <br> Used In</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i=1;
                            while ($row = $allRecordsSubComp->fetch_assoc()) { ?>
                              <tr data-index="0" data-uniqueid="2">
                                <td style="text-align: center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $i; ?></a></td>
                                <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $row['sub_copoment_name']; ?></a></td>
                                  <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $row['materials']; ?></a></td>
                                  <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $row['manufacturers']; ?></a></td>
                                  <!-- <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php //echo $row['id']; ?>"><?php //echo $row['processes']; ?></a></td> -->
                                  <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $row['products']; ?></a></td>
                                  <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo ($row['product_contact']) ? "Yes": "No"; ?></a></td>
                                  <td style="text-align: Center; "><a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><?php echo $row['is_active']; ?></a></td>    
                                  <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-subcomponent.php?id=1" title="Edit">
                                  <a href="./add-edit-subcomponent.php?id=<?php echo $row['id']; ?>"><span class="circle"><?php echo $row['assembly_used_in']; ?></span></a></td>
                              </tr>
                          <?php $i++; } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
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

  <script type="text/javascript">
    $(document).ready( function () {
    dataTable = $('table.data-table').DataTable({
            "oLanguage": {
                "sEmptyTable": "No data added.",
            }
         });
    $(document).on("keyup", "#data-table-search", function() {
      dataTable.search($(this).val()).draw();
    })

    $(document).on("click", "#clearSearch", function() {
      dataTable.search("").draw();
      $("#data-table-search").val("");
    })
    
    $(".dataTables_length").hide();
    $(".dataTables_filter").hide();

});
  </script>


<style type="text/css">
  select {
    margin-right: 5px;
  }

  #download_btn,#clearSearch, #btn_search {
    margin-left: 5px; 
  }

  a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
}
</style>
<?php include('footer.php'); ?>