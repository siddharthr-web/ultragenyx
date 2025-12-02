<?php 
include('header.php');
$type = $_GET['type'];
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; <?php echo ucfirst($type); ?></h3>
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
                          <button class="btn btn-primary" aria-label="Export" type="button" title="Export data"> <i class="fa fa-download"></i></button>
                          <!-- <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item " href="#" data-type="csv">CSV</a> <a class="dropdown-item " href="#" data-type="excel">MS-Excel</a> <a class="dropdown-item " href="#" data-type="pdf">PDF</a> </div> -->
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
                        <?php if($type=='component'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Belt</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Chain</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">3</td>
                            <td style="text-align: Center; ">Clutch</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='process'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Casting</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Labeling</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Moulding</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Forming</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>

                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Machining</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Joining</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='product'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Waste Tubing</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Media Feed Tubing</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='equipment'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Safety glasses</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Wire brush</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Hammers.</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='materials'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Ferrous Alloys</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Aluminum Alloys</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='manufacturer'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Casting</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Labeling and painting.</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='data'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Leachable</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Validation</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                        <?php if($type=='type'){ ?>
                        <tbody>
                          <tr data-index="0" data-uniqueid="2">
                            <td style="text-align: center; ">1</td>
                            <td style="text-align: Center; ">Test type 1</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=1" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">Test type 2</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-masters.php?type=<?php echo $type; ?>&id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                        </tbody>
                        <?php } ?>

                      </table>
                    </div>
                    <div class="fixed-table-pagination" style="">
                      <div class="float-left pagination-detail"> <span class="pagination-info">Showing 1 to 3 of 3 rows</span> <span class="page-list" style="display: none;"> <span class="btn-group dropdown dropup">
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
        
      </section>
    </section>
  </div>



<script type="text/javascript">
  $(document).ready( function () {
    $('table.data-table').DataTable({
        "bFilter": false,
         "bInfo": false,
         "bLengthChange": true,
    });

    $(".dataTables_length").hide();
} );
</script>

<?php include('footer.php'); ?>