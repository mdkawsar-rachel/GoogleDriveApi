<?php

//upload.php
include './GoogleDriveApi.php';
$api = new GoogleDriveApi('./credentials.json');
if(isset($_FILES['images']))
{
	for($count = 0; $count < count($_FILES['images']['name']); $count++)
	{
		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

		$new_name = uniqid() . '.' . $extension;
		
		$fullName = $_FILES['images']['name'];
		$mimeType = $_FILES['images']['type'];
		$fullPath = $_FILES['images']['tmp_name'];
		

		$api->uploadFile($fullName, $mimeType, $fullPath, $parentId = "1znA_9QuxYdVMD1FVPp-xPfirbBJRW-Dm");
		//move_uploaded_file($_FILES['images']['tmp_name'][$count], 'images/' . $new_name);

	}

	echo 'success';
}


?>
