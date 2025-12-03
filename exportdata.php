<?php

//include database configuration file
include './config/config.php';
include './common/class/common.php';
include './queries/common_queries.php';

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

    fputcsv($output,['#','Id','Name']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["id"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            fputcsv($output,$row);
        }
    }
}



if($section == "users") {

    $query = "SELECT * FROM tbl_user WHERE is_active=1 ORDER BY user_id DESC";
    $queryResult = selectQuery($connection, $query);

    fputcsv($output,['#','Id','Name','Email','Phone']);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["user_id"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["user_email"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', (string)$rows["user_phone"]);
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
    SELECT name FROM manufacturer WHERE id = ta.manufacturer_id
    ) as manufacturer_name,
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
      SELECT name FROM type WHERE id = ta.type_id
    ) as assembly_type,
    (
      SELECT name FROM tbl_su_assembly WHERE id = ta.su_assembly_id
    ) as su_assembly_name
  FROM tbl_assembly ta 
WHERE ta.is_active!='Inactive' ORDER BY ta.id DESC";

    $queryResult = selectQuery($connection, $query);
    //Data
    $queryForDataFileCount = selectQuery($connection, "SELECT assembly_id_fk, COUNT(*) AS total_count FROM tbl_assembly_coa_sample WHERE assembly_id_fk IN (SELECT id FROM tbl_assembly) GROUP BY assembly_id_fk ORDER BY total_count DESC LIMIT 1 ");
    $resultForDataFileCount = mysqli_fetch_array($queryForDataFileCount);
    $dataFileCount = (isset($resultForDataFileCount['total_count']) && $resultForDataFileCount['total_count'] > 0) ? $resultForDataFileCount['total_count'] : 0;

    // Build header array with dynamic file columns
    $header = ['#','Id','Assembly Name','Material','Manufacturer','Process','Product','Status', 'Internal Part No', 'Drawing of Assembly', 'Vendor Part No', 'Intended Use Description', 
                'Assembly Type', 'Batch Record', 'Product Contact?', 'Can be Irradiated?', 'Can be autoclaved?', 'DCFD', 'SU Number', 'Status', 'PH Min', 'PH Max', 
                'Temperature Min', 'Temperature Max', 'Pressure Min', 'Pressure Max', 'Flow Rate Min', 'Flow Rate Max', 'Volume Min', 'Volume Max', 'Chemical Exposure',
                'Other Details','Sub Component(s)'];  
    // Data
    for ($i = 1; $i <= $dataFileCount; $i++) {
        $header[] = 'File ' . $i;
        $header[] = 'Other Locations ' . $i;
        $header[] = 'Data ' . $i;
    }
    fputcsv($output, $header);

    if (mysqli_num_rows($queryResult) > 0) {

        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {

            $coaSampleArray = [];
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["id"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["materials"]);            
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["manufacturer_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["processes"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["products"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["is_active"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["internal_part_no"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["drawing_of_assembly"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["vendor_part_no"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["intended_use_description"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["assembly_type"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["batch_record"]);
            $productContact = ($rows['product_contact'] == 1) ? "Yes" : "No";
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $productContact);
            $canBeIrradiated = ($rows['can_be_irradiated'] == 1) ? "Yes" : "No";
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $canBeIrradiated);
            $canBeAutoclaved = ($rows['can_be_autoclaved'] == 1) ? "Yes" : "No";
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $canBeAutoclaved);  
            // dcfd
            $dcfcValueArray = getAllRecords($connection, 'parent_dcdf', array('parent_id' => $rows['id'], 'check_flag' => 'assembly'));
            $dcfd = [];
            if(mysqli_num_rows($dcfcValueArray) > 0) {
              while($dcfdValues = mysqli_fetch_assoc($dcfcValueArray)) {
                $dcfcQry = getAllRecords($connection, 'tbl_dcfd', array('id' => $dcfdValues['dcfd_id']));
                if(mysqli_num_rows($dcfcQry) > 0) {
                  while($dcfdRows = mysqli_fetch_assoc($dcfcQry)) {
                    $dcfd[] = $dcfdRows['name']; 
                  }  
                }
              }
            }
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', implode(', ', $dcfd));            
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["su_assembly_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["is_active"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["ph_min"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["ph_max"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["temp_min"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["temp_max"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["pressure_min"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["pressure_max"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["flow_rate_min"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["flow_rate_max"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["volume_min"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["volume_max"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["chemical_exposure"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["other_details"]);            
            // Sub Component
            $subComponentArray = getAllRecords($connection, 'tbl_assembly_sub_component', array('assembly_id_fk' => $rows['id'], 'type' => 'vendor', 'is_active' => 1));
            $subComponentNames = [];
            if(mysqli_num_rows($subComponentArray) > 0){
                while($subCompRows = mysqli_fetch_assoc($subComponentArray)){
                    $subCompDetails = getAllRecords($connection, 'tbl_sub_component', array('id' => $subCompRows['sub_component_id_fk']));
                    if(mysqli_num_rows($subCompDetails) > 0){
                        while($subCompDetailRow = mysqli_fetch_assoc($subCompDetails)){
                            $subComponentNames[] = $subCompDetailRow['sub_copoment_name'];
                        }
                    }
                }
            }
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', implode(', ', $subComponentNames));
            // Data
            $coaSampleArray = getAllRecords($connection, 'tbl_assembly_coa_sample', array('assembly_id_fk' => $rows['id']));
            if(mysqli_num_rows($coaSampleArray) > 0){
                $count = 0;
                while($coaSampleRow = mysqli_fetch_array($coaSampleArray)){
                    $count++;
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $coaSampleRow["coa_sample_file"]);
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $coaSampleRow["other_location"]);
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ($coaSampleRow["data_id_fk"] == 4) ? 'Spec Sheet' : 'Vendor Drawing');
                }
            } else {
                // If no records, fill all dynamic columns with empty values
                for($j = 0; $j < $dataFileCount; $j++){
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                }
            }

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
    ) as  products,
    (
    SELECT name FROM subcomponent_type WHERE id = ts.type_id
    ) as sub_component_type,
    (
    SELECT GROUP_CONCAT(equip.name SEPARATOR ', ') as equipment_ids
      FROM parent_equipment as p_equipment 
      LEFT JOIN equipment as equip ON equip.id = p_equipment.equipment_id       
      WHERE p_equipment.parent_id=ts.id AND p_equipment.check_flag = 'sub_component'
    ) as  equipments
  FROM tbl_sub_component as ts
