<?php
include_once('config.php');


if($_GET['username']==null)
{
	echo 2;
}
else{
	$username=$_GET['username'];
//echo $username;
//$arr_list = array();
$sql="SELECT * from logintable where username='".$username."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
		//$arr_list[]=$row =mysqli_fetch_assoc($result);
	echo 1;
	}
else
{
	//$arr_list[]=0;
	echo 0;
}
// header('Content-type: application/json');
//echo json_encode($arr_list);
}
?>