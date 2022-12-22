<?php 
session_start();
    if (isset($_SESSION['username'])) {
    		$role = $_SESSION['role'];
    		if($role=="1")
        		header('location: hospitaldashboard.php');

        	else
        		header('location: manufacturedashboard.php');
        	
    } else {
include_once('include/head.inc.php');?>
	
<body>
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<?php include_once('include/nav.inc.php'); ?>

<!-- login -->
		<div class="w3_login">
			<h3>Log In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Sign Up</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="php/login_controller.php" method="POST">
						<span id="error_login" style="display: none;"></span>
					  <input type="text" name="username" id="username_login" placeholder="username" required=" " >
					  <input type="password" name="password" id="password_login" placeholder="********" required=" " >
					  <input type="submit" value="Login">
					</form>
					<?php  
						if(isset($_GET['status']))
						{  
						if($_GET['status']=='fail')
						{
					?>
					<script type="text/javascript">
							document.getElementById('username_login').style.borderColor = "red";
							document.getElementById('password_login').style.borderColor = "red";
							document.getElementById('error_login').style.display="block";
							document.getElementById('error_login').style.color="red";
        					$("#error_login").html("Username or Password incorrect");
        			</script>
        			<?php 
        			}
        			} ?>
					
				  </div>
				  <div class="form">
					<h2>Create an account(POC's Details)</h2>
					<form onsubmit="return validate()" action="php/signup_controller.php" method="POST">
					  <input type="text" name="name" id="name" placeholder="Name" required=" ">
					  <span2 id="name_check" style="display:none; padding-bottom: 10px "></span2>
					  <input type="text" name="email" id="email" placeholder="Email Address" required=" ">
					  <span2 id="email_check" style="display:none; padding-bottom: 10px "></span2>
					  <input type="text" name="phone" id="phone" placeholder="Phone Number" required=" ">
					  <span2 id="phone_check" style="display:none; padding-bottom: 10px "></span2>
					  <input type="text" name="username" id="username" placeholder="Username" required=" " onblur="checkUsernameAvail()">
					  <span2 id="uname_check" style="display:none; padding-bottom: 10px "></span2>
					  <input type="password" name="password" id="password" placeholder="Password" required=" ">
					  <span2 id="password_check" style="display:none; padding-bottom: 10px "></span2>
					  <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required=" ">
					  <span2 id="confirmpassword_check" style="display:none; padding-bottom: 10px "></span2>
					  <p><b>Sign in as:</b></p>
					  <input type="radio" onclick="javascript:manufactuerHospitalCheck();" name="manuhos" id="manuCheck" value="0" required=" ">&nbsp; Manufacturer<br>
					  <input type="radio" onclick="javascript:manufactuerHospitalCheck();" name="manuhos" value="1" id="hosCheck">&nbsp; Hospital<br><br>
					  <div id="ifHospital" style="display:none;">
				      <label> Hospital Details</label><br>
				      	<input type="text" name="hname" id="hname" placeholder="Hospital Name" >
				      	 <span2 id="hname_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="haddress" id="haddress" placeholder="Address" >
				      	 <span2 id="haddress_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="hphone" id="hphone" placeholder="Hospital Contact Detail" >
				      	 <span2 id="hphone_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="hemail" id="hemail" placeholder="Hospital Email Address" >
				      	 <span2 id="hemail_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="uid" id="uid" placeholder="Unique Identification Number" >
				      	 <span2 id="uid_check" style="display:none; padding-bottom: 10px "></span2>
						<br>
				      </div>
				      <div id="ifManufacturer" style="display:none;">
				      	<label> Company Details</label><br>
				      	<input type="text" name="cname" id="cname" placeholder="Company Name" >
				      	<span2 id="cname_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="caddress" id="caddress" placeholder="Address" >
				      	<span2 id="caddress_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="cphone" id="cphone" placeholder="Company Contact Detail" >
				      	<span2 id="cphone_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="cemail" id="cemail" placeholder="Company Email Address" >
				      	<span2 id="cemail_check" style="display:none; padding-bottom: 10px "></span2>
				      	<input type="text" name="gstno" id="gstno" placeholder="GST Number" >
				      	<span2 id="gstno_check" style="display:none; padding-bottom: 10px "></span2>
				      </div>
					  <input type="submit" value="Register" name="submit">
					</form>
				  </div>
				  <div class="cta" id="forgetPass"><a href="#" style="visibility: visible;">Forgot your password?</a></div>
				</div>
			</div>
			<script type="text/javascript">
				function manufactuerHospitalCheck(){
					    if (document.getElementById('manuCheck').checked) {
					        document.getElementById('ifManufacturer').style.display = 'block';
					      document.getElementById('ifHospital').style.display = 'none';
					    }
					  if (document.getElementById('hosCheck').checked) {
					        document.getElementById('ifHospital').style.display = 'block';
					    document.getElementById('ifManufacturer').style.display = 'none';
					  }

					}
			</script>
			<script>
				function checkUsernameAvail()
				{
					var uname=document.getElementById('username').value;
					if( (uname.length>4 && uname.length <=15))
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
					document.getElementById('uname_check').style.display="block";
        					document.getElementById('uname_check').style.color="red";
        					document.getElementById('username').style.borderColor = "red";
        					$("#uname_check").html("Username must be between 5 to 15 character");	
				}
			}
			</script>
		<script>
				$('.toggle').click(function(){
				  
				 if ( $('#forgetPass').css('visibility') == 'hidden' )
    				$('#forgetPass').css('visibility','visible');
				  else
				    $('#forgetPass').css('visibility','hidden');
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->



<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->
<script type="text/javascript" src="js/validate_signup.js"></script>

</body>
</html>
<?php }?>