<?php 
session_start();
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
$role = $_SESSION['role'];
}
include_once('include/head.inc.php');?>

<body>
<!--header-nav-->
<?php include_once('include/upper_nav.inc.php'); ?>
<!--end header nav-->
<?php include_once('include/nav.inc.php'); ?>	

<!-- banner -->

	<div class="banner">

		<div class="w3l_banner_nav_left">

			<nav class="navbar nav_bottom">

			 <!-- Brand and toggle get grouped for better mobile display -->

			  <div class="navbar-header nav_2">

				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">

					<span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				  </button>

			   </div> 

			   <!-- Collect the nav links, forms, and other content for toggling -->

				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">

					<ul class="nav navbar-nav nav_1">

						<li><a href="#">E-Tendering System</a></li>

						<li><a href="#">Issue your Tender online</a></li>

						<li><a href="#">Find the best deals</a></li>

					    <li><a href="#">Manage Tender Records</a></li>

					</ul>

				 </div><!-- /.navbar-collapse -->

			</nav>

		</div>

		<div class="w3l_banner_nav_right">
			<div class="container">
			<img src="images/0.jpg" height="400" width="1080" class="img-responsive"><br><br><br><br><br>
			<!--<div class="centered" style="height:500;width=500;">Centered</div>-->
			</div>

		</div>

		<div class="clearfix"></div>

	</div>

<!-- banner -->



<!-- newsletter-top-serv-btm -->

	<!<div class="newsletter-top-serv-btm">

		<div class="container">

			<div class="col-md-4 wthree_news_top_serv_btm_grid" align="left">

				<div class="wthree_news_top_serv_btm_grid_icon">

					<i class="fa fa-sticky-note" aria.hidden="true"></i>

				</div>

				<h3><b>Release</b></h3>

				<p>Issue your tender for the online market.Get the best deals and rates.</p>

			</div>

			<div class="col-md-4 wthree_news_top_serv_btm_grid" align="center">

				<div class="wthree_news_top_serv_btm_grid_icon">

					<i class="fa fa-bar-chart" aria-hidden="true"></i>

				</div>

				<h3><b>Record</b></h3>

				<p>Manage the records of your tenders.</p>

			</div>

			<div class="col-md-4 wthree_news_top_serv_btm_grid" align="right">

				<div class="wthree_news_top_serv_btm_grid_icon">

					<i class="fa fa-truck" aria-hidden="true"></i>

				</div>

				<h3><b>Deliver</b></h3>

				<p>Experience safe and authentic delivery of your products</p>

			</div>

			<div class="clearfix"> </div>

		</div>

	</div>

<!-- //newsletter-top-serv-btm -->

	

<!-- footer -->

	<?php include_once('include/footer.inc.php'); ?>



<!-- //footer -->



</body>

</html>

