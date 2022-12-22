<?php 
session_start();
    if (!isset($_SESSION['username']))
 	{
 		header('location: login.php');
        	die;
 	}
    if (isset($_SESSION['username']) && $_SESSION['role']!="1") {
        	header('location: login.php');
        	die;
    } else {
        
        if(isset($_POST['edit'])){
        	$username = $_SESSION["username"];
        	$role = $_SESSION['role']; 
        	$tid=$_POST['tid'];
        	$tstatus=$_POST['tstatus'];
        	//echo $tid;        	
include_once('include/head.inc.php');?>
	
<body onload="getTodaysDate()">
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<?php include_once('include/nav2.inc.php'); ?>
<!-- login -->
		<div class="w3_login" style=" background:  linear-gradient(0deg,rgba(249, 248, 249, 1),rgba(242, 242, 242, 0.3)),url(images/issue-tender.jpg) no-repeat; background-size: cover;">
			<h3>Edit Tender</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil" style="margin-top: 37%;"></i>
				  </div>
	            <div class="form" style="display:visible;">
	            	<?php 
	            	include_once('php/config.php');
	            	$query='SELECT `components_name`, `composition`, `description`, `expected_rate`, `expected_qty`, `expected_dod`, `tender_start_date`, `tender_end_date` FROM `tenders_details` WHERE `tender_id`='.$tid;
	            	$result=mysqli_query($conn, $query);
	            	$row=mysqli_fetch_array($result);
					$components_name=$row['components_name'];
					$composition=$row['composition'];
					$description=$row['description'];
					$expected_rate=$row['expected_rate'];
					$expected_qty=$row['expected_qty'];
					$expected_dod=$row['expected_dod'];
					$tender_start_date=$row['tender_start_date'];
					$tender_end_date=$row['tender_end_date'];
	            	?>
					
					<form onsubmit="return validate()" action="php/edittender_controller.php" method="post">
					 Component Name<input type="text" name="cname" id="cname" value="<?php echo $components_name;?>" required=" ">
					 <span2 id="cname_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Composition<input type="text" name="composition" id="composition" value="<?php echo $composition;?>" required=" ">
					 <span2 id="composition_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected rate<br><input type="text" name="rate" id="rate" value="<?php echo $expected_rate;?>" required=" ">
					 <span2 id="rate_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected Quantity<br><input type="text" name="qty" id="qty" value="<?php echo $expected_qty;?>" required=" ">
					 <span2 id="qty_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected Date-Of-Delivery<input type="date" name="dod" id="dod" value="<?php echo $expected_dod;?>" required=" ">
					 <span2 id="dod_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Tender Start-Date<br>
					 <?php if($tstatus=="1"){?>
					 <input type="Date" name="sd" id="sd" min="<?php echo $tender_start_date;?>" value="<?php echo $tender_start_date;?>" required=" ">
					 <?php }
					 else{
					 	?>
					 	<input type="Date" name="sd" id="sd"  value="<?php echo $tender_start_date;?>" required=" ">
					 	<?php
					 }
					 ?>
					 <span2 id="sd_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Tender End-Date<br><input type="Date" name="ed" id="ed" value="<?php echo $tender_end_date;?>" required=" "  >
					 <span2 id="ed_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Description<br><textarea name="desc" id="desc"  required=" "><?php echo $description;?></textarea>
					 <span2 id="desc_check" style="display:none; padding-bottom: 10px "></span2>
					 <input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>">
					 <input type="submit" value="Submit"><br><br>
					 </form>
					 <a href="edit_tender.php"><input type="submit" value = "Cancel" class="btn btn-success btn-block"></a>
				  </div>
				 
				</div>
			</div>
			
		</div>
<!-- //login -->
		
<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->
<script type="text/javascript" src="js/validate_issue.js"></script>
<script type="text/javascript">
	function getTodaysDate(){
	var today = new Date().toISOString().split('T')[0];
     document.getElementsByName("ed")[0].setAttribute('min', today);

       document.getElementsByName("dod")[0].setAttribute('min', today);
       <?php if($tstatus ==0){?>
       	document.getElementsByName("sd")[0].setAttribute('min', today);
       <?php }?>
   }
</script>
</body>
</html>
<?php } 
else
{
	header('location: edit_tender.php');
}
}?>