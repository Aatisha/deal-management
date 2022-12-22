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
                $tid= $_POST['tid']; 
include_once('include/head.inc.php');?>
	
<body>
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<!-- dealer nav bar-->
	<?php include_once('include/nav2.inc.php'); ?>
<!-- login -->
	<div class="w3_login">
			<h3>Bid Details</h3>
			
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
							        <th>Manufacturer Details</th>
							        <th>Bid Details</th>
							      </tr>
							    </thead>
								<tbody>
									<?php 
									include_once('php/config.php');
									$query='SELECT `manufacturer_id`,`mrp`, `bid_rate`, `bid_qty`, `bid_dod`, `description`, `bid_status`, `createdAt` FROM `tender_applied` WHERE tender_id="'.$tid.'" ORDER BY `tender_applied_id`';
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										$manufacturer_id=$row['manufacturer_id'];
										$mrp=$row['mrp'];
										$bid_rate=$row['bid_rate'];
										$bid_qty=$row['bid_qty'];
										$bid_dod=$row['bid_dod'];
										$bid_status = $row['bid_status'];
										$desc_bid=$row['description'];
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

									    $query_2='SELECT `manufacturer_name`, `cname`, `caddr`, `cphone`, `cemail` FROM `manufacturer_table` WHERE `manufacturer_id`='.$manufacturer_id;
										$res = mysqli_query($conn, $query_2);
										$r=mysqli_fetch_array($res);
										$mname=$r['manufacturer_name'];
										$cname=$r['cname'];
										$cphone=$r['cphone'];
										$cemail=$r['cemail'];
										$caddr=$r['caddr'];
											echo '<tr>
										<td>
											<div class="media">
												<div class="media-body">
													<p class="summary">POC Name: '. $mname.'<br>
														Company Name: '.$cname.'<br> 
														Company Contact Detail: '.$cphone.'<br>
														Company Email: '.$cemail.'<br>
														Company Address: '.$caddr.'<br>
														 
													</p>
												</div>
											</div>
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<br>
													<p class="summary">MRP Rs. '. $mrp.' <br>
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
										echo '<tr><td colspan="2"><center><h4>No Bidding Details Available</h4></center></td></tr>';
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