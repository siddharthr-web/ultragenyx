<?php
	
        $record=  array();
         $records["msg"] = "Token is mismatched";
         $records["countRecords"] = 0;
         $records["result"] = "Token is mismatched";
  
    if (is_session_started1() === FALSE) session_start();

    $link_array = explode('/',$_SERVER['PHP_SELF']);
    $page = end($link_array);

    if(!isset($_SESSION['LOGIN']) && $page!="sub-components.php" && $page!="product-management.php" && $page!="dcfd.php" && $page!="add-edit-dcfd.php" && $page!="add-edit-assembly.php" && $page!="assembly.php" && $page!="add-edit-subsu_assembly.php" && $page!="subsu_assembly.php" && $page!="dashboard.php" && $page!="add-edit-product.php" && $page!="add-edit-subcomponent.php" && $page!="print_product.php" && $page!="print_sub_component.php") {
        header("location: login.php"); die;
        // header('Content-Type: application/json');
        // echo json_encode($records);
        // die();
    }
    function is_session_started1() {

        if ( php_sapi_name() === 'cli' )
            return false;
    
        return version_compare( phpversion(), '5.4.0', '>=' )
            ? session_status() === PHP_SESSION_ACTIVE
            : session_id() !== '';
    }
?>
