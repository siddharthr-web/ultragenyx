<?php 
include('header.php');
include ('queries/add-edit-product-query.php');
include('selected_details.php');

  $dataArray    = getAllRecords($connection, 'tbl_sub_component', array('is_active'=>1));
  $select_assembly = "SELECT * FROM tbl_su_assembly";
  $queryassembly   = selectQuery($connection, $select_assembly);
  $isAddEdit    = (!isset($_GET['id']) || $subComponentArray->num_rows==0) ? 'add' : 'edit';
  $selectQ      = "SELECT * FROM tbl_dcfd where id='".$_GET['id']."'";
  $queryResult  = selectQuery($connection, $selectQ);
  $result       = array();
  while ($row = $queryResult->fetch_assoc()) 
  {
      array_push($result, $row);
  }
  $name         = $result[0]['name'];
  if(trim($result[0]['image']!==''))
  {
    $image      = trim($result[0]['image']);
  }
  else
  {
    $image        = '';
  }
  $pdf          = $result[0]['pdf'];
  $process_id   = explode(',',$result[0]['process_id']);

  $path         = explode(".",$pdf);
  $extens       = $path[1]; 
  $product_id   = explode(",",$result[0]['product_id']);

  $sub_component_id_fk = array();
  $assembly_id_fk = $_GET['id'];
  $coaSampleArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $assembly_id_fk,'type' => 'DCFD'));
        
  while ($coaVal = $coaSampleArray->fetch_assoc()) 
  {
      array_push($sub_component_id_fk,$coaVal['sub_component_id_fk']);
  }
  $dcfdPdfs     = getAllRecords($connection, 'tbl_dcfd_drawing_of_assembly', array( 'dcfd_id' =>  $_GET['id'], 'is_active'=>1));
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

  .remove-field2_edit, .remove-field2{
      margin-left: 10px;
    }

    .remove-field-margin{
      margin-left: 10px;
    }
  #pdfset
  {
    font-size: 40px;
    padding: 5px;
    color: #e52424;
  }
  #view_data_set_0
  {
    margin-left: -2cm;
    margin-top: -1cm;
  }
  .select2-container--default.select2-container--disabled .select2-selection__choice__remove {
    display: block;
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
      /*font-size: 14px;*/
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
  .view_datas_0
  {
    margin-left: 97%;
    margin-top: -24%;
  }
  
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <form class="form" name="form_product " id="form_product" method="POST" action="insert-update.php" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp; <?php echo isset($_GET['id']) ? "DCFD - Edit": "DCFD - Add"; ?></h3>
              <div class="card-tools">
                <a href="./dcfd.php" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
              </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="control-label">Name</label>: <span class="requireClass">*</span>
                      <input type="text" name="name" id="name" class="form-control validate[required] name_validation" placeholder="Enter DCFD Name" value="<?php if(!empty($name)) { echo $name; }; ?>" <?php echo $disabled ?>>   
                      <span class="name_error" style="color:red;display:none">Please Enter Name</span>         
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                          <label class="control-label">Product</label>:
                          <div class="selectBox product_click" > 
                            <select class="form-control" <?php echo $disabled ?>> 
                                <option><?php echo ($selectedProductsString=="") ? "Select Product" : $selectedProductsString; ?></option> 
                            </select> 
                            <div class="overSelect"></div> 
                          </div>
                          <input type="hidden" class="show_hide_product" value="0"/>
                      <div id="checkBoxes2"> 
                              <?php 
                                  $i=1; 
                                foreach ($allProduct as $value) { 
                              ?>
                              <label for="product_<?php echo $i; ?>"> 
                                  <input type="checkbox" name="product_id_fk[]" id="product_<?php echo $i; ?>" value="<?php echo $value['name']; ?>" <?php echo in_array($value['name'], $product_id) ? "checked" : ""; ?> <?php echo $disabled ?>/> 
                                  <?php echo $value['name']; ?> 
                              </label> 
                          <?php $i++; } ?>
                      </div> 
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Image Upload</label>:
                                <input name="image" id="drawing_of_assembly" class="form-control" type="file"  <?php echo $disabled ?>>
                              <?php if(isset($_GET['id']) && !empty($image)){ ?>
                                 <img style="padding: 9px;" src="assets/uploads/coa-sample-assembly/<?php echo $image; ?>" height="80">
                              <?php } ?> 
                          <input type="hidden" name="images" value="<?php if(!empty($image)){ echo $image; } ?> " />
                          <input type="hidden" name="id" value="<?php if($_GET['id']!=""){ echo $_GET['id']; } ?> "/>
                          <input type="hidden" name="type" value="DCFD" />
                      </div>
                    </div>
                    <!-- **************************************Process************************************** -->
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="control-label">Process</label>: <br>
                        <select class="process_id_fk_dcfd form-control" name="process_id[]" multiple="multiple" <?php echo $disabled ?>>
                          <?php
                              foreach ($allProcess as $key => $value) 
                              { 
                                ?>
                                <option 
                                <?php 
                                if (in_array($value['id'],$process_id))
                                { 
                                  echo 'selected'; 
                                } 
                                ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?> </option>
                          <?php }  ?>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <!-- <label class="control-label">Sub Component</label>:  -->
                  <?php if($id!="" && mysqli_num_rows($dcfdPdfs)!=0){  
                        $i=0;
                        while ($pdf = $dcfdPdfs->fetch_assoc()) { 
                                $pdfId = $pdf["id"];
                                $pdfFileName = $pdf["drawing_of_assembly_pdf"];
                        ?>

                  <div class="customer_records2_edit form-inline" style="margin-top: 5px;">
                    <label> <?php echo ($i==0) ? "<span>PDF File</span>" : ""; ?>
                  <input type="" class="form-control" name="saved_pdfs[]" id="saved_pdfs_<?php echo $pdfId; ?>" value="<?php echo $pdfFileName; ?>" readonly />
                  </label>
                  <div class="export btn-group">
                        <a href="<?php echo SITE_URL.'assets/uploads/dcfd_Pdf/'.$pdfFileName; ?>" class="btn btn-primary" aria-label="Export" type="button" title="Export data" download><i class="fa fa-download"></i></a>
                  </div>
                  <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>     
                    <a href="#" class="remove-field2_edit btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
                  <?php } ?>
                        <!-- <br> -->
                  </div>
              <?php  
                  $i++;
                    } 
                  }  
              ?> 
            </div>
            </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="customer_records2 form-inline">
                        <label><span>Pdf Upload</span>
                          <input name="drawing_of_assembly[]" id="drawing_of_assembly" class="form-control" type="file" accept = "application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" <?php echo $disabled ?> />
                        </label>
                      </div>
                      <div class="customer_records_dynamic2"></div>
                  </div>
              </div>
              <div class="row">
                <?php if(isset($_SESSION['LOGIN']['user_id'])) { ?>
                  <div class="col-md-12">
                      <a class="btn btn-primary extra-fields-customer2 float-right" style="color:white;     margin-top: -40px; margin-right: 25px; background: blue;"><i class="fa fa-plus"></i></a>
                  </div>
                <?php } ?>
              </div>
              </div>
            </div>
            <!-- **********************add Mor Row Adde******************** -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">SU Number</h3>            
                </div>
                <div class="card-body sub-component-div">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="appenddata2">
                            <span>SU Number</span>
                            <select style='width:50%;' data-id="0"  name='sub_component_id[]' id="subcomp_0" class="form-control sub_component_id_onchange" placeholder="Select Sub Component" <?php echo $disabled ?>>
                              <option value=""></option>
                              <?php 
                                while ($rows1 = $queryassembly->fetch_assoc()) 
                                { ?>
                                    <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></option>
                                <?php }?>
                            </select> <br>
                        </div>
                        <div class="appenddata1"></div>
                    </div>

                    <div class="col-md-2">
                      <!-- <div class="view_datas">
                          <span></span>
                      </div>   -->
                    </div>
                    <div class="col-md-6">
                    </div>
          
                  </div>
                  <div class="row">
                    <?php if(isset($_SESSION['LOGIN']['user_id'])) { ?>
                    <div class="col-md-12">
                      <a class="btn btn-primary extra-fields-customer1 float-right" style="color:white; margin-top: -40px; margin-right: 25px;"><i class="fa fa-plus"></i></a>
                      <input type="hidden" value="" class="last_recordadded_id" />
                      <?php } ?>
                  </div>
                </div>
            </div>
            <!-- ********************footer data***************** -->
            <div class="card-footer">
              <?php if(isset($_SESSION['LOGIN']['user_id'])){ ?>
                  <input type="button" name="submit" id="submit" class="btn btn-primary save_data" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
              <?php } ?>
              <input style="display: none;" type="submit" name="submit" id="submit" class="btn btn-primary form_submit" value="<?php echo isset($_GET['id']) ? 'Update': 'Add'; ?>">
              <a class="btn btn-default white mr-0" href="./dcfd.php"><i class="ft ft-x-circle"></i> Cancel</a>
              <div id="submit_msg" style="color:red;"></div>
            </div>  
        </form>  
      </section>
    </section>
  </div>
  <?php include('footer.php'); ?>

