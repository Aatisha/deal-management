<?php 
include_once('config.php');
date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");
$yesterday = date('Y-m-d',strtotime("-1 days"));
//echo $today."<br>".$yesterday;
$query1 ='UPDATE `tenders_details` SET `tender_display_status`=1 WHERE `tender_start_date`="'.$today.'"  and `tender_display_status` ="0" ';
$query2='UPDATE `tenders_details` SET `tender_display_status`=-1 WHERE `tender_end_date`="'.$yesterday.'"  and `tender_display_status` = "1"';
///echo $query1."<br>".$query2;
if(mysqli_query($conn, $query1) && mysqli_query($conn, $query2))
{
	echo "Success";
}
else
{
	echo "Fail";
}


?>
