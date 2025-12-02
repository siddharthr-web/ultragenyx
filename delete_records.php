<?php 
include("config/config.php");
include("queries/common_queries.php");
require("common/class/common.php");
require("common/class/validation.php");
include("config/auth_token.php");

$type = $_GET['type'];

$id = $_GET["id"];
$tableName = "";
$idField = "id";
$msgTitle = "";
$location = SITE_URL."/";
 
	if($type=="users"){
		
		$tableName = "tbl_user";
		$idField = "user_id";
		$msgTitle = "User";
		$location = $location."users.php";

	}elseif($type=="product"){

		$tableName = "tbl_assembly";
		$msgTitle = "Assembly";
		$location = $location."product-management.php";	

	}elseif($type=="sub_component"){

		$tableName = "tbl_sub_component";
		$msgTitle = "Sub Component";
		$location = $location."sub-components.php";	

	}elseif($type=="masters"){
		
		$subType = isset($_GET['sub_type']) ? $_GET['sub_type'] : "";
		$tableName = $subType;
		$msgTitle = ucfirst($subType);
		$location = $location."masters.php?type=".$subType;

	}



	$sql = deleteRecord($connection, $tableName, array($idField =>$id));

	 $_SESSION['toast_list']['type'] = "success";
     $_SESSION['toast_list']['message'] = $msgTitle." deleted successfully.";
	header("Location: $location"); exit;
		
		// } else {
		//     $_SESSION['toastr']['type'] = "error";
		// 	$_SESSION['toastr']['message'] = "Something went wrong.";
		// 	header("Location: $location"); exit;
		// }
	

?>