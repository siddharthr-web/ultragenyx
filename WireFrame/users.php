<?php include('header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; Users</h3>
            <div class="card-tools">
              <a href="./add-edit-user.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd(
              )" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
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
                            <th style="text-align: center; " data-field="AgencyEmail"> <div class="th-inner sortable both">Email</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Phone</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; " data-field="AgencyURL"> <div class="th-inner sortable both">Username</div>
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
                            <td style="text-align: Center; ">Mark Smith</td>
                            <td style="text-align: center; ">marksmith@malinator.com</td>
                            <td style="text-align: center; ">+1 02187855478</td>
                            <td style="text-align: center; ">marksmith123</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-user.php?id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
                          </tr>
                          <tr data-index="1" data-uniqueid="1">
                            <td style="text-align: center; ">2</td>
                            <td style="text-align: Center; ">William Jhonsan</td>
                            <td style="text-align: center; ">willamj@malinator.com</td>
                            <td style="text-align: center; ">+1 0321423232</td>
                            <td style="text-align: center; ">willamj</td>
                            <td style="text-align: center; "><a style="cursor: pointer;" href="./add-edit-user.php?id=2" title="Edit"> <i class="fa fa-edit"></i> </a></td>
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