<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$table = "tbl_assembly";
$drawing_of_assembly = "";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$internal_part_no = isset($_POST['internal_part_no']) ? $_POST['internal_part_no'] : "";
$vendor_part_no = isset($_POST['vendor_part_no']) ? $_POST['vendor_part_no'] : "";
$intended_use_description = isset($_POST['intended_use_description']) ? $_POST['intended_use_description'] : "";
$type_id = isset($_POST['type_id']) ? $_POST['type_id'] : "";
$batch_record = isset($_POST['batch_record']) ? $_POST['batch_record'] : "";
$product_contact = isset($_POST['product_contact']) ? $_POST['product_contact'] : "";
$can_be_irradiated = isset($_POST['can_be_irradiated']) ? $_POST['can_be_irradiated'] : "";
$can_be_autoclaved = isset($_POST['can_be_autoclaved']) ? $_POST['can_be_autoclaved'] : "";

$parent_dcfd_id = isset($_POST['parent_dcfd']) ? $_POST['parent_dcfd'] : "";
$su_assembly_id = isset($_POST['su_assembly']) ? $_POST['su_assembly'] : "";



$is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 1;
$material_id_fk_array = isset($_POST['material_id_fk']) ? $_POST['material_id_fk'] : array();
$manufacturer_id_fk_array = isset($_POST['manufacturer_id_fk']) ? $_POST['manufacturer_id_fk'] : array();
$product_id_fk_array = isset($_POST['product_id_fk']) ? $_POST['product_id_fk'] : array();
$process_id_fk_array = isset($_POST['process_id_fk']) ? $_POST['process_id_fk'] : array();
$equipment_id_fk_array = isset($_POST['equipment_id_fk']) ? $_POST['equipment_id_fk'] : array();
$ph_min = isset($_POST['ph_min']) ? $_POST['ph_min'] : "";
$ph_max = isset($_POST['ph_max']) ? $_POST['ph_max'] : "";
$chemical_exposure = isset($_POST['chemical_exposure']) ? $_POST['chemical_exposure'] : "";
$other_details = isset($_POST['other_details']) ? $_POST['other_details'] : "";
$temp_min = isset($_POST['temp_min']) ? $_POST['temp_min'] : "";
$temp_max = isset($_POST['temp_max']) ? $_POST['temp_max'] : "";
$pressure_min = isset($_POST['pressure_min']) ? $_POST['pressure_min'] : "";
$pressure_max = isset($_POST['pressure_max']) ? $_POST['pressure_max'] : "";
$flow_rate_min = isset($_POST['flow_rate_min']) ? $_POST['flow_rate_min'] : "";
$flow_rate_max = isset($_POST['flow_rate_max']) ? $_POST['flow_rate_max'] : "";
$volume_min = isset($_POST['volume_min']) ? $_POST['volume_min'] : "";
$volume_max = isset($_POST['volume_max']) ? $_POST['volume_max'] : "";
$sub_component_id_array = isset($_POST['sub_component_id']) ? $_POST['sub_component_id'] : array();
// New Fields end

$coaSampleArray = array();
$formAction = isset($_GET['id']) ? "add-edit-product.php?id=".$_GET['id'] : "add-edit-product.php";

$coaSamples = isset($_FILES['coa_sample_file']) ? $_FILES['coa_sample_file'] : "";
$dataIdFk = isset($_POST['data_id_fk']) ? $_POST['data_id_fk'] : array();
$otherLocation = isset($_POST['other_location']) ? $_POST['other_location'] : array();

$savedCoa = isset($_POST['saved_coa']) ? $_POST['saved_coa'] : array(); 
$savedDataIdFk = isset($_POST['saved_data_id_fk']) ? $_POST['saved_data_id_fk'] : array();
$savedOtherLocation = isset($_POST['saved_other_location']) ? $_POST['saved_other_location'] : array();


