<?php
$type = $table = $_GET['type'];
$name = isset($_POST['name']) ? $_POST['name'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";
$txt = isset($_GET['id']) ? "updated" : "added";
$errMsg = "";
$formAction = isset($_GET['id']) ? "add-edit-masters.php?type=".$type."&id=".$_GET['id'] : "add-edit-masters.php?type=".$type;

if(isset($_POST['submit'])) {
	$isvalid = ($name=="") ?  false : true;

	$nameCount = $connection->query("SELECT COUNT(id) as cnt FROM $table WHERE name = '$name' AND id!='$id'")->fetch_row()['0'];

   if($nameCount!=0){
     $errMsg =  ucfirst($type)." name already exist.";
     $isvalid = false;
   }

	if($isvalid) {

		$addData = ($id=="") ? insertRecord($connection, $table, array('name' => $_POST['name'])) : updateRecord($connection, $table, array('name' => $_POST['name']), array('id'=>$id));

	if($addData) {
		 $_SESSION['toast_list']['type'] = "success";
	     $_SESSION['toast_list']['message'] = ucfirst($table)." ".$txt." successfully.";
		 header('location:'.SITE_URL.'masters.php?type='.$type); exit;
	}

  }else{
  		$_SESSION['toast_list']['type'] = "error";
        $_SESSION['toast_list']['message'] = ($errMsg=="") ? "Please fill all required field." : $errMsg;
  }

}

if(isset($_GET['id'])){
	$selectRecord = getAllRecords($connection, $table, array('id'=> $_GET['id']));
	while ($row = $selectRecord->fetch_assoc()) { 
		$name = $row["name"];
		$id = $row["id"];
	}
}



?>