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
<!-- login -->
		<div class="w3_login">
			<h3>Bid History</h3>
			
				  <br>
				<div class="container">
	<div class="row">
		<section class="content">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered">
								<thead>
							      <tr>
							        <th>Expected Bid Details</th>
							        <th>Your Bid Details</th>
							      </tr>
							    </thead>
								<tbody>
									<?php 
									include_once('php/config.php');
									$query='Select * from tender_applied where manufacturer_id = (SELECT m.manufacturer_id FROM logintable l INNER JOIN manufacturer_table m ON l.login_id = m.login_id where l.username="'.$username.'") ORDER by tender_applied_id';
									$result = mysqli_query($conn, $query);
									
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										$bid_status = $row['bid_status'];
										$mrp=$row['mrp'];
										$bid_rate=$row['bid_rate'];
										$bid_qty=$row['bid_qty'];
										$bid_dod=$row['bid_dod'];
										$desc_bid=$row['description'];
										$tid=$row['tender_id'];
										$bid_on = $row['createdAt'];
										$parts = explode(" ", $bid_on);
									    $date_format_bid =  date_create($parts[0]);
									    $bid_date=date_format($date_format_bid,'M j, Y');
										$bid_status_val="";
										$bid_status_color="";
										if($bid_status==0){
											$bid_status_val = "Pending";
											$bid_status_color = "#f0ad4e";
										}
										else if($bid_status == -1){
											$bid_status_val = "Rejected";
											$bid_status_color = "#FA1818";
										}
										else{
											$bid_status_val = "Accepted";
											$bid_status_color = "#84c639";
										}

									    $query_2='SELECT t.tender_number,t.components_name, t.expected_rate,t.expected_qty,t.expected_dod,t.description,t.tender_start_date,t.tender_end_date,h.hospital_name FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id where t.tender_id='.$tid;
										$res = mysqli_query($conn, $query_2);
										$r=mysqli_fetch_array($res);
										$tender_number=$r['tender_number'];
										$components_name=$r['components_name'];
										$expected_rate=$r['expected_rate'];
										$expected_qty=$r['expected_qty'];
										$expected_dod=$r['expected_dod'];
										$description=$r['description'];
										$hospital_name=$r['hospital_name'];
										$tender_start_date =$r['tender_start_date'];
										$tender_end_date = $r['tender_end_date'];
										$sdate = date_format(date_create($tender_start_date),'M j, Y');
										$edate = date_format(date_create($tender_end_date),'M j, Y');
											echo '<tr >
										<td>
											<div class="media">
												<div class="media-body">
													<h4 class="title">'.
														$tender_number.' | '.$components_name.
														'
													</h4>
													<p class="summary"><b>By '. $hospital_name.' hospital</b><br>
														Expected Rate: Rs. '.$expected_rate.'<br> 
														Expected Quantity: '.$expected_qty.'<br>
														Expected Date of Delivery: '.$expected_dod.'<br>
														Description: '.$description.'<br>
														Tender Start Date: '.$sdate.'<br>
														Tender End Date: '.$edate.' 
													</p>
												</div>
											</div>
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<br>
													<p class="summary">MRP: Rs. '. $mrp.' <br>
														Bid Rate: Rs. '.$bid_rate.'<br> 
														Bid Quantity: '.$bid_qty.'<br>
														Bid Date of Delivery: '.$bid_dod.'<br>
														Description: '.$desc_bid.' <br>
														Bid Status: <span style="background-color: '.$bid_status_color.'; color:white; padding: 1px 4px; font-weight:700;">'.$bid_status_val.'</span><br>
														Date of Bidding: '.$bid_date.'
													</p>
												</div>
											</div>
										</td>
									</tr>';

										
									}
									}
									else
									{
										echo '<tr><td colspan="2"><center><h4>No Bid History Available</h4></center></td></tr>';
									}

									?>																	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			
			</div>
		</section>
		
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