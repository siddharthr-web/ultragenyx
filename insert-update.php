<?php
include("config/config.php");
include("common/class/common.php");
include("queries/common_queries.php");

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

/* echo "<pre>";
print_r($_REQUEST);
exit;
 */

if(isset($_REQUEST['sub_component_id']))
{
    $sub_component_id  = array_unique($_REQUEST['sub_component_id']);
}

if($_REQUEST['type_search']=='search_data')
{
    $DCFDName   = $_REQUEST['DCFDName'];
    $product    = $_REQUEST['product'];
    $search     = trim($_REQUEST['search']);
    
    if($DCFDName!="" && $product=='')
    {
        $selectQ_search = "SELECT * FROM tbl_dcfd where name LIKE '%$search%'";
        $queryResult_array = selectQuery($connection, $selectQ_search);
    }
    else if($product!="" && $DCFDName=="")
    {
        $selectQ_search = "SELECT * FROM tbl_dcfd where product_id LIKE '%$search%'";
        $queryResult_array = selectQuery($connection, $selectQ_search);
    }
    else
    {
        $selectQ_search = "SELECT * FROM tbl_dcfd where product_id LIKE '%$search%' || name LIKE '%$search%'";
        $queryResult_array = selectQuery($connection, $selectQ_search);
    }
  
    $i=1;
    $delete_url = "";
    while ($row = $queryResult_array->fetch_assoc()) 
    { 
        $product_id = $row['product_id'];
        $delete_url = "./insert-update.php?id=".$row['id'].'-delete';
        ?>
      <tr data-index="0" data-uniqueid="2">
        <td  style="width: 5%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>
        <td style="width: 20%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit">
           <img  style="height:70px;width:152px" src="assets/uploads/coa-sample-assembly/<?php echo $row['image']; ?>"></img>
        </a></td>
        <td style="width: 35%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name'];  ?></a></td>
        <td style="width: 15%;"><a style="cursor: pointer;" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $product_id;  ?></a></td>
        <td style="text-align: center;width: 25% ">
          <a style="cursor: pointer; color:#a31c89;padding:15px; font-size:18px" href="./add-edit-dcfd.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>
          <a style="color:#a31c89; font-size:17px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the DCFD ?')">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
    <?php  $i++; } 
}
else if($_REQUEST['type_search']=='search_data_assembly')
{
    $search     = trim($_REQUEST['search']);

    if($search!="")
    {
        $selectQ_search = "SELECT * FROM tbl_su_assembly where name LIKE '%$search%'";
        $queryResult_array = selectQuery($connection, $selectQ_search);
    }

   
    $i=1;
    $delete_url = "";
    while ($row = $queryResult_array->fetch_assoc()) 
    {
        $delete_url = "./insert-update.php?id=".$row['id'].'-delete_assembly';
     ?>
      <tr data-index="0" data-uniqueid="2">
        <td  style="width: 5%;"><a style="cursor: pointer;" href="./add-edit-assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>

        <td style="width:20%;"><a style="cursor: pointer;" href="./add-edit-assembly.php?id=<?php echo $row['id']; ?>" title="Edit">
           <img  style="height:70px;width:152px" src="assets/uploads/coa-sample-assembly/<?php echo $row['image']; ?>"></img>
        </a></td>

        <td style="width:50% ;"><a style="cursor: pointer; width:30%" href="./add-edit-assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name'];  
        echo $row['materials']  ?></a></td>

        <td style="width:25%;text-align:center">
          <a style="cursor: pointer; color:#a31c89;padding:15px; font-size:20px" href="./add-edit-assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>

          <a style="color:#a31c89;font-size:18px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the DCFD ?')">
            <i class="fa fa-trash"></i>
          </a>
        </td>


      </tr>
    <?php $i++; } 

}

