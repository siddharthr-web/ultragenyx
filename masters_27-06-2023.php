<?php 
include('header.php');
$type = $_GET['type'];
$allRecords = getAllRecords($connection, $type, array('is_active'=> 1), "ORDER BY id DESC");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; <?php echo ucfirst('Assembly Type'); ?></h3>
            <div class="card-tools">
              <a href="./add-edit-masters.php?type=<?php echo $type; ?>" id="Add" class="btn btn-primary btn-sm" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
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
                          <a class="btn btn-primary" aria-label="Export" type="button" title="Export data" href= "<?php echo SITE_URL;?>exportdata.php?section=masters&type=<?php echo $type; ?>"> <i class="fa fa-download"></i></a>
                          <!-- <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item " href="#" data-type="csv">CSV</a> <a class="dropdown-item " href="#" data-type="excel">MS-Excel</a> <a class="dropdown-item " href="#" data-type="pdf">PDF</a> </div> -->
                        </div>
                      </div>
                      <div class="float-right search btn-group" style="margin-right:5px;">
                        <div class="input-group">
                          <input class="form-control search-input" id="data-table-search" type="text" placeholder="Search" autocomplete="off">
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
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: Center; " data-field="AgencyName"> <div class="th-inner sortable both">Action</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i=1;
                        while ($row = $allRecords->fetch_assoc()) { ?>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; "><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td style="text-align: center; ">
                              <a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>

                              <a 
                              class="pointer t11" 
                              href="<?php echo SITE_URL; ?>delete_records.php?id=<?php echo $row['id'];?>&type=masters&sub_type=<?php echo $type; ?>" 
                              title="Delete"
                              onclick="return confirm('Are you sure, you want to delete the <?php echo ucfirst($type); ?> ?')">
                                <i class="fa fa-trash"></i>
                              </a>
                            </td>
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
        
      </section>
    </section>
  </div>



<script type="text/javascript">
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
            }
         });
    $(document).on("keyup", "#data-table-search", function() {
      dataTable.search($(this).val()).draw();
    })

    $(document).on("click", "#clearSearch", function() {
      dataTable.search("").draw();
      $("#data-table-search").val("");
    })
    
    $("#DataTables_Table_0_length").hide();
    $("#DataTables_Table_0_filter").hide();

});
</script>

<?php include('footer.php'); ?>