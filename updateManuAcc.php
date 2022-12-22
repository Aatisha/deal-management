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
<?php include_once('include/manu_nav2.inc.php'); ?>
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
	            	$query='SELECT m.* FROM manufacturer_table m INNER JOIN logintable l ON m.login_id=l.login_id where l.username="'.$username.'"';
	            	
	            	$result=mysqli_query($conn, $query);
	            	$row=mysqli_fetch_array($result);
					?>
					<form onsubmit="return validate()" action="php/manageaccmanu_controller.php" method="POST">
					  POC Name <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['manufacturer_name']?>" required=" ">
					  <span2 id="name_check" style="display:none; padding-bottom: 10px "></span2>
					  POC Email<input type="text" name="email" id="email" placeholder="Email Address" value="<?php echo $row['manufacturer_mail_id']?>" required=" ">
					  <span2 id="email_check" style="display:none; padding-bottom: 10px "></span2>
					  POC Phone Number<input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $row['manufacturer_phone_no']?>" required=" ">
					  <span2 id="phone_check" style="display:none; padding-bottom: 10px "></span2>
					  Username <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username?>" required=" " onblur="checkUsernameAvail()"><span2 id="uname_check" style="display:none; padding-bottom: 10px "></span2>
					  <!-- <input type="password" name="password" id="password" placeholder="Password" required=" ">
					  <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required=" "> -->
				      	Company Name<input type="text" name="cname" id="cname" placeholder="Company Name" value="<?php echo $row['cname']?>" required=" ">
				      	<span2 id="cname_check" style="display:none; padding-bottom: 10px "></span2>
				      	Company Address<input type="text" name="caddress" id="caddress" placeholder="Company's Address" value="<?php echo $row['caddr']?>" required=" ">
				      	<span2 id="caddress_check" style="display:none; padding-bottom: 10px "></span2>
				      	Company Contact Detail<input type="text" name="cphone" id="cphone" placeholder="Company Contact Detail"  value="<?php echo $row['cphone']?>" required=" ">
				      	<span2 id="cphone_check" style="display:none; padding-bottom: 10px "></span2>
				      	Company Email<input type="text" name="cemail" id="cemail" placeholder="Company Email Address" value="<?php echo $row['cemail']?>" required=" ">
				      	<span2 id="cemail_check" style="display:none; padding-bottom: 10px "></span2>
				      	GST<input type="text" name="gst" id="gstno" placeholder="GST Number" value="<?php echo $row['gst']?>" required=" ">
				      	<span2 id="gstno_check" style="display:none; padding-bottom: 10px "></span2>
						<br>
						<input type="hidden" name="manu_id" value="<?php echo $row['manufacturer_id']?>">
						<input type="radio" checked="checked" style="display: none;" id="manuCheck" value="0" >

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