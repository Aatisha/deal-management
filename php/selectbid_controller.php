<?php
include_once('config.php');
$taid=$_POST['taid'];
$tid=$_POST['tid'];

$query_accept_ta='UPDATE `tender_applied` SET `bid_status`=1, `closedAt`=NOW() WHERE `tender_applied_id`='.$taid;
$query_reject_ta='UPDATE `tender_applied` SET `bid_status`=-1, `closedAt`=NOW() WHERE bid_status=0 and tender_id='.$tid;
$query_accept_t='UPDATE `tenders_details` SET `tender_display_status`=2,`closedAt`=NOW() WHERE `tender_id`='.$tid;
// echo $query_accept_ta;
// echo $query_reject_ta;
// echo  $query_accept_t;

if(mysqli_query($conn, $query_accept_ta) && mysqli_query($conn, $query_reject_ta) && mysqli_query($conn, $query_accept_t))
{
	echo "<script> alert(\"Bid successfully accepted.\"); window.location.replace(\"../complete_tender.php\");</script>";

}

else
{
echo "<script> alert(\"Problem occured while accepting bid.\"); window.location.replace(\"../complete_tender.php\");</script>";
}		

?>