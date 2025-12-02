<?php

function getAllRecords($connection, $table, $where_array=array(),$orderby=""){
	$whereCondition = (count($where_array)>0) ? " WHERE " : "";
	$i=1;
	foreach ($where_array as $key => $value) {
		$whereCondition = $whereCondition." ".$key."='".$value."'";
		$whereCondition = (count($where_array)!=$i) ? $whereCondition." AND " : $whereCondition;
		$i++;
	}

	$selectQ = "SELECT * FROM $table $whereCondition ".$orderby;
	    $result = selectQuery($connection, $selectQ);
	    return $result;
	    // while ($row = $allCandidates->fetch_assoc()) { 
}

function deleteRecord($connection, $table, $where_array=array()){
	$whereCondition = (count($where_array)>0) ? " WHERE " : "";
	$i=1;
	foreach ($where_array as $key => $value) {
		$whereCondition = $whereCondition." ".$key."='".$value."'";
		$whereCondition = (count($where_array)!=$i) ? $whereCondition." AND " : $whereCondition;
		$i++;
	}

   	$queryD = "DELETE FROM $table $whereCondition";
    	return deleteQuery($connection, $queryD);
}

function insertRecord($connection, $table, $dataArray){
		$fields = "";
		$values = "";
		$i=1;
		foreach ($dataArray as $key => $val) {
			$fields = (count($dataArray)!=$i) ? $fields.$key."," : $fields.$key;
			$values = (count($dataArray)!=$i) ? $values."'".$val."'," : $values."'".$val."'";
			$i++;
		}

	   $sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$values.")";
    	 selectQuery($connection, $sql);
    	 return $last_id = mysqli_insert_id($connection);
	    // while ($row = $allCandidates->fetch_assoc()) { 
}

function updateRecord($connection, $table, $dataArray, $whereArray){
		$fieldsValues = " ";

		$whereCondition = (count($whereArray)>0) ? " WHERE " : "";
		$a=1;
		foreach ($whereArray as $key => $value) {
			$whereCondition = $whereCondition." ".$key."='".$value."'";
			$whereCondition = (count($whereArray)!=$a) ? $whereCondition." AND " : $whereCondition;
			$a++;
		}

		$i=1;
		foreach ($dataArray as $key => $val) {
			$fieldsValues = (count($dataArray)!=$i) ? $fieldsValues.$key." = '".setVal($connection,$val)."', " : $fieldsValues.$key." = '".setVal($connection,$val)."' ";
			$i++;
		}
    	$query = "UPDATE $table SET ".$fieldsValues." $whereCondition";
        return updateQuery($connection, $query);
	    // while ($row = $allCandidates->fetch_assoc()) { 
}

function getCount($connection,$table, $where_array=array()){
		$whereCondition = (count($where_array)>0) ? " WHERE " : "";
		$count=0;
			$i=1;
			foreach ($where_array as $key => $value) {
				$whereCondition = $whereCondition." ".$key." = '".$value."' ";
				$whereCondition = (count($where_array)!=$i) ? $whereCondition." AND " : $whereCondition;
				$i++;
			}
			return $connection->query("SELECT count(*) as cnt FROM $table $whereCondition")->fetch_row()[0];
}


function getDropdown($connection, $table, $idField, $nameField, $where_array=array(), $selectedId=""){
	$dataArray = getAllRecords($connection, $table, $where_array);
	$html = "";
	while ($row = $dataArray->fetch_assoc()) { 
		$selected = ($selectedId==$row[$idField]) ? "selected" : "";
		$html = $html."<option value='".$row[$idField]."' ".$selected.">".$row[$nameField]."</option>";
	}
	return $html = $html."";
}


function fileUpload($targetDir, $fileArray, $fileName, $fileSize=0, $fileExtensionArray=array()){
	$target_file = $targetDir .'/'. $fileName; //basename()
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	 // Check file size
	if ($fileArray["size"] > $fileSize) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
	 }

	// Allow certain file formats
	if(!in_array($imageFileType, $fileExtensionArray)) {
	  echo "Sorry, only ".implode(", ",$fileExtensionArray)." files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	} else {
	    echo (move_uploaded_file($fileArray["tmp_name"], $target_file)) ? "success" : "Sorry, there was an error uploading your file.";
	}
}



function getSingleRecords($connection, $table, $where_array=array()) {
	$whereCondition = (count($where_array)>0) ? " WHERE " : "";
	$i=1;
	foreach ($where_array as $key => $value) {
		$whereCondition = $whereCondition." ".$key."='".$value."'";
		$whereCondition = (count($where_array)!=$i) ? $whereCondition." AND " : $whereCondition;
		$i++;
	}

	$result = array();
	$selectQ = "SELECT * FROM $table $whereCondition ";
	    $queryResult = selectQuery($connection, $selectQ);
	    while ($row = $queryResult->fetch_assoc()) {
	    	array_push($result, $row);
	    }
	    return $result[0];
}



function getAllIds($connection, $table, $selectFiled, $where_array=array()) {
	$whereCondition = (count($where_array)>0) ? " WHERE " : "";
	$i=1;
	foreach ($where_array as $key => $value) {
		$whereCondition = $whereCondition." ".$key."='".$value."'";
		$whereCondition = (count($where_array)!=$i) ? $whereCondition." AND " : $whereCondition;
		$i++;
	}

	$selectQ = "SELECT $selectFiled FROM $table $whereCondition";
	    $result = selectQuery($connection, $selectQ);
	    $resultArray = array();
	    foreach ($result as $value) {
	    	array_push($resultArray, $value[$selectFiled]);
	    }
	    return $resultArray;
}


function getAllIdsWithName($connection, $table1, $table2, $selectId, $selectName,$t2Id, $t1Id, $parentId, $checkFlag) {

	$selectQ = "
	SELECT t1.".$selectId.", t2.".$selectName." 
	FROM `$table1` AS t1 
		LEFT JOIN `$table2` AS t2 ON t2.".$t2Id." = t1.".$t1Id."
	WHERE t1.parent_id = $parentId AND t1.check_flag = '$checkFlag'";

	    $result = selectQuery($connection, $selectQ);
	    // $resultArray = array();
	    // foreach ($result as $value) {
	    // 	array_push($resultArray, $value[$selectFiled]);
	    // }
	    return $result;
}





function getSubComponentsArrayOnEdit($connection, $id) {

	$selectQ = "
	SELECT tas.sub_component_id_fk, ts.*, t.name as type
		FROM tbl_assembly_sub_component AS tas
	LEFT JOIN tbl_sub_component AS ts ON ts.id = tas.sub_component_id_fk
	LEFT JOIN type as t ON t.id = ts.type_id 
	WHERE tas.assembly_id_fk = '".$id."'";
   
    $result = selectQuery($connection, $selectQ);
    return $result;

}

function getDropdownArray($connection, $table, $idField, $nameField, $where_array=array()){
	$dataArray = getAllRecords($connection, $table, $where_array);
	$resultArray = array();
	while ($row = $dataArray->fetch_assoc()) { 
		 array_push($resultArray, array('id' => $row[$idField], 'name' => $row[$nameField]));
	}
	return $resultArray;
}


?>