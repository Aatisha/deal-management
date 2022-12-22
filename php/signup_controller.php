<?php
include_once('config.php');
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$password=$_POST['password'];
$hashpassword=md5($password);
$role=$_POST['manuhos'];
$cname="";
$caddress="";
$cphone="";
$gstno="";
$hname="";
$hphone="";
$haddress="";
$uid="";
$cemail="";
$hemail="";
if($role=="0")
{
	$cname=$_POST['cname'];
	$caddress=$_POST['caddress'];
	$cphone=$_POST['cphone'];
	$cemail=$_POST['cemail'];
	$gstno=$_POST['gstno'];
}
if($role=="1")
{
	
	$hname=$_POST['hname'];
	$hphone=$_POST['hphone'];
	$hemail=$_POST['hemail'];
	$haddress=$_POST['haddress'];
	$uid=$_POST['uid'];
}
$query_login="INSERT INTO `logintable`(`username`, `password`, `role`, `createdAt`) VALUES ('$username','$hashpassword','$role',NOW())";
if(mysqli_query($conn, $query_login))
{
	$query_getLoginId="SELECT login_id from logintable where username='$username'";
	$result=mysqli_query($conn,$query_getLoginId);
	$row=mysqli_fetch_array($result);
	$login_id=$row['login_id'];
	if($role=="1")
	{
		$quer_hos="INSERT INTO `hospital_table`(`hospital_name`, `hospital_phone_no`, `hospital_mail_id`, `login_id`, `hospital_unique_number`, `hospital_address`, `poc_name`, `poc_phone_no`, `poc_email`, `createdAt`) VALUES ('$hname','$hphone','$hemail','$login_id','$uid','$haddress','$name','$phone','$email',NOW())";
		//echo $quer_hos;
		if(mysqli_query($conn,$quer_hos))
		{
			echo "<script> alert(\"Successfully registered as Hospital.\"); window.location.replace(\"../login.php\");</script>";
		}
		else
		{
			echo "<script> alert(\"Problem occured while registration as Hospital.\"); window.location.replace(\"../login.php\");</script>";
		}
	}
	if($role=="0")
	{
		$quer_manu="INSERT INTO `manufacturer_table`(`manufacturer_name`, `manufacturer_phone_no`, `manufacturer_mail_id`, `cname`, `caddr`, `cphone`, `cemail`, `gst`, `login_id`, `createdAt`) VALUES ('$name','$phone','$email','$cname','$caddress','$cphone','$cemail','$gstno','$login_id',NOW())";
		//echo $quer_manu;
		
		if(mysqli_query($conn,$quer_manu))
		{
			echo "<script> alert(\"Successfully registered as Manufacturer.\"); window.location.replace(\"../login.php\");</script>";
		}
		else
		{
			echo "<script> alert(\"Problem occured while registration as Manufacturer.\"); window.location.replace(\"../login.php\");</script>";
		}
	}



}
else
		{
			echo "<script> alert(\"Problem occured while registration.\"); window.location.replace(\"../login.php\");</script>";
		}

?>