<script type="text/javascript">
$(document).ready(function() 
{
  $(".process_id_fk_dcfd").select2({
    placeholder: "Select Process",
    allowClear: true
  });
  // **********************************add more row added****************

  //**********************onload event to data fill formate********************************
  var id          = "<?php  if(!empty($_GET['id'])){ echo $_GET['id'];  }  ?>";
  var arrayFromPHP = <?php echo json_encode($sub_component_id_fk); ?>;
    $.ajax({
            url:"add-more-su-number.php",  
            type: "post", 
            data: {'action':'onloadevent','edit_table_id':id,},
            success:function(result)
            {
              setTimeout(() => {
                $.each(arrayFromPHP, function (i, elem) {
                  $('#subcomp_'+elem).val(elem).trigger("change");
                });
              },800);
            


              $(".appenddata1").append(result);
              if(id!='')
              {
                $(".appenddata2").html('');
              }
           

        
              // setTimeout(() => {
              //     for(var i=0; i<result.length-1;i++)
              //     {
              //       $(".extra-fields-customer1").trigger("click");
              //     }  
              // },200)
              // setTimeout(() => {
                
              //   for(var i=0; i<result.length;i++)
              //   {
              //     if(i==0)
              //     {
              //       $('#subcomp_'+i).val(result[i]).trigger("change");
              //       $(".view_datas").append('<a style="text-align: inherit;margin-top:20px" class="form-control btn btnprimary" href="./add-edit-assembly.php?id='+result[i]+'" target="_blank">View</a>')
              //     }
                 
              //   }  
              // },500);
            }
        });

    let i = 0
    $(document).on("click",".extra-fields-customer1",function()
    { 

      $.ajax({
            url:"add-more-su-number.php",  
            type: "post", 
            data: {'action':'addmorebuttonclick','id':i,},
            success:function(result)
            {
              $(".appenddata1").append(result);
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
              // $('#ph_range_'+id).val(result.ph_min+'-'+result.ph_max);
              // $('#temp_range_'+id).val(result.temp_min+'-'+result.temp_max);
              // $('#pressure_range_'+id).val(result.pressure_min+'-'+result.pressure_max);
              // $('#volume_range_'+id).val(result.volume_min+'-'+result.volume_max);
              // $('#flow_rate_range_'+id).val(result.flow_rate_min+'-'+result.flow_rate_max);
              // $('.inline_field_'+id).val(result.flow_rate_min+'-'+result.flow_rate_max);
              // $('#type_'+id).val(result.type);
            }
        });
    })

    $('.extra-fields-customer2').click(function() {
      $('.customer_records2').clone().find("input").val("").end().appendTo('.customer_records_dynamic2');
      $('.customer_records_dynamic2 .customer_records2').addClass('form-inline single remove2').append('<a href="#" class="remove-field2 btn-remove-customer2 inline_field" style="color:red;"><i class="fa fa-times "></i></a>');
      $('.customer_records_dynamic2 .customer_records2 span').remove();
      // $('.single .row')
      $('.customer_records_dynamic2 > .single').attr("class", "remove2 form-inline");

      $('.customer_records_dynamic2 input').each(function() {
        var count = 0;
        var fieldId = $(this).attr("id");
        $(this).attr('id', fieldId + count);
        count++;
      });
    });
    $(document).on('click', '.remove-field2', function(e) {
      $(this).parent().remove();
      e.preventDefault();
    });
    $(document).on('click', '.remove-field2_edit', function(e) {
      $(this).parent().remove();
      e.preventDefault();
    });

    $(document).on('click', '.delete_div', function(e) {
      var id = $(this).data("id");
      $(".remove_"+id).remove();
    });

    $(document).on('click', '.closebtn', function(e) {
     
      $(this).parent().parent().remove();
    });

    

//   var $option = $("<option selected></option>").val('9').text("Heat Inactivation");
// $('#select_id').append($option).trigger('change');
// $(".process_id_fk_dcfd").select2().val("9").trigger("change")

  // var show3 = true;

  // $(document).on("click",'.select_process',function()
  // {
  //   var checkboxes =  document.getElementById('checkBoxes3'); 
  
  //   if (show3) 
  //   { 
  //       checkboxes.style.display = "block"; 
  //       show3 = false; 
  //   } 
  //   else 
  //   { 
  //       checkboxes.style.display = "none"; 
  //       show3 = true; 
  //   } 
  // });

  <?php
      if(!empty($_SESSION['toast_list']) && isset($_SESSION['toast_list']) && !empty($_SESSION['toast_list']['type'])){
          echo 'toastr.'.$_SESSION['toast_list']['type'].'("'.$_SESSION['toast_list']['message'].'");'; 
          unset($_SESSION['toast_list']);
      }
  ?>
    $(document).on("click",".product_click",function()
    {
      var checkboxes1 = $(".show_hide_product").val(); 
      var checkboxes  = document.getElementById("checkBoxes2");
  
      if (checkboxes1=='0') 
      { 
          $(".show_hide_product").val("1");
          checkboxes.style.display = "block"; 
     
      } else 
      {
        $(".show_hide_product").val("0");
        checkboxes.style.display = "none"; 
      }

    })

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










