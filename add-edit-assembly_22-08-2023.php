<?php 
include('header.php');
include ('queries/add-edit-product-query.php');
// include('selected_details.php');

  $dataArray = getAllRecords($connection, 'tbl_sub_component', array('is_active'=>1));
  //  error_reporting(E_ALL);
	// ini_set('display_errors',1);

  $select_vendor  = "SELECT * FROM tbl_assembly where is_active !='inactive'";
  $queryVendor    = selectQuery($connection, $select_vendor);
  $isAddEdit      = (!isset($_GET['id']) || $subComponentArray->num_rows==0) ? 'add' : 'edit';

  $selectQ = "SELECT * FROM tbl_su_assembly where id='".$_GET['id']."'";
  $queryResult = selectQuery($connection, $selectQ);
  $result = array();
  while ($row = $queryResult->fetch_assoc()) 
  {
      array_push($result, $row);
  } 
  $name           = $result[0]['name'];
  $image          = $result[0]['image'];
  $dcfd_id        = $result[0]['dcfd_id'];
  $dcfd_id_array  = explode(",",$result[0]['dcfd_id']);

// *************************************************************************************
  $query = "SELECT * FROM tbl_dcfd";
  $queryResults = selectQuery($connection, $query);

  $disabled = (isset($_SESSION['LOGIN']['user_id']) && !empty($_SESSION['LOGIN']['user_id'])) ? "" : "disabled";