$allMaterials = getAllRecords($connection, 'materials', array('is_active'=>1),"ORDER BY id DESC");
$allManufacturer = getAllRecords($connection, 'manufacturer', array('is_active'=>1),"ORDER BY id DESC");
$allProduct = getAllRecords($connection, 'product', array('is_active'=>1),"ORDER BY id DESC");
$allProcess = getAllRecords($connection, 'process', array('is_active'=>1),"ORDER BY id DESC");
$allEquipment = getAllRecords($connection, 'equipment', array('is_active'=>1),"ORDER BY id DESC");

// Saved children ids need on update selected
$materialIds = ($id!="") ? getAllIds($connection, 'parent_material', 'material_id', array('parent_id'=>$id,'check_flag'=>"assembly")) : array();
$manufacturerIds = ($id!="") ? getAllIds($connection, 'parent_manufacturer', 'manufacturer_id', array('parent_id'=>$id,'check_flag'=>"assembly")) : array();
$productIds = ($id!="") ? getAllIds($connection, 'parent_product', 'product_id', array('parent_id'=>$id,'check_flag'=>"assembly")) : array();
$processIds = ($id!="") ? getAllIds($connection, 'parent_process', 'process_id', array('parent_id'=>$id,'check_flag'=>"assembly")) : array();
$equipmentIds = ($id!="") ? getAllIds($connection, 'parent_equipment', 'equipment_id', array('parent_id'=>$id,'check_flag'=>"assembly")) : array();
$subComponentArray = ($id!="") ? getSubComponentsArrayOnEdit($connection, $id) : array();


$materialNames = ($id!="") ? getAllIdsWithName($connection, 'parent_material', 'materials', 'material_id', 'name','id', 'material_id', $id, 'assembly') : array();
$manufacturerNames = ($id!="") ? getAllIdsWithName($connection, 'parent_manufacturer', 'manufacturer', 'manufacturer_id', 'name','id', 'manufacturer_id', $id, 'assembly') : array();
$productNames = ($id!="") ? getAllIdsWithName($connection, 'parent_product', 'product', 'product_id', 'name','id', 'product_id', $id, 'assembly') : array();
$processNames = ($id!="") ? getAllIdsWithName($connection, 'parent_process', 'process', 'process_id', 'name','id', 'process_id', $id, 'assembly') : array();
$equipmentNames = ($id!="") ? getAllIdsWithName($connection, 'parent_equipment', 'equipment', 'equipment_id', 'name','id', 'equipment_id', $id, 'assembly') : array();

// $subComponentNames = ($id!="") ? getAllIdsWithName($connection, 'tbl_assembly_sub_component', 'materials', 'sub_component_id_fk', 'name','id', 'sub_component_id_fk', $id, 'assembly') : array();

// $subComponentNames = ($id!="") ? getAllIdsWithName($connection, 'tbl_assembly_sub_component', 'sub_component_id_fk', array('assembly_id_fk'=>$id)) : array();


$status = ($id=="") ? "added" : "updated";
$errMsg = "";


function add_multiple_children($connection, $table, $fieldName, $aid, $dataArray) {
	$deletePreviousData = deleteRecord($connection, $table, array('parent_id'=>$aid,'check_flag'=>'assembly'));
		if(count($dataArray) > 0){
			foreach ($dataArray as $value) {
				$data = array('parent_id'=>$aid, $fieldName=>$value,'check_flag'=>'assembly');
				insertRecord($connection, $table, $data);
			}
		}
}

