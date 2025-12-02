
<?php
  $message = ''; 
  $txt = 'Photo'; 

  if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload '.$txt)
  {
    print_r(isset($_FILES['uploadedFile'])?'get files':'no files');
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
    {
      // get details of the uploaded file
      $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
      $fileName = $_FILES['uploadedFile']['name'];
      $fileSize = $_FILES['uploadedFile']['size'];
      $fileType = $_FILES['uploadedFile']['type'];
      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));
   
      // sanitize file-name
      $newFileName =  $cid.'_'.$fileName;
      print_r($newFileName);
      // check if file has one of the following extensions
      if($txt=="Photo"){
        $allowedfileExtensions = array('jpg', 'gif', 'png');
      }else{
        $allowedfileExtensions = array('txt', 'xls', 'doc');
      }
     
   
      if (in_array($fileExtension, $allowedfileExtensions))
      {
        // directory in which the uploaded file will be moved
        $uploadFileDir = '../../uploads/'.$txt .'/';
        print_r($uploadFileDir);
        $dest_path = $uploadFileDir . $newFileName;
   
        if(move_uploaded_file($fileTmpPath, $dest_path)) 
        {
          $message ='File is successfully uploaded.';
        }
        else
        {
          $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }
      }
      else
      {
        $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
      }
    }
    else
    {
      $message = 'There is some error in the file upload. Please check the following error.<br>';
      //$message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
  }
  $_SESSION['message'] = $message;
?>
<!-- <html>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="display:flex">
            <div class="upload-wrapper">
                <span class="file-name">Choose a file...</span>
                <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
            </div>
            <input type="submit" name="uploadBtn" style="margin-left:5px;" class="btn btn-primary" value="Upload <?php echo $txt?>" />
        </div>
    </form>
</body>

</html> -->