?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> -->
  <style type="text/css">
    @media print {
    body * {
      visibility: hidden;
    }
    #section-to-print, #section-to-print * {
      visibility: visible;
    /*display: none;*/
    }
    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }

  #section-to-print {
      visibility: hidden;
  }

  .remove-field2_edit, .remove-field2{
      margin-left: 10px;
    }

  .remove-field-margin{
    margin-left: 10px;
  }
  /* ************************SELECT 2********************** */
  .select2-search__field
  {
    width: 2px !important;
    height: 26px !important;
  }
  .select2-selection__choice
  {
    color:black !important;
  }
  </style>
  <style> 
        .selectBox { 
            position: relative; 
        } 
  
        .selectBox select { 
            width: 100%; 
            font-weight: bold; 
        } 
  
        .overSelect { 
            position: absolute; 
            left: 0; 
            right: 0; 
            top: 0; 
            bottom: 0; 
        } 
  
        #checkBoxes { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes1 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes1 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes1 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes2 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes2 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes2 label:hover { 
            background-color: #E2E2E2; 
        }

        #checkBoxes3 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes3 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes3 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #E2E2E2; 
        } 

        #checkBoxes4 { 
            display: none; 
            border: 1px #DEDEDE solid; 
        } 
  
        #checkBoxes4 label { 
            display: block; 
            margin-left: 5px;
        } 
  
        #checkBoxes4 label:hover { 
            background-color: #E2E2E2; 
        } 

      .card .card-body .customer_records1{
        margin-top: 10px;
      }

      .card .card-body .customer_records1.form-inline label{
        display: flex;
        flex-direction: column;
        margin-left: 10px;
        align-items: flex-start;
        font-size: 14px;
      }

      .card .card-body .customer_records1.form-inline label input{
        margin-left: 0px;
      }

      .customer_records{
        margin-top: 10px;
      }

      .card .card-body .customer_records_dynamic1 label{
        display: flex;
        flex-direction: column;
        margin-left: 10px;
        align-items: flex-start;
        font-size: 14px;
      }

      .card .card-body .customer_records_dynamic1 label input{
        margin-left: 0px;
      }


    .card .card-body .customer_records2 label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
      /*font-size: 14px;*/
    }

    .card .card-body .customer_records2 label input{
      margin-left: 0px;
    }

    .card .card-body .customer_records2_edit label{
      display: flex;
      flex-direction: column;
      margin-left: 10px;
      align-items: flex-start;
    }

    .card .card-body .customer_records2_edit label input{
      margin-left: 0px;
    }

    .card .card-body .customer_records_dynamic2 label{
      margin-left: 10px;
    }

    .card .card-body .customer_records_dynamic2 label input{
      margin-left: 0px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display 
    {
      cursor: default;
      padding-left: 2px;
      padding-right: 5px;
      margin-left: 6px;
    }
    .select2-selection__choice__remove
    {
      color:red !important;
    }
  .selectize-input {
    width: 200px !important;
  }

  /*.inline_field{
    margin-left: 10px;
  }*/

  .remove1{
    margin-top: 10px;
  }

  .remove2 {
    margin-top: 10px;
  }

  .remove3 {
    margin-top: 10px;
  }
  
  .remove4 {
    margin-top: 10px;
  }

  .remove5 {
    margin-top: 10px;
  }

  .remove6 {
    margin-top: 10px;
  }

  .leach {
    margin-left: 5px;
  }

  .btnprimary{
    color: blue;
  }

  .export{
    margin-left: 10px;
  }

  .range_field{
    width: 100px !important;
  }

  .other_field{
    width: 250px !important;
  }

  .chem_input {
    width: 280px !important;
  }

  .subcomp-input{
    width: 100px !important;
  }
  .input-group-addon {
    padding: 10px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    width: -12%;
    display: table-cell;
}

.one01 {
  margin-left: 47px;
  width: 92%;
  margin-top: -5%;
}

</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <form class="form" name="form_product " id="form_product" method="POST" action="insert-update.php" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo isset($_GET['id']) ? "SU Number - Edit": "SU Number - Add"; ?></h3>
              <div class="card-tools">
                <a href="./assembly.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
              </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="control-label">Name</label>: <span class="requireClass">*</span>
                      <!-- <span class="input-group-addon form-control">SU-</span>
                      <input type="number" name="name" id="name" class="one01 form-control validate[required] name_validation" placeholder="Enter Assembly Name" value="<?php if(!empty($name)) { echo $name; }; ?>" <?php echo $disabled; ?>>   -->
                      <input type="text" name="name" id="name" class="form-control validate[required] name_validation" placeholder="Enter Assembly Name" value="<?php if(!empty($name)) { echo $name; }; ?>" <?php echo $disabled; ?>>
                      <span class="name_error" style="color:red;display:none">Please Enter Number</span>         
                      </div>
                    </div>
                    <div class="col-md-6" style="display: none;">
                      <div class="form-group">
                      <label class="control-label">Parent (DCFD)</label>: <span class="requireClass"></span>
                        <select name="parent_dcfd[]" id="parent_dcfd" class="form-control" multiple="multiple" <?php echo $disabled; ?>>
                            <?php
                                 while ($rows = $queryResults->fetch_assoc()) 
                                 { ?>
                                    <option 
                                    <?php 
                                      if (in_array($rows['id'],$dcfd_id_array))
                                      { 
                                        echo 'selected'; 
                                      } 
                                      ?> 
                                    value=<?php echo $rows['id']; ?>><?php echo $rows['name']; ?></option>
                            <?php } ?>
                        </select>    
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Image Upload</label>:
                                <input name="image" id="drawing_of_assembly" class="form-control" type="file"  onchange="checkfile(this,'photo');" <?php echo $disabled; ?>>
                              <?php if(isset($_GET['id']) && $image!=""){ ?>
                                 <img style="padding: 9px;" src="assets/uploads/coa-sample-assembly/<?php echo $image; ?>" height="80">
                              <?php } ?> 
                          <input type="hidden" name="images" value="<?php if($image!=""){ echo $image; } ?> " />
                          <input type="hidden" name="id" value="<?php if($_GET['id']!=""){ echo $_GET['id']; } ?> "/>
                          <input type="hidden" name="type" value="ASSEBLY" />
                      </div>
                    </div>
                </div>
              </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Vendor Part</h3>            
                </div>
                <div class="card-body sub-component-div">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="customer_records1 form-inline">
                          <label>
                            <span>Vendor Part</span>
                              <select data-id="0"  name='sub_component_id[]' id="subcomp_0" class="form-control sub_component_id_onchange" placeholder="Select Sub Component" <?php echo $disabled; ?>>
                                  <option value=""></option>
                                  <?php 
                                     while ($rows1 = $queryVendor->fetch_assoc()) 
                                     { ?>
                                         <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></option>
                                     <?php }?>
                              </select> 
                          </label>
                            <label>
                              <span>pH Range</span>
                              <input type="text" class="form-control inline_field subcomp-input"  id="ph_range_0" placeholder="pH Range" readonly>
                            </label>
                            <label>
                              <span>Temp Range</span>
                              <input type="text" class="form-control inline_field subcomp-input"  id="temp_range_0" placeholder="Temp Range" readonly>
                            </label>
                            <label>
                              <span>Pressure Range</span>
                                  <input type="text" class="form-control inline_field subcomp-input"  id="pressure_range_0" placeholder="Pressure Range" readonly>
                                </label>
                            <label>
                              <span>Volume Range</span>
                                  <input type="text" class="form-control inline_field subcomp-input"  id="volume_range_0" placeholder="Volume Range" readonly>
                                </label>
                            <label>
                              <span>Flow Rate Range</span>
                                <input type="text" class="form-control inline_field subcomp-input"  id="flow_rate_range_0" placeholder="Flow Rate Range" readonly>
                            </label>
                            <label>
                              <span>Type</span>
                                <input type="text" class="form-control inline_field subcomp-input"  id="type_0" placeholder="Type" readonly>
                            </label>
                              <div class="view_data_0" style="margin-top: 24px;">

                              </div>

                            <div class="appenddata">
                            </div>
				                </div>
                      </div>
                  </div>
                  <div class="row">
                    <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                      <div class="col-md-12">
                        <a class="btn btn-primary extra-fields-customer1 float-right" style="color:white; margin-top: -40px; margin-right: 25px;"><i class="fa fa-plus"></i></a>
                        <input type="hidden" value="" class="last_recordadded_id" />
                      </div>
                    <?php } ?>

                </div>
            </div>
            <!-- *************************************Footer data ******************************************* -->
            <div class="card-footer">
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                  <input type="button" name="submit" id="submit" class="btn btn-primary save_data" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
              <?php } ?>
              <input style="display: none;" type="submit" name="submit" id="submit" class="btn btn-primary form_submit" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
              <a class="btn btn-default white mr-0" href="./assembly.php"><i class="ft ft-x-circle"></i> Cancel</a>
              <div id="submit_msg" style="color:red;"></div>
            </div> 
        </form>  
      </section>
    </section>
  </div>
  <?php include('footer.php'); ?>

