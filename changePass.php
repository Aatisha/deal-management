<?php 
session_start();
    if (!isset($_SESSION['username'])) {
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

<?php 
if($role=="1")
include_once('include/nav2.inc.php');
else
	include_once('include/manu_nav2.inc.php');
 ?>
<!--end header nav-->
<!-- login -->
			<div id="changePass" >
			<div class="w3_login" >
				<h3>Manage Account</h3>
			<div class="w3_login_module" >
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					
				  </div>
				  <div class="form">
					<h2>Change Password</h2>
					<form onSubmit="return checkPass()" action="php/changepass_controller.php" method="POST">
					 <input type="password" name="opassword" id="opassword" placeholder="Old Password" required=" ">
					  <span id="opasserr" style="display: none;"></span>
					  <input type="password" name="npassword" id="npassword" placeholder="New Password" required=" ">
					  <input type="password" name="nconfirmpassword" id="nconfirmpassword" placeholder="Confirm New Password" required=" ">
					  <span id="passerr" style="display: none;"></span>
						<br>
						<input type="hidden" name="username" value="<?php echo $username?>">
				  	  <input type="submit" value="Change Password" name="submit">
					</form>
					
					
					<?php  
						if(isset($_GET['status']))
						{  
						if($_GET['status']=='oldPassNotMatch')
						{
					?>
					<script type="text/javascript">
						
						document.getElementById('opassword').style.borderColor = "red";
						document.getElementById('passerr').style.display="block";
						document.getElementById('passerr').style.color="red";
        				$("#passerr").html("Old Password Doesnt Match. Try Again!");
					</script>
					<?php 
						}
						else if($_GET['status']=='error')
						{
					?>
					<script type="text/javascript">
						
						document.getElementById('passerr').style.display="block";
						document.getElementById('passerr').style.color="red";
        				$("#passerr").html("Error Occured. Try Again!");
					</script>
					<?php }
					} ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
		<script type="text/javascript">
			function checkPass()
			{
				var np=document.getElementById('npassword').value;
				var ncp=document.getElementById('nconfirmpassword').value;
				if(np==ncp)
					return true;
				document.getElementById('nconfirmpassword').style.borderColor = "red";
				document.getElementById('npassword').style.borderColor = "red";
				document.getElementById('passerr').style.display="block";
        		document.getElementById('passerr').style.color="red";
        		$("#passerr").html("New Password and Confirm New Password must be same.");
				return false;
			}
		</script>
		
<!-- //login -->

<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->



</body>
</html>
<?php }?>