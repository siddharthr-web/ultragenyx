<?php
include("config/config.php");
include("queries/common_queries.php");
require("common/class/common.php");
// include("config/auth_token.php");
include ('queries/add-edit-product-query.php');
include('selected_details.php');

// error_reporting(0);
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
// error_reporting(E_ALL);
// ini_set("error_reporting", E_ALL);



$action                 = $_POST['action'];
if(!empty($_POST['sub_component_id'])){ $sub_component_id  = $_POST['sub_component_id']; } else{ $sub_component_id  = ''; } 
if(!empty($_POST['edit_table_id'])){ $edit_table_id  = $_POST['edit_table_id']; } else{ $edit_table_id  = ''; } 
if(!empty($_POST['type_dcfd'])){ $type_dcfd  = $_POST['type_dcfd']; } else{ $type_dcfd  = ''; } 
if($type_dcfd=='DCFD'){ $margin = 'margin-left: -10px !important;'; } else { $margin = ''; }
if(!empty($_POST['type'])){ $type  = $_POST['type']; } else{ $type  = ''; } 
if(!empty($_POST['id'])){ $id  = $_POST['id']+1; } else{ $id  = ''; } 


$subComponentDropdown           = $subComponentDropdown; 

if($action=='action_change')
{
    $result = array();
    if($sub_component_id!="")
    {
        $selectQ = "SELECT sc.*, t.name as type FROM tbl_assembly as sc
        LEFT JOIN type as t ON t.id = sc.type_id 
        WHERE sc.id = $sub_component_id";

        $queryResult = selectQuery($connection, $selectQ);
        while ($row = $queryResult->fetch_assoc()) 
        {
            array_push($result, $row);
        }
        echo json_encode($result[0]);
    }
    else
    {
        if($type =='DCFD')
        {
            $coaSampleArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $edit_table_id,'type' => 'DCFD'));
        }
        else
        {
            $coaSampleArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $edit_table_id,'type' => 'assembly'));
        }
        $data = array();
        while ($coaVal = $coaSampleArray->fetch_assoc()) 
        {
            array_push($data,$coaVal['sub_component_id_fk']);
        }
        sort($data);
        echo json_encode($data);
    }
}
else if($type_dcfd=='DCFD')
{ 
    $select_assembly = "SELECT * FROM tbl_su_assembly";
    $queryVendor   = selectQuery($connection, $select_assembly);
?>
    <div class="remove_<?php echo $id;  ?> form-inline" style="margin-top: 10px; margin-left:0px;">
        <label>
            <select name="sub_component_id[]" data-id="<?php echo $id; ?>" id="subcomp_<?php echo $id; ?>" class="form-control sub_component_id_onchange" placeholder="Select Sub Component" style="<?php echo $margin; ?>">
                <option value=""></option>
                <?php 
                while ($rows1 = $queryVendor->fetch_assoc()) 
                { ?>
                    <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></option>
               <?php }?>
            </select>
        </label>
        <div class="view_datas_<?php echo $id; ?>">
        </div>
        <a href="#" data-id="<?php echo $id; ?>" class="delete_div remove-field-margin btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
    </div>

<?php } 
else
{   
    $select_vendor = "SELECT * FROM tbl_assembly where is_active !='inactive'";
    $queryVendor   = selectQuery($connection, $select_vendor);
    ?>
    <div class="remove_<?php echo $id;  ?> form-inline" style="margin-top: 10px;">
    <br>
        <label>
            <select name="sub_component_id[]" data-id="<?php echo $id; ?>" id="subcomp_<?php echo $id; ?>" class="form-control sub_component_id_onchange" placeholder="Select Sub Component" style="<?php echo $margin; ?>">
                <option value=""></option>
                <?php 
                while ($rows1 = $queryVendor->fetch_assoc()) 
                { ?>
                    <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></option>
               <?php }?>
            </select>
        </label>
        <label>
            <input type="text" readonly="" class="form-control inline_field subcomp-input" name="" placeholder="pH Range" id="ph_range_<?php echo $id; ?>" style="margin-left:12px;">
        </label>
        <label>
            <input type="text" class="form-control inline_field subcomp-input" name="" readonly="" placeholder="Temp Range" id="temp_range_<?php echo $id; ?>">
        </label>
        <label>
            <input type="text" readonly="" class="form-control inline_field subcomp-input" name="" placeholder="Pressure Range" id="pressure_range_<?php echo $id; ?>">
        </label>
        <label>
            <input type="text" class="form-control inline_field subcomp-input" readonly="" name="" placeholder="Volume Range" id="volume_range_<?php echo $id; ?>">
        </label>
        <label>
            <input type="text" readonly="" class="form-control inline_field subcomp-input" name="" placeholder="Flow Rate Range" id="flow_rate_range_<?php echo $id; ?>">
        </label>
        <label>
            <input type="text" class="form-control inline_field subcomp-input" readonly="" name="" placeholder="Type" id="type_<?php echo $id; ?>">
        </label>
        <div class="view_data_<?php echo $id; ?>">
        </div>

        <a href="#" data-id="<?php echo $id; ?>" class="delete_div remove-field-margin btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
    </div>
<?php }
?>