if(isset($_POST['submit'])){
	$isvalid = empty($name) ? false : true;

  if($isvalid){
	$targetDir = '../assets/uploads/drawing-assembly';
	$drawingFile = $_FILES['drawing_of_assembly'];
	$fileName = (isset($drawingFile["name"]) && $drawingFile["name"]!='') ? time(). '_' .$drawingFile["name"] : "";
	$drawingUpload = ($fileName!="") ? fileUpload($targetDir, $_FILES['drawing_of_assembly'], $fileName, 2097152, array("png", "jpg", "jpeg")) : false;

		$dataArray = array(
			'name' => $name,
			'parent_dcfd_id' =>$parent_dcfd_id,
			'su_assembly_id' =>$su_assembly_id,
			'internal_part_no' => $internal_part_no,
			'vendor_part_no' => $vendor_part_no,
			'intended_use_description' => $intended_use_description,
			'type_id' => $type_id,
			'can_be_irradiated' => $can_be_irradiated,
			'can_be_autoclaved' => $can_be_autoclaved,
			'is_active' => $is_active,
			'batch_record' => $batch_record,
			'product_contact' => $product_contact,
			'ph_min' => $ph_min,
			'ph_max' => $ph_max,
			'chemical_exposure' => $chemical_exposure,
			'other_details' => $other_details,
			'temp_min' => $temp_min,
			'temp_max' => $temp_max,
			'pressure_min' => $pressure_min,
			'pressure_max' => $pressure_max,
			'flow_rate_min' => $flow_rate_min,
			'flow_rate_max' => $flow_rate_max,
			'volume_min' => $volume_min,
			'volume_max' => $volume_max
		);

	  if($drawingFile["name"]!=""){
		$dataArray['drawing_of_assembly'] = $fileName;
	  }

	// INSERT OR UPDATE START
	$whereArray = array('id'=>$id);

	$addData = ($id=="") ? insertRecord($connection, $table, $dataArray) : updateRecord($connection, $table, $dataArray, $whereArray);
	$aid = ($id!="") ? $id : $addData;


	// Insert children start
	$insertMaterials =  (isset($_POST['material_id_fk']) && count($_POST['material_id_fk']) > 0) ? add_multiple_children($connection, 'parent_material','material_id', $aid, $_POST['material_id_fk']) : add_multiple_children($connection, 'parent_material','material_id', $aid, array());

	$insertManufacturers =  (isset($_POST['manufacturer_id_fk']) && count($_POST['manufacturer_id_fk']) > 0) ? add_multiple_children($connection, 'parent_manufacturer','manufacturer_id', $aid, $_POST['manufacturer_id_fk']) : add_multiple_children($connection, 'parent_manufacturer','manufacturer_id', $aid, array());

	$insertProducts =  (isset($_POST['product_id_fk']) && count($_POST['product_id_fk']) > 0) ? add_multiple_children($connection, 'parent_product','product_id', $aid, $_POST['product_id_fk']) : add_multiple_children($connection, 'parent_product','product_id', $aid, array());

	$insertProceses =  (isset($_POST['process_id_fk']) && count($_POST['process_id_fk']) > 0) ? add_multiple_children($connection, 'parent_process','process_id', $aid, $_POST['process_id_fk']) : add_multiple_children($connection, 'parent_process','process_id', $aid, array());

	$insertEquipment =  (isset($_POST['equipment_id_fk']) && count($_POST['equipment_id_fk']) > 0) ? add_multiple_children($connection, 'parent_equipment','equipment_id', $aid, $_POST['equipment_id_fk']) : add_multiple_children($connection, 'parent_equipment','equipment_id', $aid, array());

	if(isset($_POST['sub_component_id'])){
    	$deletePreviousSubComponent = deleteRecord($connection, 'tbl_assembly_sub_component', array('assembly_id_fk'=>$aid));
		if(count($_POST['sub_component_id']) > 0){
			foreach ($_POST['sub_component_id'] as $value) {
				if($value!=""){
					$data = array('assembly_id_fk'=>$aid, 'sub_component_id_fk'=>$value);
					insertRecord($connection, 'tbl_assembly_sub_component', $data);
				}
			}
		}
	}

	// Insert children end

	// INSERT OR UPDATE END



// Upload Pdf start

	$deletePreviousCoa = deleteRecord($connection, 'tbl_assembly_coa_sample', array('assembly_id_fk'=>$aid));

	if(count($savedCoa) > 0){
		$i=0;
		foreach ($savedCoa as $value) {
			$insertSavedcoa = ($value!="") ? insertRecord($connection, 'tbl_assembly_coa_sample', array('coa_sample_file'=>$value, 'other_location'=>$savedOtherLocation[$i], 'data_id_fk'=>$savedDataIdFk[$i], 'assembly_id_fk'=> $aid)) : "";
			$i++;
		}
	}

	$targetDirCoa = '../assets/uploads/coa-sample-assembly';
	$coaSamplesFileArray = array();
	// echo "<pre>";
	// print_r($coaSamples); die;
		if($coaSamples!="" && count($coaSamples['name']) > 0){
		$i=0;
			for ($x=0; $x < count($coaSamples['name']); $x++) { 

				$fileNameCoa = (isset($coaSamples['name'][$x]) && $coaSamples['name'][$x]!='') ? time(). '_' .$coaSamples['name'][$x] : "";

				$coaSamplesFileArray['name'] = $coaSamples['name'][$x];
				$coaSamplesFileArray['type'] = $coaSamples['type'][$x];
				$coaSamplesFileArray['tmp_name'] = $coaSamples['tmp_name'][$x];
				$coaSamplesFileArray['error'] = $coaSamples['error'][$x];
				$coaSamplesFileArray['size'] = $coaSamples['size'][$x];
				$coaUpload = ($fileNameCoa!="") ? fileUpload($targetDirCoa, $coaSamplesFileArray, $fileNameCoa, 2097152, array("pdf")) : false;

				$coa = ($fileNameCoa!="") ? insertRecord($connection, 'tbl_assembly_coa_sample', array('coa_sample_file'=>$fileNameCoa, 'other_location'=>$otherLocation[$i], 'data_id_fk'=>$dataIdFk[$i], 'assembly_id_fk'=> $aid)) : "";

				$coaSamplesFileArray = array();
				$i++;
			}
		}

// Upload Pdf end


	if($addData){
		 $_SESSION['toast_list']['type'] = "success";
	     $_SESSION['toast_list']['message'] = "Assembly ".$status." successfully.";
		header('location:'.SITE_URL.'admin/product-management.php'); exit;
	}else{
		echo "Something went wrong..!";
	}
  }else{
  		$_SESSION['toast_list']['type'] = "error";
        $_SESSION['toast_list']['message'] =  ($errMsg=="") ?"Please fill required fields." : $errMsg;
  }
}

