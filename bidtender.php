<?php 
session_start();
   if (!isset($_SESSION['username']))
 	{
 		header('location: login.php');
        	die;
 	}
    if (isset($_SESSION['username']) && $_SESSION['role']!="0") {
        	header('location: login.php');
        	die;
    } else {
        $username = $_SESSION["username"];
        $role = $_SESSION['role'];  
include_once('include/head.inc.php');?>
	
<body>
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<!-- dealer nav bar-->
	<?php include_once('include/manu_nav2.inc.php'); ?>

	<?php

$tid=$_GET['tid'];
$end_date=$_GET['end_date'];
$next_date=date('Y-m-d',strtotime($end_date . ' +1 day'));
?>

		<div class="w3_login" style=" background:  linear-gradient(0deg,rgba(249, 248, 249, 1),rgba(242, 242, 242, 0.3)),url(images/issue-tender.jpg) no-repeat; background-size: cover; op">
			<h3>Bid for Tender</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					
				  </div>
	            <div class="form" style="display:visible;">

	            	<?php 
	            	include_once('php/config.php');
	            	$query='SELECT m.manufacturer_id FROM logintable l INNER JOIN manufacturer_table m ON l.login_id = m.login_id where l.username="'.$username.'"';
	            	$result=mysqli_query($conn, $query);
	            	$row=mysqli_fetch_array($result);
					$manuid=$row['manufacturer_id'];
					//echo $query." hhhhh ".$hosid;
	            	?>
					<form onsubmit="return validate()" action="php/bidtender_controller.php" method="post">
					 MRP<input type="text" name="mrp" id="mrp" required=" ">
					 <span2 id="mrp_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Bid Rate<input type="text" name="bidrate" id="bidrate" required=" ">
					 <span2 id="bidrate_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Bid Quantity<br><input type="text" name="bidqty" id="bidqty" required=" ">
					 <span2 id="bidqty_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Bid Date-Of-Delivery<input type="date" name="biddod"  id="biddod"  min="<?php echo $next_date;?>" required=" "><br>
					 <span2 id="biddod_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Description<br><textarea name="biddesc" id="biddesc" required=" "></textarea>
					 <span2 id="biddesc_check" style="display:none; padding-bottom: 10px "></span2><br>
					 <input type="hidden" name="manuid" id="manuid" value="<?php echo $manuid;?>">
					 <input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>">
					 <input type="submit" value="Submit"><br><br>
					 </form>
					<a href="manufacturedashboard.php"><input type="submit" value = "Cancel" class="btn btn-success btn-block"></a>
				</div>
			</div>
		</div>
	</div>
<!-- footer -->
	<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->
<script type="text/javascript" src="js/validate_bid.js"></script>


</body>
</html>
<?php } ?>