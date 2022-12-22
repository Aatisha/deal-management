<?php
include_once('config.php');
session_start();
$euname =$_SESSION['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$username=$_POST['username'];
$cname=$_POST['cname'];
$cphone=$_POST['cphone'];
$cemail=$_POST['cemail'];
$caddress=$_POST['caddress'];
$gst=$_POST['gst'];
$manu_id=$_POST['manu_id'];
$query_username='UPDATE `logintable` SET `username`="'.$username.'" WHERE `username`="'.$euname.'"';
$query_edit="UPDATE `manufacturer_table` SET `manufacturer_name`='$name',`manufacturer_phone_no`='$phone',`manufacturer_mail_id`='$email',`cname`='$cname',`caddr`='$caddress',`cphone`='$cphone',`cemail`='$cemail',`gst`='$gst',`updatedAt`=NOW() WHERE `manufacturer_id`='$manu_id'";
//echo $query_edit;
if(mysqli_query($conn, $query_edit) && mysqli_query($conn, $query_username))
{
	
			
			echo "<script> alert(\"Successfully updated.\"); window.location.replace(\"../manufacturedashboard.php\");</script>";
			$_SESSION['username'] = $username;
		
}
	
else
		{
			 echo "<script> alert(\"Problem occured while updating.\"); window.location.replace(\"../manufacturedashboard.php\");</script>";
		}
			

?>