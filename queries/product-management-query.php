<?php
$table = "tbl_sub_component";
$materialSearchArray = isset($_POST['material_id_fk']) ? $_POST['material_id_fk']: array();
$manufacturerSearchArray = isset($_POST['manufacturer_id_fk']) ? $_POST['manufacturer_id_fk']: array();
$processSearchArray = isset($_POST['process_id_fk']) ? $_POST['process_id_fk']: array();
$productSearchArray = isset($_POST['product_id_fk']) ? $_POST['product_id_fk']: array();
$whereCondition = "";

if(isset($_POST['submit_search'])){

  $field = isset($_POST['field']) ? $_POST['field'] : "";
  
  if($_POST['field'] == "material")
	 $field = "materials";
  if($_POST['field'] == "manufacturer")
	 $field = "manufacturers";
  if($_POST['field'] == "process")
	 $field = "processes";
  if($_POST['field'] == "product")
	 $field = "products";
  if($_POST['field'] == "equipment")
   $field = "equipments";

  $search = $_POST['search'];

  if(is_numeric($search)) {
      if($_POST['operation']==1) //begins with
        $whereCondition = " ".$field." LIKE '".$search."%' ";
      elseif ($_POST['operation']==2) //contains
          $whereCondition = " ".$field." LIKE '%".$search."%' ";
      elseif ($_POST['operation']==3) //Does Not Contains
        $whereCondition = " ".$field." NOT LIKE '%".$search."%' ";
      elseif ($_POST['operation']==4) //Ends With
        $whereCondition = " ".$field." LIKE '%".$search."' ";
      elseif ($_POST['operation']==5) //Equal To
        $whereCondition = " ".$field." = ".$search;
      elseif ($_POST['operation']==6) //Greater Than
        $whereCondition = " ".$field." > ".$search;
      elseif ($_POST['operation']==7) //Greater Than Or Equal To
        $whereCondition = " ".$field." >= ".$search;
      elseif ($_POST['operation']==8) //Less Than
        $whereCondition = " ".$field." < ".$search;
      elseif ($_POST['operation']==9) //Less Than Or Equal To
        $whereCondition = " ".$field." <= ".$search;
      elseif ($_POST['operation']==10) //Not Equal To
        $whereCondition = " ".$field." != ".$search;
  }else{
      if($_POST['operation']==1) //begins with
        $whereCondition = " ".$field." LIKE '".$search."%' ";
      elseif ($_POST['operation']==2) //contains
        $whereCondition = " ".$field." LIKE '%".$search."%' ";
      elseif ($_POST['operation']==3) //Does Not Contains
        $whereCondition = " ".$field." NOT LIKE '%".$search."%' ";
      elseif ($_POST['operation']==4) //Ends With
        $whereCondition = " ".$field." LIKE '%".$search."' ";
      elseif ($_POST['operation']==5) //Equal To
        $whereCondition = " ".$field." = '".$search."' ";
      elseif ($_POST['operation']==6) //Greater Than
        $whereCondition = " ".$field." > '".$search."' ";
      elseif ($_POST['operation']==7) //Greater Than Or Equal To
        $whereCondition = " ".$field." >= '".$search."' ";
      elseif ($_POST['operation']==8) //Less Than
        $whereCondition = " ".$field." < '".$search."' ";
      elseif ($_POST['operation']==9) //Less Than Or Equal To
        $whereCondition = " ".$field." <= '".$search."' ";
      elseif ($_POST['operation']==10) //Not Equal To
        $whereCondition = " ".$field." != '".$search."' ";
  }

}

// Show list on count click from sub-component start
if(isset($_GET['sub_component_id'])) {
     $subComponentIds = getAllIds($connection, 'tbl_assembly_sub_component', 'assembly_id_fk', array('sub_component_id_fk' => $_GET['sub_component_id']));
     $subComponentIds = (count($subComponentIds) > 0) ? implode(",",$subComponentIds) : "";

      if($subComponentIds!="") {
        $whereCondition = ($whereCondition!="") ? $whereCondition." AND `id` IN (".$subComponentIds.") " : " `id` IN (".$subComponentIds.") ";
      }else{
        $whereCondition = " 1=0 ";
      }

  }
// Show list on count click from sub-component end

  $whereCondition = ($whereCondition!="") ? " WHERE ".$whereCondition : "";
  // echo $whereCondition; die;
$selectQ = "
SELECT * FROM (
SELECT ta.* , ty.name as type, ma.name as manufacturer,
    (
    SELECT GROUP_CONCAT(mat.name SEPARATOR ', ') as all_materials 
      FROM parent_material as pm 
      LEFT JOIN materials as mat ON mat.id = pm.material_id 
    WHERE pm.parent_id=ta.id AND pm.check_flag = 'assembly'
    ) as  materials,
    (
    SELECT GROUP_CONCAT(man.name SEPARATOR ', ') as all_manufacturer 
      FROM parent_manufacturer as p_man 
      LEFT JOIN manufacturer as man ON man.id = p_man.manufacturer_id 
    WHERE p_man.parent_id=ta.id AND p_man.check_flag = 'assembly'
    ) as  manufacturers,
    (
    SELECT GROUP_CONCAT(proc.name SEPARATOR ', ') as all_process 
      FROM parent_process as p_process 
      LEFT JOIN process as proc ON proc.id = p_process.process_id 
    WHERE p_process.parent_id=ta.id AND p_process.check_flag = 'assembly'
    ) as  processes,
    (
    SELECT GROUP_CONCAT(prod.name SEPARATOR ', ') as all_products 
      FROM parent_product as p_product 
      LEFT JOIN product as prod ON prod.id = p_product.product_id 
    WHERE p_product.parent_id=ta.id AND p_product.check_flag = 'assembly'
    ) as  products,
    (
    SELECT GROUP_CONCAT(eq.name SEPARATOR ', ') as all_equipments 
      FROM parent_equipment as p_equipment 
      LEFT JOIN equipment as eq ON eq.id = p_equipment.equipment_id 
    WHERE p_equipment.parent_id=ta.id AND p_equipment.check_flag = 'assembly'
    ) as  equipments
  FROM tbl_assembly ta 
 LEFT JOIN type as ty ON ty.id= ta.type_id
 LEFT JOIN manufacturer as ma ON ma.id= ta.manufacturer_id
) as tbl   
$whereCondition
 ORDER BY id DESC";

$allRecords = selectQuery($connection, $selectQ);

$materialList = getAllRecords($connection, "materials");
$manufacturerList = getAllRecords($connection, "manufacturer");
$processList = getAllRecords($connection, "process");
$productList = getAllRecords($connection, "product");

?>