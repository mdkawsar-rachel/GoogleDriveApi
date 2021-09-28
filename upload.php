<?php

//upload.php
include './GoogleDriveApi.php';
$api = new GoogleDriveApi('./credentials.json');

//session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    
    $fullName = $fileName;
    $mimeType = $fileType;
    $fullPath = $fileTmpPath;
      if($api->uploadFile($fullName, $mimeType, $fullPath, $parentId = "1znA_9QuxYdVMD1FVPp-xPfirbBJRW-Dm") 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
         
         else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
         }
// $_SESSION['message'] = $message;
//header("Location: index.php");