else if($_REQUEST['type_search']=='search_data_subsu_assembly')
{
    $search     = trim($_REQUEST['search']);

    if($search!="")
    {
        $selectQ_search = "SELECT * FROM tbl_subsu_assembly where name LIKE '%$search%'";
        $queryResult_array = selectQuery($connection, $selectQ_search);
    }

   
    $i=1;
    $delete_url = "";
    while ($row = $queryResult_array->fetch_assoc()) 
    {
        $delete_url = "./insert-update.php?id=".$row['id'].'-delete_subsu_assembly';
     ?>
      <tr data-index="0" data-uniqueid="2">
        <td  style="width: 5%;"><a style="cursor: pointer;" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $i; ?></a></td>

        <td style="width:20%;"><a style="cursor: pointer;" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit">
           <img  style="height:70px;width:152px" src="assets/uploads/coa-sample-assembly/<?php echo $row['image']; ?>"></img>
        </a></td>

        <td style="width:50% ;"><a style="cursor: pointer; width:30%" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><?php echo $row['name'];  
        echo $row['materials']  ?></a></td>

        <td style="width:25%;text-align:center">
          <a style="cursor: pointer; color:#a31c89;padding:15px; font-size:20px" href="./add-edit-subsu_assembly.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>

          <a style="color:#a31c89;font-size:18px" class="pointer t11" href="<?php echo $delete_url; ?>"  title="Delete" onclick="return confirm('Are you sure, you want to delete the SubSU Number ?')">
            <i class="fa fa-trash"></i>
          </a>
        </td>


      </tr>
    <?php $i++; } 

}

