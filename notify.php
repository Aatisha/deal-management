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
<!-- dealer nav bar-->
	<?php include_once('include/nav2.inc.php'); ?>
<!-- login -->
		<div class="w3_login">
			<h3>Notifications</h3>
			
				  <br>
				
				<div class="container">
				<br>
  <div class="table-responsive">
  <table class="table table-bordered table-striped" align="center" width="100">
    <thead>
      <tr>
        <th>Tender Number</th>
        <th>Component Name</th>
        <th>End Date</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	include_once('php/config.php');
    	$query='SELECT t.tender_number,t.components_name,t.tender_end_date,t.tender_id FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id INNER JOIN logintable l ON l.login_id = h.login_id where t.tender_display_status=-1 AND l.username="'.$username.'"';
    		$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										echo '<tr>
								        <td>'.$row['tender_number'].'</td>
								        <td>'.$row['components_name'].'</td
								        <td> Tender Completed </td>
								       <td>
								        <form   action="selectappliedbid.php" method="post">
								    		<input type="hidden" name="tid" id="tid" value="'.$row['tender_id'].'">
								    		<input type="submit" name="edit" value="Complete Bid" class="btn btn-block btn-primary">
								    	</form>
								    	</td>
								    	</tr>';
								   	}
								   }
								else
								{
									echo '<tr> <td  colspan=4>No Notifications.</td></tr>';
								}
    	?>
    	<!-- <a href="editpage.php?tid='.$row['tender_id'].'"><button class="btn btn-success">Edit</button></a> -->
    	 </tbody>
  </table>
</div>
</div><br><br><br>
</div>

<!-- //login -->

<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->


</body>
</html>
<?php } ?>