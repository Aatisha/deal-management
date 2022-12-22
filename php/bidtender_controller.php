<?php
include_once('config.php');
$mrp=$_POST['mrp'];
$bidrate=$_POST['bidrate'];
$bidqty=$_POST['bidqty'];
$biddod=$_POST['biddod'];
$desc=$_POST['biddesc'];
$manuid=$_POST['manuid'];
$tid=$_POST['tid'];
$query_issue="";

$query_bid="INSERT INTO `tender_applied`(`manufacturer_id`, `tender_id`, `mrp`, `bid_rate`, `bid_qty`, `bid_dod`, `description`,`createdAt`) VALUES ('$manuid','$tid','$mrp','$bidrate','$bidqty','$biddod','$desc',NOW())";
//echo $query_bid;
if(mysqli_query($conn, $query_bid))
{
	echo "<script> alert(\"Bid successfully placed.\"); window.location.replace(\"../manufacturedashboard.php\");</script>";
}

else
{
echo "<script> alert(\"Problem occured while bidding tender. Try Again!\"); window.location.replace(\"../manufacturedashboard.php\");</script>";
}		

?>