<?php
$user = 'root';
$password = 'root';
$db = 'post';
$host = 'localhost';
$port = 3306;
$message = '';
$conn2 = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
if($conn2->connect_error){
	$message = $conn2->connect_error;
}
else{
	
}
