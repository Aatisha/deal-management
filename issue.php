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
        $username = $_SESSION["username"];

        $role = $_SESSION['role']; 
include_once('include/head.inc.php');?>
	
<body onload="getTodaysDate()">
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<!-- dealer nav bar-->
	<?php include_once('include/nav2.inc.php'); ?>
		<div class="w3_login" style=" background:  linear-gradient(0deg,rgba(249, 248, 249, 1),rgba(242, 242, 242, 0.3)),url(images/issue-tender.jpg) no-repeat; background-size: cover; ">
			<h3>Issue Tender</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					
				  </div>
	            <div class="form" style="display:visible;">

	            	<?php 
	            	include_once('php/config.php');
	            	$query='SELECT h.hospital_id FROM logintable l INNER JOIN hospital_table h ON l.login_id = h.login_id where l.username="'.$username.'"';
	            	$result=mysqli_query($conn, $query);
	            	$row=mysqli_fetch_array($result);
					$hosid=$row['hospital_id'];
					//echo $query." hhhhh ".$hosid;
	            	?>
					<form onsubmit="return validate()" action="php/issuetender_controller.php" method="post">
					 Component Name<input type="text" name="cname" id="cname" required=" ">
					 <span2 id="cname_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Composition<input type="text" name="composition" id="composition" required=" ">
					 <span2 id="composition_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected rate<br><input type="text" name="rate" id="rate" required=" ">
					 <span2 id="rate_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected Quantity<br><input type="text" name="qty" id="qty"  required=" ">
					 <span2 id="qty_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Expected Date-Of-Delivery<input type="date" name="dod" id="dod" required=" ">
					 <span2 id="dod_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Tender Start-Date<br><input type="Date" name="sd" id="sd" required=" ">
					 <span2 id="sd_check" style="display:none; padding-bottom: 10px "></span2><br>
					 Tender End-Date<br><input type="Date" name="ed" id="ed" required=" "  ><br>
					 <span2 id="ed_check" style="display:none; padding-bottom: 10px "></span2>
					 Description<br><textarea name="desc" id="desc" required=" "></textarea>
					 <span2 id="desc_check" style="display:none; padding-bottom: 10px "></span2>
					 <input type="hidden" name="hosid" id="hosid" value="<?php echo $hosid;?>">
					 <input type="submit" value="Submit"><br><br>
					 </form>
					<a href="hospitaldashboard.php"><input type="submit" value = "Cancel" class="btn btn-success btn-block"></a>
			</div>
		</div>
	</div>
</div>
			
<!-- footer -->
	<?php include_once('include/footer.inc.php'); ?>

<!-- //footer -->
<script type="text/javascript" src="js/validate_issue.js"></script>
<script type="text/javascript">
	function getTodaysDate(){
	var today = new Date().toISOString().split('T')[0];
     document.getElementsByName("ed")[0].setAttribute('min', today);
      document.getElementsByName("sd")[0].setAttribute('min', today);
       document.getElementsByName("dod")[0].setAttribute('min', today);
   }
</script>

</body>
</html>
<?php }
?>