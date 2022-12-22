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

<!-- //dealer nav bar--><br>
<center><h1>Tenders</h1></center><br>
	<div class="container">
	<div class="row">
		<section class="content">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-warning btn-filter" data-target="all">All</button>
								<button type="button" class="btn btn-success btn-filter" data-target="active">Active</button>
								<button type="button" class="btn btn-danger btn-filter" data-target="inactive">Inactive</button>
								<button type="button" class="btn btn-info btn-filter" data-target="closed">Closed</button>
							</div>
						</div>
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered">
								<tbody>
									<?php 
									include_once('php/config.php');
									$query='SELECT t.tender_number,t.components_name, t.expected_rate,t.expected_qty,t.expected_dod,t.description,t.tender_end_date,t.tender_display_status,h.hospital_name FROM tenders_details t INNER JOIN hospital_table h ON t.hospital_id = h.hospital_id where t.tender_display_status <> 0 ORDER BY t.tender_display_status DESC';
									$result = mysqli_query($conn, $query);
									if (mysqli_num_rows($result) > 0) {
									while($row=mysqli_fetch_array($result))
									{
										$status=$row['tender_display_status'];
										$tender_number=$row['tender_number'];
										$components_name=$row['components_name'];
										$expected_rate=$row['expected_rate'];
										$tender_end_date=$row['tender_end_date'];
										$expected_qty=$row['expected_qty'];
										$expected_dod=$row['expected_dod'];
										$description=$row['description'];
										$hospital_name=$row['hospital_name'];
										date_default_timezone_set('Asia/Kolkata');
										// $now = time(); // or your date as well
										// $your_date = strtotime($tender_end_date);
										// $datediff =  abs($your_date - $now);
										$today = date('d');
										$parts = explode("-", $tender_end_date);
									    $datediff =  abs($today - $parts[2]);
									    //round($datediff / (60 * 60 * 24))
										if($status=="-1")
										{

											echo '<tr data-status="inactive">
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">Closed '.$datediff .' days ago</span>
													<h4 class="title">'.
														$tender_number.' | '.$components_name.
														'<span class="pull-right inactive">(inactive)</span>
													</h4>
													<p class="summary"><b>By '. $hospital_name.' hospital</b><br>
														Expected Rate: Rs. '.$expected_rate.'<br>
														Expected Quantity: '.$expected_qty.'<br>
														Expected Date of Delivery: '.$expected_dod.'<br>
														Description: '.$description.' 
													</p>
												</div>
											</div>
										</td>
									</tr>';
										}
										else if($status=="1")
										{
											echo '<tr data-status="active">
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right">'.$datediff.' days left</span>
													<h4 class="title">'.
														$tender_number.' | '.$components_name.
														'<span class="pull-right active">(active)</span>
													</h4>
													<p class="summary"><b>By '. $hospital_name.' hospital</b><br>
														Expected Rate: Rs. '.$expected_rate.'<br> 
														Expected Quantity: '.$expected_qty.'<br>
														Expected Date of Delivery: '.$expected_dod.'<br>
														Description: '.$description.' 

													</p>
												</div>
											</div>
										</td>
									</tr>';
										}
										else 
										{
											echo '<tr data-status="closed">
										<td>
											<div class="media">
												<div class="media-body">
													<span class="media-meta pull-right"> Closed '.$datediff.' days ago</span>
													<h4 class="title">'.
														$tender_number.' | '.$components_name.
														'<span class="pull-right closed">(Bid Selected)</span>
													</h4>
													<p class="summary"><b>By '. $hospital_name.' hospital</b><br>
														Expected Rate: Rs. '.$expected_rate.'<br> 
														Expected Quantity: '.$expected_qty.'<br>
														Expected Date of Delivery: '.$expected_dod.'<br>
														Description: '.$description.' 

													</p>
												</div>
											</div>
										</td>
									</tr>';
										}
									}
									}
									else
									{
										echo '<tr><td><center><h4>No Tenders Available</h4></center></td></tr>';
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
</div>

<!-- footer -->
	<?php include_once('include/footer.inc.php'); ?>
<!-- //footer -->
	<script type="text/javascript">
		$(document).ready(function () {

	$('.star').on('click', function () {
      $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
      $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });

 });
	</script>
</body>
</html>
<?php } ?>