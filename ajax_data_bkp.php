<?php
include("config/config.php");
include("common_queries.php");
require("common/class/common.php");
include("config/auth_token.php");
// require $_SERVER['DOCUMENT_ROOT'].'/ultragenyx/config/config.php';
// require $_SERVER['DOCUMENT_ROOT'].'/ultragenyx/common_queries.php';
// require $_SERVER['DOCUMENT_ROOT'].'/ultragenyx/common/class/common.php';
// require $_SERVER['DOCUMENT_ROOT'].'/ultragenyx/config/auth_token.php';

if($_POST['type']=="get_subcomponent_by_id"){
	$subComponentId = isset($_POST['sub_comp_id']) ? $_POST['sub_comp_id'] : "";
	return json_encode(getSingleRecords($connection, 'tbl_sub_component', array('id'=>$subComponentId)));
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

?>