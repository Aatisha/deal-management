<?php
include_once('config.php');
$npassword=$_POST['npassword'];
$opassword=$_POST['opassword'];
$hopass=md5($opassword);
$username=$_POST['username'];
$query_chkpass="SELECT * from logintable where username='$username' and password='$hopass'";
//echo $query_chkpass;
$result=mysqli_query($conn, $query_chkpass);
$rowcount=mysqli_num_rows($result);
if($rowcount>0){
	$hnpass=md5($npassword);
	$query_pass="UPDATE `logintable` SET `password`='$hnpass',`updatedAt`=NOW() WHERE username='$username'";
	//echo $query_pass;
	if(mysqli_query($conn, $query_pass))
	{
		//echo "successfully";
		session_start();
 		session_destroy();
		echo "<script> alert(\"Password updated successfully.\"); window.location.replace(\"../login.php\");</script>";
	}
	else
	{
	//echo "error";
	header('Location: ../changePass.php?status=error');
	}
}
else
{
//echo "pass not";
	header('Location: ../changePass.php?status=oldPassNotMatch');
}
	

?>