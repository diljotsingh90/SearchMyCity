<?php
session_start();
include_once 'conn2.php';
if (isset($_POST['submit'])){
	$id = $_SESSION['post_id'];
$title = mysqli_real_escape_string($conn2,$_POST['title']);
$category = mysqli_real_escape_string($conn2,$_POST['category']);
$sub_category = mysqli_real_escape_string($conn2,$_POST['sub_category']);
$description = mysqli_real_escape_string($conn2,$_POST['description']);
$t_open = mysqli_real_escape_string($conn2,$_POST['t_open']);
$t_close = mysqli_real_escape_string($conn2,$_POST['t_close']);
$address = mysqli_real_escape_string($conn2,$_POST['address']);
$area = mysqli_real_escape_string($conn2,$_POST['area']);
$city = mysqli_real_escape_string($conn2,$_POST['city']);
$state = mysqli_real_escape_string($conn2,$_POST['state']);
$sp_name = mysqli_real_escape_string($conn2,$_POST['sp_name']);
$mobile = mysqli_real_escape_string($conn2,$_POST['mobile']);
//$uploader_id = $_SESSION['u_id'];

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
			
			$sql = "UPDATE `posts` SET `title` = '$title', `category` = '$category', `s_category` = '$sub_category', `description` = '$description', `t_open` = '$t_open', `t_close` = '$t_close', `address` = '$address', `area` = '$area', `city` = '$city', `state` = '$state', `spname` = '$sp_name', `mobile` = '$mobile',`u_date` = CURRENT_TIMESTAMP WHERE `posts`.`id` = '$id'";
			//echo($first.$last);
				mysqli_query($conn2,$sql);
				echo "<script type='text/javascript'>alert('You have successfully posted. Please Upload an Image.')</script>";
				unset ($_SESSION['post_id']);
				header("Location: ../wall.php?successfully edited");
				
				
			}
			
				
		//exit();
		
		}
	

}
else{
	header("Location: ../wall.php");
}