if($_REQUEST['type']=='DCFD')
{

    $name_data      = $_REQUEST['name'];
    $addeddate      = date("d-m-y h:i:s");
    $id             = $_REQUEST['id'];
    $images         = $_REQUEST['images'];
    $pdf_uploded    = $_REQUEST['pdf'];
    $product_id_fk  = $_REQUEST['product_id_fk'] ? implode("," ,$_REQUEST['product_id_fk']): '';
    $process_id     = $_REQUEST['process_id'] ? implode("," ,$_REQUEST['process_id']) : '';
    $dcfd_pdfs = isset($_FILES['drawing_of_assembly']) ? $_FILES['drawing_of_assembly'] : "";
    $savedPdfs = isset($_POST['saved_pdfs']) ? $_POST['saved_pdfs'] : array(); 
    
 
    if($_REQUEST['submit']=='Add')
    {
        if (($_FILES['image']['name']!=""))
        {
            $target_dir = 'assets/uploads/coa-sample-assembly/';
            $file = $_FILES['image']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $filename = time().'.'.$ext;
            $temp_name = $_FILES['image']['tmp_name'];
            $path_filename_ext = $target_dir.$filename;

            if (file_exists($path_filename_ext)) 
            {
                echo "Sorry, file already exists.";
            }
            else
            {
                move_uploaded_file($temp_name,$path_filename_ext);
            }
        }
        else
        {
            $filename = ""; 
        }

        /* if (($_FILES['pdf']['name']!=""))
        {
            $target_dirs = 'assets/uploads/dcfd_Pdf/';
            $files       = $_FILES['pdf']['name'];
            $paths       = pathinfo($files);
            $filenames   = $paths['filename'];
            $exts        = $paths['extension'];
            $filename_pdf   = time().'.'.$exts;
            $temp_names      = $_FILES['pdf']['tmp_name'];
            $path_filename_ext1 = $target_dirs.$filename_pdf;

            if (file_exists($path_filename_ext1)) 
            {
                echo "Sorry, file already exists.";
            }
            else
            {
                move_uploaded_file($temp_names,$path_filename_ext1);
            }
        }
        else
        {
            $filename_pdf = ""; 
        } */

        $sql = "INSERT INTO tbl_dcfd(name,product_id,process_id,image,pdf,addeddate,updateddate) VALUES ('".$name_data."','".$product_id_fk."','".$process_id."','".$filename."','".$filename_pdf."','".$addeddate."','".$addeddate."')";

        $results = insertQuery($connection, $sql);
        // $results = 1;
        if($results)
        {
            $dcfd_id = $results;
            $target_dirs = 'assets/uploads/dcfd_Pdf/';
            $dcfdPdfsFileArray = array();
            if($dcfd_pdfs!="" && count($dcfd_pdfs['name']) > 0){
                for ($x=0; $x < count($dcfd_pdfs['name']); $x++) {

                    $fileNameDCFD = (isset($dcfd_pdfs['name'][$x]) && $dcfd_pdfs['name'][$x]!='') ? $dcfd_pdfs['name'][$x] : "";

                    $dcfdPdfsFileArray['name'] = $dcfd_pdfs['name'][$x];
                    $dcfdPdfsFileArray['type'] = $dcfd_pdfs['type'][$x];
                    $dcfdPdfsFileArray['tmp_name'] = $dcfd_pdfs['tmp_name'][$x];
                    $dcfdPdfsFileArray['error'] = $dcfd_pdfs['error'][$x];
                    $dcfdPdfsFileArray['size'] = $dcfd_pdfs['size'][$x];
                    $DCFDUpload = ($fileNameDCFD!="") ? fileUpload($target_dirs, $dcfdPdfsFileArray, $fileNameDCFD, 2097152, array("pdf")) : false;

                    $DCFD = ($fileNameDCFD!="") ? insertRecord($connection, 'tbl_dcfd_drawing_of_assembly', array('drawing_of_assembly_pdf'=>$fileNameDCFD, 'dcfd_id'=> $dcfd_id)) : "";
                    $dcfdPdfsFileArray = array();

                }
            }
            for($i=0;$i<count($sub_component_id);$i++)
            {
                if(!empty($sub_component_id[$i])){
                    $assembly_sub_component = "INSERT INTO tbl_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$results."','".$sub_component_id[$i]."','1','DCFD')";

                    $lastId = insertQuery($connection, $assembly_sub_component);
                }
            } 

            $_SESSION['toast_list']['type'] = "success";
            $_SESSION['toast_list']['message'] = "Data Added successfully.";
            header('Location: dcfd.php');
        }
       
    }
    else
    {
        if (($_FILES['image']['name']!=""))
        {
            $target_dir = 'assets/uploads/coa-sample-assembly/';
            $file = $_FILES['image']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $filename = time().'.'.$ext;
            $temp_name = $_FILES['image']['tmp_name'];
            $path_filename_ext = $target_dir.$filename;

            if (file_exists($path_filename_ext)) 
            {
                echo "Sorry, file already exists.";
            }
            else
            {
                move_uploaded_file($temp_name,$path_filename_ext);
            }
        }
        else
        {
            $filename = $images; 
        }
        // *********************************PDF************************************************
        $query = "UPDATE tbl_dcfd SET name ='".$name_data."',product_id='".$product_id_fk."',process_id='".$process_id."',image ='".$filename."',pdf ='".$filename_pdf."' WHERE id ='".$id."'";
    
        $updatedata = updateQuery($connection, $query);

        $dcfd_id = $id;

         // Upload Pdf start
        $deletePreviousCoa = deleteRecord($connection, 'tbl_dcfd_drawing_of_assembly ', array('dcfd_id'=>$id));

        if(count($savedPdfs) > 0){
            $i=0;
            foreach ($savedPdfs as $value) {
                $insertsavedPdfs = ($value!="") ? insertRecord($connection, 'tbl_dcfd_drawing_of_assembly', array('drawing_of_assembly_pdf'=>$value, 'dcfd_id'=> $dcfd_id)) : "";
                $i++;
            }
        }

        $target_dirs = 'assets/uploads/dcfd_Pdf/';
        $dcfdPdfsFileArray = array();
        if($dcfd_pdfs!="" && count($dcfd_pdfs['name']) > 0){
            for ($x=0; $x < count($dcfd_pdfs['name']); $x++) {

                $fileNameDCFD = (isset($dcfd_pdfs['name'][$x]) && $dcfd_pdfs['name'][$x]!='') ? $dcfd_pdfs['name'][$x] : "";

                $dcfdPdfsFileArray['name'] = $dcfd_pdfs['name'][$x];
                $dcfdPdfsFileArray['type'] = $dcfd_pdfs['type'][$x];
                $dcfdPdfsFileArray['tmp_name'] = $dcfd_pdfs['tmp_name'][$x];
                $dcfdPdfsFileArray['error'] = $dcfd_pdfs['error'][$x];
                $dcfdPdfsFileArray['size'] = $dcfd_pdfs['size'][$x];
                $DCFDUpload = ($fileNameDCFD!="") ? fileUpload($target_dirs, $dcfdPdfsFileArray, $fileNameDCFD, 2097152, array("pdf")) : false;

                $DCFD = ($fileNameDCFD!="") ? insertRecord($connection, 'tbl_dcfd_drawing_of_assembly', array('drawing_of_assembly_pdf'=>$fileNameDCFD, 'dcfd_id'=> $dcfd_id)) : "";
                $dcfdPdfsFileArray = array();

            }
        }

        // Upload Pdf end


        $query = "UPDATE tbl_su_assembly SET name ='".$name_data."',dcfd_id='".$parent_dcfd."',image ='".$filename."' WHERE id ='".$id."'";
            $updatedata = updateQuery($connection, $query);

            // **************************************add more row id delete in new create**************************
            $deletePreviousCoa = deleteRecord($connection, 'tbl_assembly_sub_component', array('assembly_id_fk'=>$id));

            for($i=0;$i<count($sub_component_id);$i++)
            {
                if(!empty($sub_component_id[$i])){
                    $assembly_sub_component = "INSERT INTO tbl_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$id."','".$sub_component_id[$i]."','1','DCFD')";

                    $lastId = insertQuery($connection, $assembly_sub_component);
                }
            } 

        if($updatedata)
        {
            $_SESSION['toast_list']['type'] = "success";
            $_SESSION['toast_list']['message'] = "Data Updated successfully.";
            header('Location: dcfd.php');
        }
    }
}
else 
{
    $delete_id         = explode("-",$_REQUEST['id']);
    if($delete_id[0]!="" && $delete_id[1]=='delete')
    {
        $query = "DELETE FROM tbl_dcfd WHERE id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $query = "DELETE FROM tbl_dcfd_drawing_of_assembly WHERE dcfd_id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $_SESSION['toastr']['type'] = "success";
        $_SESSION['toastr']['message'] = "Record Deleted successfully.";
        header('Location: dcfd.php');
    
    }
    else if($delete_id[0]!="" && $delete_id[1]=='delete_assembly')
    {
        $query = "DELETE FROM tbl_su_assembly WHERE id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $_SESSION['toastr']['type'] = "success";
        $_SESSION['toastr']['message'] = "Record Deleted successfully.";
        header('Location: assembly.php');
    }
    else if($delete_id[0]!="" && $delete_id[1]=='delete_subsu_assembly')
    {
        $query = "DELETE FROM tbl_subsu_assembly WHERE id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $_SESSION['toastr']['type'] = "success";
        $_SESSION['toastr']['message'] = "Record Deleted successfully.";
        header('Location: subsu_assembly.php');
    }
    else if($delete_id[0]!="" && $delete_id[1]=='delete_su_assembly')
    {
        $query = "DELETE FROM tbl_assembly WHERE id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $_SESSION['toastr']['type'] = "success";
        $_SESSION['toastr']['message'] = "Record Deleted successfully.";
        header('Location: product-management.php');
    }
    else if($delete_id[0]!="" && $delete_id[1]=='delete_subcomponent')
    {
        $query = "DELETE FROM tbl_sub_component WHERE id ='".$delete_id[0]."'";
        deleteQuery($connection, $query);

        $_SESSION['toastr']['type'] = "success";
        $_SESSION['toastr']['message'] = "Record Deleted successfully.";
        header('Location: sub-components.php');
    }

    if($_REQUEST['type']=='ASSEBLY')
    {
        $name_data      = $_REQUEST['name'];
        $parent_dcfd    = $_REQUEST['parent_dcfd'] ? implode(",",$_REQUEST['parent_dcfd']):'';
        $addeddate      = date("d-m-y h:i:s");
        $id             = $_REQUEST['id'];
        $images         = $_REQUEST['images'];
        
        if($_REQUEST['submit']=='Add')
        {
            if (($_FILES['image']['name']!=""))
            {
                $target_dir = 'assets/uploads/coa-sample-assembly/';
                $file = $_FILES['image']['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $filename = time().'.'.$ext;
                $temp_name = $_FILES['image']['tmp_name'];
                $path_filename_ext = $target_dir.$filename;

                if (file_exists($path_filename_ext)) 
                {
                    echo "Sorry, file already exists.";
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }
            else
            {
                $filename = ""; 
            }
            $sql = "INSERT INTO tbl_su_assembly(name,dcfd_id,image,addeddate,updateddate) VALUES ('".$name_data."','".$parent_dcfd."','".$filename."','".$addeddate."','".$addeddate."')";
            
            $results = insertQuery($connection, $sql);
            if($results)
            {
                for($i=0;$i<count($sub_component_id);$i++)
                {
                    if(!empty($sub_component_id[$i])){
                        $assembly_sub_component = "INSERT INTO tbl_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$results."','".$sub_component_id[$i]."','1','assembly')";

                        $lastId = insertQuery($connection, $assembly_sub_component);
                    }
                } 
                $_SESSION['toast_list']['type'] = "success";
                $_SESSION['toast_list']['message'] = "Data Added successfully.";
                header('Location: assembly.php');
            }
        
        }
        else
        {
            if (($_FILES['image']['name']!=""))
            {
                $target_dir = 'assets/uploads/coa-sample-assembly/';
                $file = $_FILES['image']['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $filename = time().'.'.$ext;
                $temp_name = $_FILES['image']['tmp_name'];
                $path_filename_ext = $target_dir.$filename;
    
                if (file_exists($path_filename_ext)) 
                {
                    echo "Sorry, file already exists.";
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }
            else
            {
                $filename = $images; 
            }
        
            $query = "UPDATE tbl_su_assembly SET name ='".$name_data."',dcfd_id='".$parent_dcfd."',image ='".$filename."' WHERE id ='".$id."'";
            
            $updatedata = updateQuery($connection, $query);
            // **************************************add more row id delete in new create**************************
            $deletePreviousCoa = deleteRecord($connection, 'tbl_assembly_sub_component', array('assembly_id_fk'=>$id));

            for($i=0;$i<count($sub_component_id);$i++)
            {
                if(!empty($sub_component_id[$i])){
                    $assembly_sub_component = "INSERT INTO tbl_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$id."','".$sub_component_id[$i]."','1','assembly')";

                    $lastId = insertQuery($connection, $assembly_sub_component);
                }
            } 
            if($updatedata)
            {
                $_SESSION['toast_list']['type'] = "success";
                $_SESSION['toast_list']['message'] = "Data Updated successfully.";
                header('Location: assembly.php');
            }
        }
      
    }

    if($_REQUEST['type']=='SUB_ASSEBLY')
    {
        $name_data      = $_REQUEST['name'];
        $parent_dcfd    = $_REQUEST['parent_dcfd'] ? implode(",",$_REQUEST['parent_dcfd']):'';
        $addeddate      = date("d-m-y h:i:s");
        $id             = $_REQUEST['id'];
        $images         = $_REQUEST['images'];
        
        if($_REQUEST['submit']=='Add')
        {
            if (($_FILES['image']['name']!=""))
            {
                $target_dir = 'assets/uploads/coa-sample-assembly/';
                $file = $_FILES['image']['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $filename = time().'.'.$ext;
                $temp_name = $_FILES['image']['tmp_name'];
                $path_filename_ext = $target_dir.$filename;

                if (file_exists($path_filename_ext)) 
                {
                    echo "Sorry, file already exists.";
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }
            else
            {
                $filename = ""; 
            }
            $sql = "INSERT INTO tbl_subsu_assembly(name,dcfd_id,image,addeddate,updateddate) VALUES ('".$name_data."','".$parent_dcfd."','".$filename."','".$addeddate."','".$addeddate."')";
            
            $results = insertQuery($connection, $sql);
            if($results)
            {
                for($i=0;$i<count($sub_component_id);$i++)
                {
                    if(!empty($sub_component_id[$i])){
                        $assembly_sub_component = "INSERT INTO tbl_sub_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$results."','".$sub_component_id[$i]."','1','assembly')";

                        $lastId = insertQuery($connection, $assembly_sub_component);
                    }
                } 
                $_SESSION['toast_list']['type'] = "success";
                $_SESSION['toast_list']['message'] = "Data Added successfully.";
                header('Location: subsu_assembly.php');
            }
        
        }
        else
        {
            if (($_FILES['image']['name']!=""))
            {
                $target_dir = 'assets/uploads/coa-sample-assembly/';
                $file = $_FILES['image']['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $filename = time().'.'.$ext;
                $temp_name = $_FILES['image']['tmp_name'];
                $path_filename_ext = $target_dir.$filename;
    
                if (file_exists($path_filename_ext)) 
                {
                    echo "Sorry, file already exists.";
                }
                else
                {
                    move_uploaded_file($temp_name,$path_filename_ext);
                }
            }
            else
            {
                $filename = $images; 
            }
        
            $query = "UPDATE tbl_subsu_assembly SET name ='".$name_data."',dcfd_id='".$parent_dcfd."',image ='".$filename."' WHERE id ='".$id."'";
            
            $updatedata = updateQuery($connection, $query);
            // **************************************add more row id delete in new create**************************
            $deletePreviousCoa = deleteRecord($connection, 'tbl_sub_assembly_sub_component', array('assembly_id_fk'=>$id));

            for($i=0;$i<count($sub_component_id);$i++)
            {
                if(!empty($sub_component_id[$i])){
                    $assembly_sub_component = "INSERT INTO tbl_sub_assembly_sub_component(assembly_id_fk,sub_component_id_fk,is_active,type) VALUES ('".$id."','".$sub_component_id[$i]."','1','assembly')";

                    $lastId = insertQuery($connection, $assembly_sub_component);
                }
            } 
            if($updatedata)
            {
                $_SESSION['toast_list']['type'] = "success";
                $_SESSION['toast_list']['message'] = "Data Updated successfully.";
                header('Location: subsu_assembly.php');
            }
        }
      
    }


    if($_REQUEST['type']=='onchange_dcfd')
    {
        $dcfd_ids           = $_REQUEST['dcfd_ids'];
        if(!empty($dcfd_ids)){
            $dcfd_ids           = implode(',', $dcfd_ids);
            $su_assembly_id     = $_REQUEST['su_assembly_id'];
            
            $selectdcfd         = "SELECT * FROM tbl_su_assembly where dcfd_id IN(".$dcfd_ids.")";
        }else{
            $selectdcfd         = "SELECT * FROM tbl_su_assembly where dcfd_id = ''";
        }
        $queryResultdcfd    = selectQuery($connection, $selectdcfd);
        $count              = $queryResultdcfd->num_rows;
     
        if($count>0)
        {
            while ($row_dcfd = $queryResultdcfd->fetch_assoc()) 
            { ?>
                <option value="<?php echo $row_dcfd['id']; ?>" <?=$row_dcfd['id'] == $su_assembly_id ? ' selected="selected"' : '';?>><?php echo $row_dcfd['name']; ?></option>
            <?php } 
        }
        else
        { ?>
            <option value="">Record Not Found!</option>
        <?php }

        
    }


}
?>