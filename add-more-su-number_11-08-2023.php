<?php
include("config/config.php");
include("queries/common_queries.php");
require("common/class/common.php");
include("config/auth_token.php");
include ('queries/add-edit-product-query.php');

if(!empty($_POST['edit_table_id'])){ $edit_table_id  = $_POST['edit_table_id']; } else{ $edit_table_id  = ''; } 


$action = $_REQUEST['action'];
$select_assembly = "SELECT * FROM tbl_su_assembly";
$queryVendor   = selectQuery($connection, $select_assembly);
// if($type =='DCFD')
// {
//     $coaSampleArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $edit_table_id,'type' => 'DCFD'));
// }
if($action=='onloadevent')
{
    $sub_component_id_fk = array();
   

    if($edit_table_id!='')
    {
        $coaSampleArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $edit_table_id,'type' => 'DCFD'));
        
        while ($coaVal = $coaSampleArray->fetch_assoc()) 
        {
            array_push($sub_component_id_fk,$coaVal['sub_component_id_fk']);
        }

        $total_data = $coaSampleArray->num_rows;
        
        for($i=0;$i<$total_data;$i++) 
        {  
        
            $select_assembly_data = "SELECT * FROM tbl_su_assembly";
            $queryVendor_data   = selectQuery($connection, $select_assembly_data);
            ?>
                <div class="remove_<?php echo $i;  ?>">
                        <span>SU Number</span>
                        <select style="width:50%" data-id=<?php echo $i; ?> name='sub_component_id[]' id="subcomp_<?php echo $sub_component_id_fk[$i]; ?>" class="form-control sub_component_id_onchange" placeholder="Select Sub Component">
                            <option value=""></option>
                            <?php 
                                while ($rows2 = $queryVendor_data->fetch_assoc()) 
                                { ?>
                                    <option value="<?php echo $rows2['id']; ?>"><?php echo $rows2['name']; ?></option>
                                <?php }?>
                        </select>
                        <div class="view" style="margin-top: -30px; margin-left: 52px;">
                            <a class="" href="./add-edit-assembly.php?id=<?php echo $sub_component_id_fk[$i]; ?>" target="_blank" style="margin-top:-2cm;margin-left:6cm;">View</a>
                            <?php if($i!='0') { ?>
                            <a href="#" data-id="<?php echo $i; ?>" class="delete_div remove-field-margin btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a>
                            <?php } ?>
                           
                           <input type="hidden" value=<?php echo $i; ?> class="last_recordadded_ids " />

                              
                        </div>
                        <br>
                </div>
    <?php } 
    } 

}
else if($action='addmorebuttonclick')
{   
    

?>
    <div class="remove">   
        <span>SU Number</span>
        <select style="width:50%" data-id="0"  name='sub_component_id[]' id="subcomp_0" class="form-control sub_component_id_onchange" placeholder="Select Sub Component">
            <option value=""></option>
            <?php 
                while ($rows1 = $queryVendor->fetch_assoc()) 
                { ?>
                    <option value="<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></option>
                <?php }?>
        </select>
        <div class="view" style="margin-top: -30px; margin-left: 52%;">
            <a href="#" class="closebtn remove-field-margin btn-remove-customer1 inline_field" style="color:red;"><i class="fa fa-times "></i></a> 
        </div><br>
    </div>

<?php }


?>
