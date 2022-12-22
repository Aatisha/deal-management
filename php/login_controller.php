<?php
include_once('config.php');
$username=$_POST['username'];
$password=$_POST['password'];
$hashpassword=md5($password);
//echo "hey";
$query_login="SELECT role from logintable where username='$username' and password='$hashpassword'";
//echo $query_login;
$result=mysqli_query($conn, $query_login);
$rowcount=mysqli_num_rows($result);
if($rowcount>0){
	//echo "inside sse";
	$row=mysqli_fetch_array($result);
	$role=$row['role'];
	session_start();
	$_SESSION["username"]=$username;
	$_SESSION["role"]=$role;
	if($role=="1")
	{
		//echo "hhh";
			header('Location: ../hospitaldashboard.php');

	}
	if($role=="0")
	{
			//echo "qqq";
			header('Location: ../manufacturedashboard.php');
	}
	

}
else
		{
			//echo "Asa";
			header('Location: ../login.php?status=fail');
		}

?>