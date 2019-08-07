<?php
session_start();
include_once 'conn2.php';
if (isset($_POST['submit'])){
$title = mysqli_real_escape_string($conn2,$_POST['title']);
$category = mysqli_real_escape_string($conn2,$_POST['category']);
$sub_category = mysqli_real_escape_string($conn2,$_POST['sub_category']);
$description = mysqli_real_escape_string($conn2,$_POST['description']);
if (isset($_SESSION['filepath'])) {
	$imagepath = $_SESSION['filepath'];# code...
}
else{
	$imagepath = "none.jpg";
}

$t_open = mysqli_real_escape_string($conn2,$_POST['t_open']);
$t_close = mysqli_real_escape_string($conn2,$_POST['t_close']);
$address = mysqli_real_escape_string($conn2,$_POST['address']);
$area = mysqli_real_escape_string($conn2,$_POST['area']);
$city = mysqli_real_escape_string($conn2,$_POST['city']);
$state = mysqli_real_escape_string($conn2,$_POST['state']);
$sp_name = mysqli_real_escape_string($conn2,$_POST['sp_name']);
$mobile = mysqli_real_escape_string($conn2,$_POST['mobile']);
$uploader_id = $_SESSION['u_id'];

//echo($first.$last.$email.$mobile.$user.$pass);
if (empty($title) || empty($category) || empty($sub_category) || empty($description)  || empty($t_open) || empty($t_close) || empty($address) || empty($city) || empty($state) || empty($sp_name) || empty($mobile) || empty($area)){
//echo
		echo "<script type='text/javascript'>alert('One or more than one fields are Empty.')</script>";
		header( "refresh:0; url=../pyp.html" );

}else{
//Chech if characters are valid
	if(!preg_match("/^[a-zA-Z]*$/",$title) ){
		echo "<script type='text/javascript'>alert('Enter a valid title')</script>";
		header( "refresh:0; url=../pyp.html" );
		//echo "$first $last";
		//exit();
	}else{
			$sql = "SELECT * FROM posts WHERE TITLE = '$title'";
			$result = mysqli_query($conn2,$sql);
			$resultcheck = mysqli_num_rows($result);
		
		if($resultcheck > 0){
			echo "<script type='text/javascript'>alert('Another post with same name exits, Please try again with a different one.')</script>";
		header( "refresh:0; url=../pyp.php" );
			//exit();
		}
		else{
			$sql = "INSERT INTO `posts` (`id`, `title`, `category`, `s_category`, `description`, `t_open`, `t_close`, `address`, `area`, `city`, `state`, `spname`, `mobile`, `u_id`, `u_date`,`imagepath`) VALUES (NULL, '$title', '$category', '$sub_category', '$description', '$t_open', '$t_close', '$address', '$area', '$city', '$state', '$sp_name', '$mobile', '$uploader_id', CURRENT_TIMESTAMP,'$imagepath');";
			//echo($first.$last);
				mysqli_query($conn2,$sql);
				echo "<script type='text/javascript'>alert('You have successfully posted. Please Upload an Image.')</script>";
				unset ($_SESSION['filepath']);
				header("Location: ../wall.php");
				
				}
			}
			
				
		//exit();
		
		}
	

}
else{
	header("Location: ../pyp.php");
}