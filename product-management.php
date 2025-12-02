<?php 
include('header.php');
include ('queries/product-management-query.php');
?>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/multiselect_dropdown.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; SU Assemblies Management</h3>
            <div class="card-tools">
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                <a href="./add-edit-product.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
              <?php } ?>
            </div>
          </div>
          <!-- Bootstrap 3 table -->
          <div class="row">
            <div class="col-12">
              <div class="card" style=" margin-bottom:0; ">
                <div class="card-body collapse show">
                  <div class="card-block card-dashboard">
                    <div class="fixed-table-toolbar" style="position:relative; top:-10px;">
                     <div class="float-right search btn-group">
                     <form method="post">
                        <div class="input-group">
                            <select class="form-control" name="field" required> 
                                <option value="">-Field-</option> 
                                <option value="name" <?php echo (isset($_POST['field']) && $_POST['field']=="name") ? "selected": ""; ?>>Assembly Name</option> 
                                <option value="material" <?php echo (isset($_POST['field']) && $_POST['field']=="material") ? "selected": ""; ?>>Material</option> 
                                <option value="manufacturer" <?php echo (isset($_POST['field']) && $_POST['field']=="manufacturer") ? "selected": ""; ?>>Manufacturer</option> 
                                <option value="process" <?php echo (isset($_POST['field']) && $_POST['field']=="process") ? "selected": ""; ?>>Process</option> 
                                <option value="product" <?php echo (isset($_POST['field']) && $_POST['field']=="product") ? "selected": ""; ?>>Product</option> 
                                <option value="equipment" <?php echo (isset($_POST['field']) && $_POST['field']=="equipment") ? "selected": ""; ?>>Equipment</option> 
                                <option value="type" <?php echo (isset($_POST['field']) && $_POST['field']=="type") ? "selected": ""; ?>>Type</option> 
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

                          <a href="./product-management.php<?php echo isset($_GET['sub_component_id']) ? '?sub_component_id='.$_GET['sub_component_id'] : ''; ?>" class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </a>
                              
                          <a href= "<?php echo SITE_URL;?>exportdata.php?section=assembly" class="btn btn-primary" id="download_btn" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></a>
                        </div>
                     </form>
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
                            <th style="text-align: center; " data-field="AgencyName"> <div class="th-inner sortable both">Assembly Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyName"> <div class="th-inner sortable both">Material</div>
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
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Equipment</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="CountryName"> <div class="th-inner sortable both">Type</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Status</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="IsActive"> <div class="th-inner ">Action</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                      <?php 
                        $i=1;
                        $delete_url = "";
                        while ($row = $allRecords->fetch_assoc()) {
                          $delete_url = "./insert-update.php?id=".$row['id'].'-delete_su_assembly';
                         ?>
                          <tr data-index="0" data-uniqueid="2">
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name']; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php //echo $row['materials_name'];  
                            echo $row['materials']  ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['manufacturer']; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['processes']; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['products']; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['equipments']; ?></a></td>
                            <td><a style="cursor: pointer;" href="./add-edit-product.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['type']; ?></a></td>
                            <td><a href="./add-edit-product.php?id=<?php echo $row['id']; ?>"><?php echo $row['is_active']; ?></a></td>
                            <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                              <td style="text-align:center">
                                <a style="color:#a31c89;font-size:18px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the SU Assembly ?')">
                                  <i class="fa fa-trash"></i>
                                </a>
                              </td>
                            <?php } else{ ?>
                              <td></td>
                            <?php } ?>
                          </tr>
                      <?php $i++; } ?>
                        </tbody>
                      </table>
                          </form>
                    </div>
                    <!-- <div class="fixed-table-pagination" style="">
                      <div class="float-left pagination-detail"> <span class="pagination-info">Showing 1 to 10 of 12 rows</span> <span class="page-list" style="display: none;"> <span class="btn-group dropdown dropup">
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
                    </div> -->
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
 select {
  margin-right: 5px;
 }
</style>
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


$(document).ready( function () {

  <?php
      if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
          echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
          unset($_SESSION['toast_list']);
      }
  ?>
  
    dataTable = $('table.data-table').DataTable({
            "oLanguage": {
                "sEmptyTable": "No Assembly added.",                 
            },
            "bFilter": false,
            // "bInfo": false,
            "pageLength": 50,
            "bLengthChange": true,
         });
    $(".dataTables_length").hide();

});
</script>
<?php include('footer.php'); ?>

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