<script type="text/javascript">
  
  function checkfile(sender, doctype="") {
      var validExts = doctype == "photo" ? new Array(".png", ".jpg", ".jpeg") : new Array(".pdf"); //,".doc",".docx"
      var fileExt = sender.value;
      fileExt = fileExt.substring(fileExt.lastIndexOf('.')).toLowerCase();
      var FileSize = sender.files[0].size / 1024 / 1024; // in MiB
      if (FileSize > 5) {
          alert('File size exceeds 5 MB');
          $(sender).val('');
          return false;
      } else {
          if (validExts.indexOf(fileExt) < 0) {
          alert("Valid file extensions are " + validExts.toString());
          $(sender).val('');
          return false;
          } else {
              $('#doc_type').val(doctype);
              return true;
          }
      }
    }

$(document).ready(function() 
{
    $("#parent_dcfd").select2({
      placeholder: "Select Process",
      allowClear: true
    });

    var arrayFromPHP          = "<?php if(isset($subComponentDropdown)){ echo $subComponentDropdown; } ?>";
    var subComponentDropdown  = "";
    subComponentDropdown      = arrayFromPHP;
    //**********************onload event to data fill formate********************************
    var id = "<?php if(!empty($_GET['id'])){ echo $_GET['id']; } ?>";
    $.ajax({
            url:"add-edit-assembly_add_more.php",  
            type: "post", 
            dataType: "json",
            async: false,
            data: {'action':'action_change','edit_table_id':id},
            success:function(result)
            {
              setTimeout(() => {
                  for(var i=0; i<result.length-1;i++)
                  {
                    $(".extra-fields-customer1").trigger("click");
                  }  
              },200)
              setTimeout(() => {
                for(var i=0; i<result.length;i++)
                  {
                    $('#subcomp_'+i).val(result[i]).trigger("change");
                    $(".view_data_"+i).append('<a class="form-control btn btnprimary" href="./add-edit-product.php?id='+result[i]+'" target="_blank">View</a>')
                  }  
              },500);
            }
        });
    let i = 0
    $(document).on("click",".extra-fields-customer1",function()
    { 
      $(".last_recordadded_id").val(i+1);
      $.ajax({
            url:"add-edit-assembly_add_more.php",  
            type: "post", 
            data: {'action': "clickchange",'id':i},
            success:function(result)
            {
              $(".appenddata").append(result);
            }
        });
        i++;
    })

    $(document).on("change",".sub_component_id_onchange",function()
    {
      var sub_component_id = $(this).val();
      var id  =  $(this).data("id");
    
      $.ajax({
            url:"add-edit-assembly_add_more.php",  
            type: "post", 
            dataType: "json",
            async: false,
            data: {'action':'action_change','sub_component_id':sub_component_id},
            success:function(result)
            {
              $('#ph_range_'+id).val(result.ph_min+'-'+result.ph_max);
              $('#temp_range_'+id).val(result.temp_min+'-'+result.temp_max);
              $('#pressure_range_'+id).val(result.pressure_min+'-'+result.pressure_max);
              $('#volume_range_'+id).val(result.volume_min+'-'+result.volume_max);
              $('#flow_rate_range_'+id).val(result.flow_rate_min+'-'+result.flow_rate_max);
              $('.inline_field_'+id).val(result.flow_rate_min+'-'+result.flow_rate_max);
              $('#type_'+id).val(result.type);
            }
        });
    })

    $(document).on('click', '.delete_div', function(e) {
      var id = $(this).data("id");
      $(".remove_"+id).remove();
    });

  <?php
      if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
          echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
          unset($_SESSION['toast_list']);
      }
  ?>
  
     $ (document).on("click",".save_data",function(e){
        e.preventDefault();
        var name = $(".name_validation").val();
        var error = true;
        if(name)
        {
           $(".name_error").hide();
        } 
        else
        {
          $(".name_error").show();
          var error = false;

        }
        if(error)
        {
            $(".form_submit").trigger("click");
        }

     })
});
</script>