if(isset($_GET['id'])){
	$selectRecord = getAllRecords($connection, $table, array('id'=> $_GET['id']));
	$coaSampleArray = getAllRecords($connection, 'tbl_assembly_coa_sample', array('assembly_id_fk' => $_GET['id']));
	$assemblyId=$_GET['id'];

	while ($row = $selectRecord->fetch_assoc()) { 
		$id = $row["id"];
		$name = $row["name"];
		$parent_dcfd_id = $row['parent_dcfd_id'];
		$su_assembly_id = $row['su_assembly_id'];
		$internal_part_no = $row["internal_part_no"];
		$drawing_of_assembly = $row["drawing_of_assembly"];
		$vendor_part_no = $row["vendor_part_no"];
		$intended_use_description = $row["intended_use_description"];
		$type_id = $row["type_id"];
		$can_be_irradiated = $row["can_be_irradiated"];
		$can_be_autoclaved = $row["can_be_autoclaved"];
		$is_active = $row["is_active"];
		$batch_record = $row["batch_record"];
		$product_contact = $row["product_contact"];
		$ph_min = $row['ph_min'];
		$ph_max = $row['ph_max'];
		$chemical_exposure = $row['chemical_exposure'];
		$other_details = $row["other_details"];
		$temp_min = $row['temp_min'];
		$temp_max = $row['temp_max'];
		$pressure_min = $row['pressure_min'];
		$pressure_max = $row['pressure_max'];
		$flow_rate_min = $row["flow_rate_min"];
		$flow_rate_max = $row["flow_rate_max"];
		$volume_min = $row["volume_min"];
		$volume_max = $row["volume_max"];
	}
}


$dataDropdown = getDropdown($connection, 'data', 'id', 'name', array('is_active'=>1), '');
$subComponentDropdown = getDropdown($connection, 'tbl_sub_component', 'id', 'sub_copoment_name', array('is_active!'=>"Inactive"), '');
$typeDropdown = getDropdown($connection, 'type', 'id', 'name', array('is_active'=>1), $type_id);

?>