WHERE ts.is_active!='Inactive' 
   ORDER BY ts.id DESC";

    $queryResult = selectQuery($connection, $query);

    //Data
    $queryForDataFileCount = selectQuery($connection, "SELECT sub_component_id_fk, COUNT(*) AS total_count FROM tbl_sub_component_coa_sample WHERE sub_component_id_fk IN (SELECT id FROM tbl_sub_component) GROUP BY sub_component_id_fk ORDER BY total_count DESC LIMIT 1");
    $resultForDataFileCount = mysqli_fetch_array($queryForDataFileCount);
    $dataFileCount = (isset($resultForDataFileCount['total_count']) && $resultForDataFileCount['total_count'] > 0) ? $resultForDataFileCount['total_count'] : 0;

    $header = ['#','Id','Sub Component Name','Material','Manufacturer','Process','Product','Product Contact','Status','Assembly Used In',
                    'Drawing of Sub-Component','Vendor Part No','SubComponent Type','Can be Irradiated?','Can be autoclaved?','Equipment',
                   'PH min', 'PH max', 'Temperature min', 'Temperature max', 'Pressure min', 'Pressure max',
                   'Flow Rate min', 'Flow Rate max', 'Volume min', 'Volume max', 'Chemical Exposure', 'Other Details'];
    // Data
    for ($i = 1; $i <= $dataFileCount; $i++) {
        $header[] = 'File ' . $i;
        $header[] = 'Other Locations ' . $i;
        $header[] = 'Data ' . $i;
    }
    fputcsv($output,$header);

     if (mysqli_num_rows($queryResult) > 0) {
        $i=1;
        while ($rows = mysqli_fetch_array($queryResult)) {
            $row = [];
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $i++);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["id"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["sub_copoment_name"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["materials"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["manufacturers"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["processes"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows["products"]);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ($rows['product_contact']) ? "Yes": "No");
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['is_active']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['assembly_used_in']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['drawing_of_sub_component']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['vendor_part_no']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['sub_component_type']);            
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ($rows['can_be_irradiated'] == 1) ? "Yes" : "No");
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', ($rows['can_be_autoclaved'] == 1) ? "Yes" : "No");
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['equipments']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['ph_min']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['ph_max']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['temp_min']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['temp_max']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['pressure_min']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['pressure_max']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['flow_rate_min']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['flow_rate_max']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['volume_min']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['volume_max']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['chemical_exposure']);
            $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $rows['other_details']);

            $coaSampleArray = getAllRecords($connection, 'tbl_sub_component_coa_sample', array('sub_component_id_fk' => $rows['id']));
            if(mysqli_num_rows($coaSampleArray) > 0){
                $count = 0;
                while($coaSampleRow = mysqli_fetch_array($coaSampleArray)){
                    $count++;
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $coaSampleRow["coa_sample_file"]);
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $coaSampleRow["other_location"]);
                    $dataLabel = ($coaSampleRow["data_id_fk"] == 4) ? 'Spec Sheet' : (($coaSampleRow["data_id_fk"] == 5) ? 'Vendor Drawing' : 'Data');
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $dataLabel);
                }
            } else {
                for($j = 0; $j < $dataFileCount; $j++){
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                    $row[] .= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', '');
                }
            }

            fputcsv($output,$row);
        }
    }
}


exit;
?>