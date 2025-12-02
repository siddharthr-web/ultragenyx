<?php 
include('header.php');
include ('queries/product-management-query.php');

$selectQ = "SELECT * FROM tbl_subsu_assembly  ORDER BY id DESC";
$queryResult = selectQuery($connection, $selectQ);
?>
<style>
    .dataTables_empty
    {
        text-align: center;
    }
</style>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/multiselect_dropdown.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-tasks"></i>&nbsp; SubSU Numbers Management  </h3>
            <div class="card-tools">
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                <a href="./add-edit-subsu_assembly.php" id="Add" class="btn btn-primary btn-sm" onclick="GoToAdd()" style="color: white;"> <i class="fa fa-plus"></i> Add </a>
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
                              <input name="search" value="<?php echo isset($_POST['search']) ? $_POST['search']: ''; ?>" class="form-control search-input" type="text" placeholder="Search" autocomplete="off" required>
                              <button id="btn_search" class="btn btn-primary submit_search" type="button" name="submit_search" title="Search"> <i class="fa fa-search"></i> </button>
                              <input type="hidden" name="type_search" value="search_data_subsu_assembly"/>
                              <a href="./subsu_assembly.php<?php echo isset($_GET['sub_component_id']) ? '?sub_component_id='.$_GET['sub_component_id'] : ''; ?>" class="btn btn-primary" type="button" name="clearSearch" id="clearSearch" title="Clear Search"> <i class="fa fa-undo"></i> </a>
                            </div>
                        </form>
                      </div>
                    </div>
                    <div class="tablescroll">
                     <form method="post">
                      <table class="table table-striped table-bordered data-table" style="margin-top: 0px;">
                        <thead>
                          <tr>
                            <th data-field="" style="text-align: center; width:5% "> <div class="">Id</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:20% " data-field="AgencyName"> <div class="th-inner sortable both">Image</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:50% " data-field="AgencyName"> <div class="th-inner sortable both">Assembly Name</div>
                              <div class="fht-cell"></div>
                            </th>
                            <th style="text-align: center; width:25%" data-field="AgencyName"> <div class="th-inner sortable both">Action</div>
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
                            $delete_url = "./insert-update.php?id=".$row['id'].'-delete_subsu_assembly';
                         ?>
                          <tr data-index="0" data-uniqueid="2">
                            <td  style="width: 5%;"><a style="cursor: pointer;" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>

                            <td style="width:20%;"><a style="cursor: pointer;" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit">
                               <img  style="height:70px;width:auto" src="assets/uploads/coa-sample-assembly/<?php echo $row['image']; ?>"></img>
                            </a></td>

                            <td style="width:50% ;"><a style="cursor: pointer; width:30%" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php if(!empty($row['name'])){ echo $row['name']; } if(!empty($row['materials'])){ echo $row['materials']; }  ?></a></td>
                            <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                              <td style="width:25%;text-align:center">
                                <a style="cursor: pointer; color:#a31c89;padding:15px; font-size:20px" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>

                                <a style="color:#a31c89;font-size:18px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the SubSU Number ?')">
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
  $(document).on("click",".submit_search",function()
  {
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