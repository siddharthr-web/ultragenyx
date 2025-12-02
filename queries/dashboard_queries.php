<?php
// $selectQAssembly = "SELECT ta.* , eq.name as equipment_name, mf.name as manufacturer_name, pc.name as process_name, pr.name as product_name
// 	FROM tbl_assembly as ta
// LEFT JOIN equipment as eq ON eq.id = ta.equipment_id_fk
// LEFT JOIN manufacturer as mf ON mf.id = ta.manufacturer_id_fk
// LEFT JOIN process as pc ON pc.id = ta.process_id_fk
// LEFT JOIN product as pr ON pr.id = ta.product_id_fk
// WHERE ta.is_active=1 ORDER BY id DESC";


$whereCondition = "";

if(isset($_POST['submit_search'])){
  $field = $_POST['field'];

   
   
   if($_POST['field'] == "material")
	$field = "materials";
   if($_POST['field'] == "manufacturer")
	$field = "manufacturers";
   if($_POST['field'] == "process")
	$field = "processes";
   if($_POST['field'] == "product")
	$field = "products";

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

$whereConditionAssembly = ($whereCondition!="" && $field!='sub_copoment_name') ? " WHERE ".$whereCondition : "";
$whereConditionSubComp = ($whereCondition!="" && $field!='name') ? " WHERE ".$whereCondition : "";

$selectQAssembly = "
SELECT * FROM (
SELECT ta.* ,
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
    ) as  products
  FROM tbl_assembly ta 
) as tbl 
$whereConditionAssembly
 ORDER BY id DESC";


$allRecordsAssembly = selectQuery($connection, $selectQAssembly);

// $selectQSubComp = "SELECT sc.*, eq.name as equipment_name, mf.name as manufacturer_name, pc.name as process_name, pr.name as product_name
// FROM tbl_sub_component as sc
// LEFT JOIN equipment as eq ON eq.id = sc.equipment_id_fk
// LEFT JOIN manufacturer as mf ON mf.id = sc.manufacturer_id_fk
// LEFT JOIN process as pc ON pc.id = sc.process_id_fk
// LEFT JOIN product as pr ON pr.id = sc.product_id_fk
// WHERE sc.is_active=1 ORDER BY id DESC";

$selectQSubComp = "
SELECT * FROM (
SELECT ts.*,
   (SELECT Count(tas.assembly_id_fk) FROM tbl_assembly_sub_component tas 
         WHERE tas.sub_component_id_fk = ts.id) as assembly_used_in,
   (
    SELECT GROUP_CONCAT(mat.name SEPARATOR ', ') as all_materials 
      FROM parent_material as pm 
      LEFT JOIN materials as mat ON mat.id = pm.material_id 
    WHERE pm.parent_id=ts.id AND pm.check_flag = 'sub_component'
    ) as  materials,
   (
    SELECT GROUP_CONCAT(man.name SEPARATOR ', ') as all_manufacturer 
      FROM parent_manufacturer as p_man 
      LEFT JOIN manufacturer as man ON man.id = p_man.manufacturer_id 
    WHERE p_man.parent_id=ts.id AND p_man.check_flag = 'sub_component'
    ) as  manufacturers,
    (
    SELECT GROUP_CONCAT(proc.name SEPARATOR ', ') as all_process 
      FROM parent_process as p_process 
      LEFT JOIN process as proc ON proc.id = p_process.process_id 
    WHERE p_process.parent_id=ts.id AND p_process.check_flag = 'sub_component'
    ) as  processes,
    (
    SELECT GROUP_CONCAT(prod.name SEPARATOR ', ') as all_products 
      FROM parent_product as p_product 
      LEFT JOIN product as prod ON prod.id = p_product.product_id 
    WHERE p_product.parent_id=ts.id AND p_product.check_flag = 'sub_component'
    ) as  products

  FROM tbl_sub_component as ts

  ) as tbl 
$whereConditionSubComp
 ORDER BY id DESC";

$allRecordsSubComp = selectQuery($connection, $selectQSubComp);

?>