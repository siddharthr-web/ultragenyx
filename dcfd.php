<?php 
include('header.php');
include ('queries/product-management-query.php');


$selectQ = "SELECT * FROM tbl_dcfd ORDER BY id DESC";
$queryResult = selectQuery($connection, $selectQ);
// $result = array();
// while ($row = $queryResult->fetch_assoc()) 
// {
//     array_push($result, $row);
// }

?>
<style>
    .dataTables_empty
    {
        text-align: center;
    }
    #pdfset
    {
      font-size: 53px;
      padding: 5px;
      color: #e52424;
      /* margin-left: 37%; */
    }
</style>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/multiselect_dropdown.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; DCFD Management</h3>
            <div class="card-tools">
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                <a href="./add-edit-dcfd.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
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
                     <form method="post" id="search_data_live">
                        <div class="input-group">
                            <select class="form-control" name="DCFDName" required> 
                                <option value="">-Field-</option> 
                                <option value="DCFDName" <?php echo (isset($_POST['field']) && $_POST['field']=="name") ? "selected": ""; ?>>DCFD Name</option> 
                            </select>
                            <select class="form-control" name="product" required>
                                <option value="">-Operation-</option>
                                <option value="Product" <?php echo (isset($_POST['operation']) && $_POST['operation']=="1") ? "selected": ""; ?>>Product</option>
                            </select>
                          <input name="search" value="<?php echo isset($_POST['search']) ? $_POST['search']: ''; ?>" class="form-control search-input" type="text" placeholder="Search" autocomplete="off" required>
                          <button id="btn_search" class="btn btn-primary submit_search" type="button" name="submit_search" title="Search"> <i class="fa fa-search"></i> </button>
                          <input type="hidden" name="type_search" value="search_data"/>
                          <a href="./dcfd.php<?php echo isset($_GET['sub_component_id']) ? '?sub_component_id='.$_GET['sub_component_id'] : ''; ?>" class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </a>
                        </div>
                     </form>
                      </div>
                    </div>
                    <div class="tablescroll">
                     <form method="post">
                      <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th style="text-align: center; width:5%; " data-field=""> <div class="th-inner ">Id</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:20%;" data-field="AgencyName"> <div class="th-inner sortable both">Image</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:35%; " data-field="AgencyName"> <div class="th-inner sortable both">DCFD Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:15%; " data-field="AgencyName"> <div class="th-inner sortable both">Product</div>
                              <div class="fht-cell"></div>
                            </th>

                            <th style="text-align: center; width:25%; " data-field="AgencyName"> <div class="th-inner sortable both">Action</div>
                              <div class="fht-cell"></div>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="append_data">
                      <?php 
                        $i=1;
                        $delete_url = "";
                        while ($row = $queryResult->fetch_assoc()) 
                        {
                            $product_id = $row['product_id'];
                            $delete_url = "./insert-update.php?id=".$row['id'].'-delete';
                         ?>
                          <tr data-index="0" data-uniqueid="2">
                            <td  style="width: 5%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>
                            <td style="width: 20%; text-align: center;" >
                              <a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit">
                                <?php
                                  if(!empty(trim($row['image'])))
                                  { ?>
                                    <img  style="height:70px;width:auto" src="assets/uploads/coa-sample-assembly/<?php echo $row['image']; ?>"></img>
                                  <?php } 
                                  else
                                  { ?>  
                                      <span id="pdfset" class="fa fa-file-pdf"></span>

                                <?php } ?>
                              </a>
                            </td>
                            <td style="width: 35%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name'];  ?></a></td>
                            <td style="width: 15%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $product_id;  ?></a></td>
                            <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                              <td style="text-align: center;width: 25% ">
                                <a style="cursor: pointer; color:#a31c89;padding:15px; font-size:18px" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                <a style="color:#a31c89; font-size:17px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the DCFD ?')">
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


$(document).ready( function () 
{
    $(document).on("click",".submit_search",function()
    {
        var DCFDName =  $(".DCFDName option:selected").val();
        var product  = $(".product").val();
        var searchinput = $(".search-input").val();

       
         $.ajax({
            url:"insert-update.php",  
            type: "post", 
            data: $('#search_data_live').serialize(),
            success:function(result)
            {
                $(".append_data").html("");
                $(".append_data").html(result);
            }
        });
    })

  <?php
      if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
          echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
          unset($_SESSION['toast_list']);
      }
  ?>

  dataTable = $('table.data-table').DataTable({
          "oLanguage": {
              "sEmptyTable": "Record Not Found !",                 
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