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
			<h3>Edit Tender</h3>
			
				  <br>
				
				<div class="container">
				<br>
  <div class="table-responsive">
  <table class="table table-bordered table-striped" align="center" width="100">
    <thead>
      <tr>
        <th>Tender Number</th>
        <th>Component Name</th>
        <th>Tender-Start-Date</th>
        <th>Tender-End-Date</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	include_once('php/config.php');
    	$query='SELECT t.tender_number,t.tender_id,t.hospital_id,t.components_name,t.tender_start_date,t.tender_end_date,h.login_id,t.tender_display_status FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id INNER JOIN logintable l ON l.login_id = h.login_id where t.tender_display_status=0 OR t.tender_display_status=1 AND l.username="'.$username.'"';
    		$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										echo '<tr>
								        <td>'.$row['tender_number'].'</td>
								        <td>'.$row['components_name'].'</td>
								        <td>'.$row['tender_start_date'].'</td>
								        <td>'.$row['tender_end_date'].'</td>
								        <td><form action="editpage.php" method="post">
								    		<input type="hidden" name="tid" id="tid" value="'.$row['tender_id'].'">
								    		<input type="hidden" name="tstatus" id="tstatus" value="'.$row['tender_display_status'].'">
								    		<input type="submit" name="edit" value="Edit" class="btn btn-block btn-success">
								    	</form>
								    	</td>
								      </tr>';
									}
								}
								else
								{
									echo '<tr> <td colspan="5">No Tender Available.</td></tr>';
								}
    	?>
    	<!-- <a href="editpage.php?tid='.$row['tender_id'].'"><button class="btn btn-success">Edit</button></a> -->
    	
      
    </tbody>
  </table>
</div>
</div><br><br><br>
</div>

		</div>
<!-- //login -->
		
<!-- footer -->
		<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->


</body>
</html>
<?php } ?>