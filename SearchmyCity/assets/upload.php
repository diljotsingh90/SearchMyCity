
<?php
session_start();
include_once'conn2.php';
if (isset($_POST['submit_image'])){

	
$file =$_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName =$_FILES['file']['tmp_name'];
$fileSize =$_FILES['file']['size'];
$fileError =$_FILES['file']['error'];
$fileType =$_FILES['file']['type'];

$fileExt = explode('.',$fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png','pdf');
// form validation
if(in_array($fileActualExt, $allowed)){	
	if($fileError ===0){
		if($fileSize <10000000) {
		$fileNameNew = uniqid('',true).".".$fileActualExt;
		$fileDestination = 'uploads/'.$fileNameNew;
		move_uploaded_file($fileTmpName,$fileDestination);
		//header("Location:upload.html?uploadsuccess");
		$_SESSION['filepath'] = $fileDestination;
		header("Location:../pyp_form.php");
		} 
		else {
		echo"your file is too big!";
		}
	}
	else {
	echo "There was an error uploading your file!";
	}
} 
else {
	echo "Format not valid!";
	}

}
else{
	header("Location:../imageupl.php");
}
