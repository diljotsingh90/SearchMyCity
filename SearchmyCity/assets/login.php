<?php
session_start();
if(isset($_POST['submit']))
{
include_once 'conn.php';
$uid = mysqli_real_escape_string($conn, $_POST['user']);
$pwd = mysqli_real_escape_string($conn, $_POST['pass']);
//Error handlers
//Check if inputs are empty
if(empty($uid) || empty($pwd)){
	//header("url: ../login.html");
	echo "<script type='text/javascript'>alert('One or both of the fields are Empty.')</script>";
	header( "refresh:0; url=../login.html" );
}
else{
		$sql = "Select * FROM users WHERE username = '$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			echo "<script type='text/javascript'>alert('Incorrect Username or Password.')</script>";
	header( "refresh:0; url=../login.html" );
			//exit();

		}
		else{
			if($row = mysqli_fetch_assoc($result)){
				//de-password
				$hashedPwdchk = password_verify($pwd,$row['password']);
				if($hashedPwdchk == false){
					echo "<script type='text/javascript'>alert('Incorrect Username or Password.')</script>";
					//exit();
					header( "refresh:0; url=../login.html" );
				}elseif ($hashedPwdchk == true) {
					//Log in the user here
					
						$_SESSION['u_id'] = $row['ID'];
						$_SESSION['u_first'] = $row["first_name"];
						$_SESSION['u_last'] = $row["last_name"];
						$_SESSION['u_email'] = $row['email'];
						$_SESSION['u_mobile'] = $row['mobile'];
						$_SESSION['u_user'] = $row['username'];
						$name = $_SESSION['u_first'].$_SESSION['u_last'];
						echo "<script type='text/javascript'>alert('Logged In Succesfully')</script>";
						header( "refresh:0; url=../wall.php" );
						//exit();
						//echo $_SESSION['u_user'];
					}
				}
			}
		}
}
else{
	header("Location: ../login.php?login=empty");
}		

