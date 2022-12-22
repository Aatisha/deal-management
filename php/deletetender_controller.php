<?php
include_once('config.php');
$tid=$_POST['tid'];

$query_delete="DELETE FROM `tenders_details` WHERE `tender_id`=".$tid;
//echo $query_delete;
if(mysqli_query($conn, $query_delete))
{
	echo "<script> alert(\"Tender deleted successfully.\"); window.location.replace(\"../delete_tender.php\");</script>";

}

else
{
echo "<script> alert(\"Problem occured while deleting tender.\"); window.location.replace(\"../delete_tender.php\");</script>";
}		

?>