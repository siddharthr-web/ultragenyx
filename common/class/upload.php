<?php
  $message = ''; 
  $actionMode = !empty($_REQUEST['action'])?$_REQUEST['action']:"";
  $doctype = !empty($_REQUEST['doctype'])?$_REQUEST['doctype']:"";
  $cid =$_POST["candidate_id"];
  $oldfile = !empty($_REQUEST['oldfile'])?$_REQUEST['oldfile']:"";
  $filetoupload = 'file_'.$doctype;
  $records = [];
  // print_r('out '.$doctype);
  // print_r('cid '.$cid);
   //print_r('cid '.$oldfile);
   
  if($actionMode == "upload") {
    //print_r('in '.$doctype);
    if(!empty($_FILES[$filetoupload]) && $_FILES[$filetoupload]['name'] != "")
    {
      //print_r('in '.$filetoupload);
      // get details of the uploaded file
      $fileTmpPath = $_FILES[$filetoupload]['tmp_name'];
      $fileName = $_FILES[$filetoupload]['name'];
      $fileSize = $_FILES[$filetoupload]['size'];
      $fileType = $_FILES[$filetoupload]['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));
   
      // sanitize file-name
      $newFileName =  $cid.'_'.strtotime("now").'_'.$fileName;

      //print_r($newFileName);
      // check if file has one of the following extensions
      if($doctype=="photo"){
        $allowedfileExtensions = array('jpg', 'jpeg', 'png');
      }else{
        $allowedfileExtensions = array('txt', 'xls', 'doc', 'docx', 'wpd', 'pdf', 'rtf', 'odt');
      }
     
   
      if (in_array($fileExtension, $allowedfileExtensions))
      {
        // directory in which the uploaded file will be moved
        $uploadFileDir = '../../uploads/'.$doctype .'/';
        $dest_path = $uploadFileDir . $newFileName;
        if($oldfile!="" && file_exists('../../uploads/'.$doctype .'/'.$oldfile)){
            unlink('../../uploads/'.$doctype .'/'.$oldfile);
        }
       
        if(move_uploaded_file($fileTmpPath, $dest_path)) 
        {
          $records["msg"] = 'File is successfully uploaded.';
          $records["newFileName"] = $newFileName;
          $records["cid"] = $cid;
          $records["result"] = "1";
        }
        else
        {
          $records["msg"] = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
          $records["result"] = "0";
        }
      }
      else
      {
        $records["msg"] = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        $records["result"] = "0";
      }
    }
  }
  header('Content-Type: application/json');
  echo json_encode($records);
?>