<?php
$user = 'root';
$password = 'root';
$db = 'login';
$host = 'localhost';
$port = 3306;
$message = '';
$conn = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
if($conn->connect_error){
	$message = $conn->connect_error;
}
else{
	
}
