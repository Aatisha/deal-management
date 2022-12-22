<?php
include_once('config.php');
$cname=$_POST['cname'];
$composition=$_POST['composition'];
$rate=$_POST['rate'];
$qty=$_POST['qty'];
$dod=$_POST['dod'];
$sd=$_POST['sd'];
$ed=$_POST['ed'];
$desc=$_POST['desc'];
$hosid=$_POST['hosid'];
$uniqueId= abs(microtime()+mt_rand()-date('Y-m'))/date('d');
$tender_no = round($uniqueId, 0);
$sdt=strtotime($sd);
$now = time();
$query_issue="";

if($sdt<=$now){
$query_issue="INSERT INTO `tenders_details`(`tender_number`, `hospital_id`, `components_name`, `composition`, `description`, `expected_rate`, `expected_qty`, `expected_dod`, `tender_start_date`, `tender_end_date`, `tender_display_status`,`createdAt`) VALUES ('$tender_no','$hosid','$cname','$composition','$desc','$rate','$qty','$dod','$sd','$ed','1',NOW())";

}
else{
$query_issue="INSERT INTO `tenders_details`(`tender_number`, `hospital_id`, `components_name`, `composition`, `description`, `expected_rate`, `expected_qty`, `expected_dod`, `tender_start_date`, `tender_end_date`,`createdAt`) VALUES ('$tender_no','$hosid','$cname','$composition','$desc','$rate','$qty','$dod','$sd','$ed',NOW())";
}
//echo $query_issue;
if(mysqli_query($conn, $query_issue))
{
	echo "<script> alert(\"Tender issued successfully.\"); window.location.replace(\"../hospitaldashboard.php\");</script>";
}

else
{
echo "<script> alert(\"Problem occured while issuing tender.\"); window.location.replace(\"../hospitaldashboard.php\");</script>";
}		

?>