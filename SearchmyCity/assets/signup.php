<?php
include_once 'conn.php';
if (isset($_POST['submit'])){
$first = mysqli_real_escape_string($conn,$_POST['first']);
$last = mysqli_real_escape_string($conn,$_POST['last']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
$user = mysqli_real_escape_string($conn,$_POST['user']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);

//echo($first.$last.$email.$mobile.$user.$pass);
if (empty($first) || empty($last) || empty($email) || empty($mobile) || empty($user) || empty($pass)){
//echo($first.$last.$email.$mobile.$user.$pass);
		echo "<script type='text/javascript'>alert('One or more than one fields are Empty.')</script>";
		header( "refresh:0; url=../signup.html" );

}else{
//Chech if characters are valid
	if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){
		echo "<script type='text/javascript'>alert('Please enter Valid First Name or Last Name.')</script>";
		header( "refresh:0; url=../signup.html" );
		//echo "$first $last";
		//exit();
	}else{
		if(!preg_match("/^[0-9]{10}+$/",$mobile)){
			echo "<script type='text/javascript'>alert('Please enter a valid Mobile Number.')</script>";
		header( "refresh:0; url=../signup.html" );
		}else{
		//Check if email is valid
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "<script type='text/javascript'>alert('Please enter a valid Email.')</script>";
		header( "refresh:0; url=../signup.html" );
		    //exit();
		}else{
			$sql = "SELECT * FROM users WHERE Username = '$user'";
			$result = mysqli_query($conn,$sql);
			$resultcheck = mysqli_num_rows($result);
		
		if($resultcheck > 0){
			echo "<script type='text/javascript'>alert('Another User with same Username exits, Please try another one.')</script>";
		header( "refresh:0; url=../signup.html" );
			//exit();
		}
		else{
			//hashing the password
			$hashedwd = password_hash($pass, PASSWORD_DEFAULT);
			// insert the user into the database
			$sql = "INSERT INTO `users` (`ID`, `first_name`, `last_name`, `email`, `mobile`, `username`, `password`) VALUES (NULL,'$first','$last','$email','$mobile','$user','$hashedwd');";
			//echo($first.$last);
				mysqli_query($conn,$sql);
				echo "<script type='text/javascript'>alert('You have successfully registered. Please Login to Continue.')</script>";
		header( "refresh:0; url=../login.html" );
		//exit();
		}
		}
	}}
}
}
else{
	header("Location: ../signup.html");
}