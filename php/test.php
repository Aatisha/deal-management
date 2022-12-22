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
echo $query_login;
		$quer_hos="INSERT INTO `hospital_table`(`hospital_name`, `hospital_phone_no`, `hospital_mail_id`, `login_id`, `hospital_unique_number`, `hospital_address`, `poc_name`, `poc_phone_no`, `poc_email`, `createdAt`) VALUES ('$hname','$hphone','$hemail','$login_id','$uid','$haddress','$name','$phone','$email',NOW())";
echo $quer_hos;
		$quer_manu="INSERT INTO `manufacturer_table`(`manufacturer_name`, `manufacturer_phone_no`, `manufacturer_mail_id`, `cname`, `caddr`, `cphone`, `cemail`, `gst`, `login_id`, `createdAt`) VALUES ('$name','$phone','$email','$cname','$caddress','$cphone','$cemail','$gstno','$login_id',NOW())";
		echo $quer_manu;


?>