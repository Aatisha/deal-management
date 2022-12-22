<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Home</a></li>
        <!-- <li><a href="manageaccount.php"><i class="fa fa-pencil-square-o"></i> &nbsp;Manage Account</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil-square-o"></i> &nbsp;Manage Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="updateHosAcc.php">Update Account</a></li>
      <li><a href="changePass.php">Change Password</a></li>
       </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-th"></i> &nbsp;Tenders <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="issue.php">Issue Tender</a></li>
			<li><a href="edit_tender.php">Edit Tender</a></li>
			<li><a href="delete_tender.php">Delete Tender</a></li>
			<li><a href="history_tender.php">Tender History</a></li>
			<li><a href="successfultender.php">Successful Tender</a></li>
      <li><a href="complete_tender.php">Select Final Bid</a></li>
          </ul>
        </li>
        <li><a href="#hosNotificationModal" data-toggle="modal"><i class="fa fa-list-alt"></i>&nbsp;Notifications</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="php/logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a></li>
				<?php 

					echo '<li><a href="hospitaldashboard.php"><i class="fa fa-user-circle-o"></i>&nbsp;Hi! '.$username.'</a></li>';
				?>
      </ul>
    </div>
  </div>
</nav>
<?php include_once('include/hos_notification.inc.php'); ?>
  