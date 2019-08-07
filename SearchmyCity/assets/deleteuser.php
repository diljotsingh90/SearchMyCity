<?php

if(isset($_POST['submit']))
{
    session_start();
include_once 'conn.php';
$uid = $_SESSION['u_id'];
$pwd = mysqli_real_escape_string($conn, $_POST['pass']);
//Error handlers
//Check if inputs are empty
if( empty($pwd)){
    //header("url: ../login.html");
    echo "<script type='text/javascript'>alert('Empty fields.')</script>";
    header( "refresh:0; url=../delete.php" );
}
else{
        $sql = "Select * FROM users WHERE ID = '$uid'";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        
            if($row = mysqli_fetch_assoc($result)){
                //de-password
                $hashedPwdchk = password_verify($pwd,$row['password']);
                if($hashedPwdchk == false){
                    echo "<script type='text/javascript'>alert(' Incorrect Password.')</script>";
                    //exit();
                    header( "refresh:0; url=../delete.php" );
                }elseif ($hashedPwdchk == true) {
                    //Delete the user here
                        $sql = " DELETE FROM `users` WHERE `users`.`ID` = '$uid';";
                        mysqli_query($conn,$sql);
                       
                        echo "<script type='text/javascript'>alert('Deleted Succesfully')</script>";
                        header( "refresh:0; url=../home.html" );
                        session_unset();
    session_destroy();
                        //exit();
                        //echo $_SESSION['u_user'];
                    }
                }
            
        }
}
else{
    header("Location: ../profile.php?error");
}       

