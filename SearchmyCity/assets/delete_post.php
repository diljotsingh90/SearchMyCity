
<?php
session_start();
include_once 'conn2.php';
if (isset($_SESSION['u_id'])){
			$id = mysqli_real_escape_string($conn2,$_GET['id']);
			$sql = "DELETE FROM `posts` WHERE `posts`.`id` = '$id';";
			mysqli_query($conn2, $sql);

			header("Location: ../wall.php?deleted succesfully");
}
else{
	header("Location: ../login.html");
}