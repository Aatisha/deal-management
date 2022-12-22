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
			<h3>Successful Tenders</h3>
			
				  <br>
				
				<div class="container">
				<br>
  <div class="table-responsive">
  <table class="table table-bordered table-striped" align="center" width="100">
    <thead>
      <tr>
        <th>Tender Number</th>
        <th>Component Name</th>
        <th>Manufacturer Name</th>
        <th>Company Name</th>
        <th>Bid Rate</th>
        <th>Bid Quantity</th>
        <th>Bid Closed At</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
    	include_once('php/config.php');
    	$query='SELECT t.tender_number,t.tender_id,t.components_name FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id INNER JOIN logintable l ON l.login_id = h.login_id where l.username="'.$username.'"';
    		$result = mysqli_query($conn, $query);
    		$count =0;
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										$tno=$row['tender_number'];
										$components_name=$row['components_name'];
										$tid=$row['tender_id'];
										$query2='SELECT m.manufacturer_name,m.cname,t.`bid_rate`, t.`bid_qty`,t.closedAt FROM `tender_applied` t INNER JOIN manufacturer_table m ON m.manufacturer_id= t.`manufacturer_id` where t.`bid_status`=1 and t.tender_id='.$tid;
										$res = mysqli_query($conn, $query2);
										if (mysqli_num_rows($res) > 0) {
										$count++;
										$r=mysqli_fetch_array($res);
										$mname=$r['manufacturer_name'];
										$cname=$r['cname'];
										$bid_rate=$r['bid_rate'];
										$bid_qty=$r['bid_qty'];
										$closedAt=$r['closedAt'];

										echo '<tr>
								        <td>'.$tno.'</td>
								        <td>'.$components_name.'</td>
								        <td>'.$mname.'</td>
								        <td>'.$cname.'</td>
								        <td>'.$bid_rate.'</td>
								        <td>'.$bid_qty.'</td>
								        <td>'.date_format(date_create($closedAt),'M j, Y | h:i:s A').'</td>
								      </tr>';
									    }
										
									}
								}
								else
								{
									echo '<tr> <td>No Tender Posted Yet.</td></tr>';
								}
								if($count==0)
									echo '<tr><td colspan="7"><center><h4>No Successful Tender</h4></center></td></tr>';
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