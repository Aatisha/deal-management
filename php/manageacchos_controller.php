<?php
include_once('config.php');
session_start();
$euname =$_SESSION['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$hname=$_POST['hname'];
$hphone=$_POST['hphone'];
$hemail=$_POST['hemail'];
$haddress=$_POST['haddress'];
$uid=$_POST['uid'];
$hos_id=$_POST['hos_id'];
$query_username='UPDATE `logintable` SET `username`="'.$username.'" WHERE `username`="'.$euname.'"';
$query_edit="UPDATE `hospital_table` SET `hospital_name`='$hname',`hospital_phone_no`='$hphone',`hospital_mail_id`='$hemail',`hospital_unique_number`='$uid',`hospital_address`='$haddress',`poc_name`='$name',`poc_phone_no`='$phone',`poc_email`='$email',`updatedAt`=NOW() WHERE hospital_id=".$hos_id;
//echo $query_edit;
if(mysqli_query($conn, $query_edit) && mysqli_query($conn, $query_username))
{
	
			
			echo "<script> alert(\"Successfully updated.\"); window.location.replace(\"../hospitaldashboard.php\");</script>";
			$_SESSION['username'] = $username;
		
}
	
else
		{
			 echo "<script> alert(\"Problem occured while updating.\"); window.location.replace(\"../hospitaldashboard.php\");</script>";
		}
			

?>