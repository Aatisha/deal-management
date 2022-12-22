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
$sdt=strtotime($sd);
$now = time();
$query_edit="";
$tid=$_POST['tid'];
if($sdt<=$now){
$query_edit="UPDATE `tenders_details` SET `components_name`='$cname',`composition`='$composition',`description`='$desc',`expected_rate`='$rate',`expected_qty`='$qty',`expected_dod`='$dod',`tender_start_date`='$sd',`tender_end_date`='$ed',`tender_display_status`='1',`updatedAt`=NOW() WHERE `tender_id`=".$tid;

}
else{
$query_edit="UPDATE `tenders_details` SET `components_name`='$cname',`composition`='$composition',`description`='$desc',`expected_rate`='$rate',`expected_qty`='$qty',`expected_dod`='$dod',`tender_start_date`='$sd',`tender_end_date`='$ed',`tender_display_status`='0',`updatedAt`=NOW() WHERE `tender_id`=".$tid;
}
//echo $query_edit;
if(mysqli_query($conn, $query_edit))
{
	echo "<script> alert(\"Tender editted successfully.\"); window.location.replace(\"../edit_tender.php\");</script>";

}

else
{
echo "<script> alert(\"Problem occured while editting tender.\"); window.location.replace(\"../edit_tender.php\");</script>";
}		

?>