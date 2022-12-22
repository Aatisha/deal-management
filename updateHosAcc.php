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
	
<body>
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<?php include_once('include/nav2.inc.php'); ?>
<!--end header nav-->

<!-- login -->
		<div class="w3_login">
			<h3>Manage Account</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					
				  </div>
				  <div class="form">
					<h2>Update Account</h2>
					<?php 
					include_once('php/config.php');
	            	$query='SELECT h.* FROM hospital_table h INNER JOIN logintable l ON h.login_id=l.login_id where l.username="'.$username.'"';
	            	$result=mysqli_query($conn, $query);
	            	$row=mysqli_fetch_array($result);
					?>
					<form onsubmit="return validate()"action="php/manageacchos_controller.php" method="POST">
					  POC Name<input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['poc_name']?>" required=" ">
					  <span2 id="name_check" style="display:none; padding-bottom: 10px "></span2>
					  POC Email<input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $row['poc_email']?>" required=" ">
					  <span2 id="email_check" style="display:none; padding-bottom: 10px "></span2>
					  POC Phone Number<input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $row['poc_phone_no']?>" required=" ">
					  <span2 id="phone_check" style="display:none; padding-bottom: 10px "></span2>
					  Username<input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username?>" required=" " onblur="checkUsernameAvail()"><span2 id="uname_check" style="display:none; padding-bottom: 10px "></span2>
					  <!-- <input type="password" name="password" id="password" placeholder="Password" required=" ">
					  <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required=" "> -->
				      	Hospital Name<input type="text" name="hname" id="hname" placeholder="Hospital Name" value="<?php echo $row['hospital_name']?>" required=" ">
				      	<span2 id="hname_check" style="display:none; padding-bottom: 10px "></span2>
				      	Hospital Address<input type="text" name="haddress" id="haddress" placeholder="Address" value="<?php echo $row['hospital_address']?>" required=" ">
				      	<span2 id="haddress_check" style="display:none; padding-bottom: 10px "></span2>
				      	Hospital Contact Number<input type="text" name="hphone" id="hphone" placeholder="Hospital Contact Detail"  value="<?php echo $row['hospital_phone_no']?>" required=" ">
				      	<span2 id="hphone_check" style="display:none; padding-bottom: 10px "></span2>
				      	Hospital Email<input type="text" name="hemail" id="hemail" placeholder="Hospital Email Address" value="<?php echo $row['hospital_mail_id']?>" required=" ">
				      	<span2 id="hemail_check" style="display:none; padding-bottom: 10px "></span2>
				      	Hosiptal Unique Id<input type="text" name="uid" id="uid" placeholder="Unique Identification Number" value="<?php echo $row['hospital_unique_number']?>" required=" ">
				      	<span2 id="uid_check" style="display:none; padding-bottom: 10px "></span2>
						<br>
						<input type="hidden" name="hos_id" value="<?php echo $row['hospital_id']?>">
						<input type="radio"  style="display: none;" id="manuCheck" value="1" >
				  	  <input type="submit" value="Update" name="submit">
					</form>

				  </div>
				</div>
			</div>
		</div>
			<script>
				function checkUsernameAvail()
				{
					var uname=document.getElementById('username').value;
					var euname= "<?php echo $username ?>";
					if(uname!=euname)
					{
					//console.log(uname)
					 $.ajax({
					 	type:'GET', 
					 	url: 'php/checkusername.php?username='+uname,
					 	//dataType: 'json',
					 	success: function(data){
					 	//console.log(data);
        				if (data==0)
        				{
        					//console.log(data);
        					document.getElementById('uname_check').style.display="block";
        					document.getElementById('uname_check').style.color="green";
        					document.getElementById('username').style.borderColor = "green";
        					$("#uname_check").html("");
        				}
        				else if(data==2)
        				{
        					document.getElementById('uname_check').style.display="block";
        					document.getElementById('uname_check').style.color="red";
        					document.getElementById('username').style.borderColor = "red";
        					$("#uname_check").html("Username cannot be empty");
        				}
        				else
        				{
        					//console.log(data);
        					document.getElementById('uname_check').style.display="block";
        					document.getElementById('uname_check').style.color="red";
        					document.getElementById('username').style.borderColor = "red";
        					$("#uname_check").html("Username Already Exists. Try something else");
        				}
   					 },
   					 error: function(xhr, status, error) {
				      console.log("error");
				   }
   					});
				}
				else
			{
							document.getElementById('uname_check').style.display="none";
        					document.getElementById('username').style.borderColor = "#d9d9d9";
        					
			}
			}
			
			</script>
<!-- //login -->

<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->
<script type="text/javascript" src="js/validate_update.js"></script>
</body>
</html>
<?php }?>