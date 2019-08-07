<?php
session_start();
include_once 'conn.php';
if (isset($_POST['submit'])){
$first = mysqli_real_escape_string($conn,$_POST['first']);
$last = mysqli_real_escape_string($conn,$_POST['last']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
$user = mysqli_real_escape_string($conn,$_POST['user']);
$id = $_SESSION['u_id'];


//echo($first.$last.$email.$mobile.$user.$id);
if (empty($first) || empty($last) || empty($email) || empty($mobile) || empty($user) ){
//echo($first.$last.$email.$mobile.$user.$pass);
		echo "<script type='text/javascript'>alert('One or more than one fields are Empty.')</script>";
		header( "refresh:0; url=../edit.php?empty fields" );

}else{
//Chech if characters are valid
	if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){
		echo "<script type='text/javascript'>alert('Please enter Valid First Name or Last Name.')</script>";
		header( "refresh:0; url=../edit.php?name" );
		//echo "$first $last";
		//exit();
	}else{
		//Check if email is valid
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "<script type='text/javascript'>alert('Please enter a valid Email.')</script>";
		header( "refresh:0; url=../edit.php?email" );
		    //exit();
		}else{
			
			$sql = "UPDATE `users` SET `first_name` = '$first', `last_name` = '$last', `email` = '$email', `mobile` = '$mobile', `username` = '$user' WHERE `users`.`ID` = '$id'";
			//echo($first.$last);
				mysqli_query($conn,$sql);
				session_unset();
				session_destroy();
					
					echo "<script type='text/javascript'>alert('You have successfully edited your credentials. Please use the new credentials to login.')</script>";
		header( "refresh:0; url=../login.html?edited" );
				
		//exit();
		
		}
	}
}
}
else{
	header("Location: ../profile.php?error");
}