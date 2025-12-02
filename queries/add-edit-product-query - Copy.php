<?php
$table = "tbl_assembly";
$id = isset($_GET['id']) ? $_GET['id'] : "";

$name = isset($_POST['name']) ? $_POST['name'] : "";
$internal_part_no = isset($_POST['internal_part_no']) ? $_POST['internal_part_no'] : "";
$drawing_of_assembly = "";
$vendor_part_no = isset($_POST['vendor_part_no']) ? $_POST['vendor_part_no'] : "";
$material_id_fk = isset($_POST['material_id_fk']) ? $_POST['material_id_fk'] : "";
$manufacturer_id_fk = isset($_POST['manufacturer_id_fk']) ? $_POST['manufacturer_id_fk'] : "";
$process_id_fk = isset($_POST['process_id_fk']) ? $_POST['process_id_fk'] : "";
$equipment_id_fk = isset($_POST['equipment_id_fk']) ? $_POST['equipment_id_fk'] : "";
$product_id_fk = isset($_POST['product_id_fk']) ? $_POST['product_id_fk'] : "";
$leachable_extractables_data = isset($_POST['leachable_extractables_data']) ? $_POST['leachable_extractables_data'] : "";
$validation = isset($_POST['validation']) ? $_POST['validation'] : "";
$temp_range_from = isset($_POST['temp_range_from']) ? $_POST['temp_range_from'] : "";
$temp_range_to = isset($_POST['temp_range_to']) ? $_POST['temp_range_to'] : "";
$ph_range_from = isset($_POST['ph_range_from']) ? $_POST['ph_range_from'] : "";
$ph_range_to = isset($_POST['ph_range_to']) ? $_POST['ph_range_to'] : "";
$pressure_range_from = isset($_POST['pressure_range_from']) ? $_POST['pressure_range_from'] : "";
$pressure_range_to = isset($_POST['pressure_range_to']) ? $_POST['pressure_range_to'] : "";
$can_be_irradiated = isset($_POST['can_be_irradiated']) ? $_POST['can_be_irradiated'] : "";
$can_be_autoclaved = isset($_POST['can_be_autoclaved']) ? $_POST['can_be_autoclaved'] : "";
$formAction = isset($_GET['id']) ? "add-edit-product.php?id=".$_GET['id'] : "add-edit-product.php";
$sub_copoment_id = isset($_POST['sub_copoment_id']) ? $_POST['sub_copoment_id'] : array();
$coaSamples = isset($_FILES['coa_sample_file']) ? $_FILES['coa_sample_file'] : "";
// echo "<pre>";
// print_r($_FILES['coa_sample_file']); die;
if(isset($_POST['submit'])){

	$targetDir = '../assets/uploads/drawing-assembly';
	$drawingFile = $_FILES['drawing_of_assembly'];
	$fileName = (isset($drawingFile["name"]) && $drawingFile["name"]!='') ? time(). '_' .$drawingFile["name"] : "";
	$drawingUpload = ($fileName!="") ? fileUpload($targetDir, $_FILES['drawing_of_assembly'], $fileName, 2097152, array("png", "jpg", "jpeg")) : false;

	$dataArray = array(
						'name' => $name,
						'internal_part_no' => $internal_part_no,
						'drawing_of_assembly' => $fileName,
						'vendor_part_no' => $vendor_part_no,
						'material_id_fk' => $material_id_fk,
						'manufacturer_id_fk' => $manufacturer_id_fk,
						'process_id_fk' => $process_id_fk,
						'equipment_id_fk' => $equipment_id_fk,
						'product_id_fk' => $product_id_fk,
						'leachable_extractables_data' => $leachable_extractables_data,
						'validation' => $validation,
						'temp_range_from' => $temp_range_from,
						'temp_range_to' => $temp_range_to,
						'ph_range_from' => $ph_range_from,
						'ph_range_to' => $ph_range_to,
						'pressure_range_from' => $pressure_range_from,
						'pressure_range_to' => $pressure_range_to,
						'can_be_irradiated' => $can_be_irradiated,
						'can_be_autoclaved' => $can_be_autoclaved,
						'is_active' => 1
					);


	$whereArray = array('id'=>$id);
	$addData = ($id=="") ? insertRecord($connection, $table, $dataArray) : updateRecord($connection, $table, $dataArray, $whereArray);
	$aid = ($id!="") ? $addData : $id;
	if(count($sub_copoment_id) > 0){
		foreach ($sub_copoment_id as $value) {
			$ins = insertRecord($connection, 'tbl_assembly_sub_component', array('sub_component_id_fk'=>$value, 'assembly_id_fk'=> $aid));
		}
	}

	if(count($coaSamples) > 0){
		foreach ($coaSamples as $coaValue) {
		$targetDirCoa = '../assets/uploads/coa-sample-assembly';
		$coaFile = $coaValue;
		$fileNameCoa = (isset($coaFile["name"]) && $coaFile["name"]!='') ? time(). '_' .$coaFile["name"] : "";
		// print_r($coaFile); die;
		$coaUpload = ($fileNameCoa!="") ? fileUpload($targetDirCoa, $coaFile, $fileNameCoa, 2097152, array("pdf")) : false;


		$coa = ($fileNameCoa!="") ? insertRecord($connection, 'tbl_assembly_coa_sample', array('coa_sample_file'=>$fileNameCoa, 'assembly_id_fk'=> $aid)) : "";
		}
	}
	
	if($addData){
		header('location:'.SITE_URL.'product-management.php'); exit;
	}else{
		echo "Something went wrong..!";
	}
}

if(isset($_GET['id'])){
	$selectRecord = getAllRecords($connection, $table, array('id'=> $_GET['id']));
	while ($row = $selectRecord->fetch_assoc()) { 
		$id = $row["id"];
		$name = $row["name"];
		$internal_part_no = $row["internal_part_no"];
		$drawing_of_assembly = $row["drawing_of_assembly"];
		$vendor_part_no = $row["vendor_part_no"];
		$material_id_fk = $row["material_id_fk"];
		$manufacturer_id_fk = $row["manufacturer_id_fk"];
		$process_id_fk = $row["process_id_fk"];
		$equipment_id_fk = $row["equipment_id_fk"];
		$product_id_fk = $row["product_id_fk"];
		$leachable_extractables_data = $row["leachable_extractables_data"];
		$validation = $row["validation"];
		$temp_range_from = $row["temp_range_from"];
		$temp_range_to = $row["temp_range_to"];
		$ph_range_from = $row["ph_range_from"];
		$ph_range_to = $row["ph_range_to"];
		$pressure_range_from = $row["pressure_range_from"];
		$pressure_range_to = $row["pressure_range_to"];
		$can_be_irradiated = $row["can_be_irradiated"];
		$can_be_autoclaved = $row["can_be_autoclaved"];
	}
}

?>