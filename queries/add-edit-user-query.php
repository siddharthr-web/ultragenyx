<?php
$table = "tbl_user";
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$user_email = isset($_POST['user_email']) ? $_POST['user_email'] : "";
$user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : "";
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : "";
$errMsg = "";
$formAction = isset($_GET['id']) ? "add-edit-user.php?id=".$_GET['id'] : "add-edit-user.php";

if(isset($_POST['submit'])){
    $isvalid = (isset($_SESSION['LOGIN']['user_id']) && $_SESSION['LOGIN']['user_id']==1 && $id=="" && empty($user_password)) ? false: true;
	$notEmpty = $isvalid = (empty($name) || empty($user_email)) ?  false : true;

	$dataArray = array(
						'name' => $name,
						'user_email' => $user_email,
						'user_phone' => $user_phone
					);

	
	 $userPass = $dataArray['user_password'] = md5($_POST['user_password']);
	



	$emailCount = $connection->query("SELECT COUNT(user_id) as cnt FROM tbl_user WHERE user_email = '$user_email' AND user_id!='$id'")->fetch_row()['0'];

   

    if($emailCount!=0){
        $errMsg =  "Email already exist.";
        $isvalid = false;
    }

    if (empty($user_email) && !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errMsg = "Invalid email format";
        $isvalid = false;
    }

    if($isvalid){
		$whereArray = array('user_id'=>$id);
		$addData = ($id=="") ? insertRecord($connection, $table, $dataArray) : updateRecord($connection, $table, $dataArray, $whereArray);



		$status = ($id=="") ? "added" : "updated";

		if($addData){
			 $_SESSION['toast_list']['type'] = "success";
		     $_SESSION['toast_list']['message'] = "User ".$status." successfully.";
			header('location:'.SITE_URL.'users.php'); exit;
		}else{
			echo "Something went wrong..!";
		}
    }else{
    	$_SESSION['toast_list']['type'] = "error";
        $_SESSION['toast_list']['message'] =  (!$notEmpty) ?"Please fill all required fields." : $errMsg;
    }
}

if(isset($_GET['id'])){
	$selectRecord = getAllRecords($connection, $table, array('user_id'=> $_GET['id']));
	while ($row = $selectRecord->fetch_assoc()) { 
		$id = $row["user_id"];
		$name = $row["name"];
		$user_email = $row["user_email"];
		$user_phone = $row["user_phone"];
		$user_password = $row["user_password"];
	}
}



?>