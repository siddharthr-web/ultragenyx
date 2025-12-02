<?php
//include database configuration file
include './config/config.php';
include './common/class/common.php';

$section =!empty($_REQUEST['section']) ? $_REQUEST['section'] : "";

$filename = $section . "_" . date("Ymdhis") . ".csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$filename);
$output = fopen('php://output', 'w');

if($section == "product_management") {
    $query = "SELECT ta.* , eq.name as equipment_name, mf.name as manufacturer_name, pc.name as process_name, pr.name as product_name
            FROM tbl_assembly as ta
        LEFT JOIN equipment as eq ON eq.id = ta.equipment_id_fk
        LEFT JOIN manufacturer as mf ON mf.id = ta.manufacturer_id_fk
        LEFT JOIN process as pc ON pc.id = ta.process_id_fk
        LEFT JOIN product as pr ON pr.id = ta.product_id_fk
        WHERE ta.is_active=1 ORDER BY id DESC";
    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Assembly Name', 'Internal Part No', 'Material','Manufacturer', 'Process',
     'Product/Program']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["internal_part_no"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', "");
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["manufacturer_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["process_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["product_name"]);
            fputcsv($output,$row);
        }
    }
}



if($section == "masters") {
$type =!empty($_REQUEST['type']) ? $_REQUEST['type'] : "";

$query = "SELECT * FROM $type WHERE is_active=1 ORDER BY id DESC";
    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Name']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            fputcsv($output,$row);
        }
    }
}



if($section == "users") {

$query = "SELECT * FROM tbl_user WHERE is_active=1 ORDER BY user_id DESC";
    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Name','Email','Phone','Username']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["user_email"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', (string)$rows["user_phone"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["username"]);
            fputcsv($output,$row);
        }
    }
}



if($section == "assembly") {

    $query = "
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
WHERE ta.is_active!='Inactive' ORDER BY ta.id DESC";

    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Assembly Name','Material','Manufacturer','Process','Product','Status']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["materials"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["manufacturers"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["processes"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["products"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["is_active"]);
            fputcsv($output,$row);
        }
    }
}



if($section == "sub_component") {

$query = "
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
WHERE ts.is_active!='Inactive' 
   ORDER BY ts.id DESC";

    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Sub Component Name','Material','Manufacturer','Process','Product','Product Contact','Status','Assembly Used In']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["sub_copoment_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["materials"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["manufacturers"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["processes"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["products"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ($rows['product_contact']) ? "Yes": "No");
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['is_active']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['assembly_used_in']);
            fputcsv($output,$row);
        }
    }
}


exit;
?>