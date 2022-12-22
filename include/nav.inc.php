


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
        <?php 
        if(!isset($_SESSION['username'])){
        ?>
        <li><a href="login.php"><i class="fa fa-sign-in"></i> &nbsp;Log In & Sign Up</a></li>
        <?php 
      }
      else{

        ?>
        <li><a href="login.php"><i class="fa fa-user-circle-o"></i>&nbsp;Hi! <?php echo $username; ?></a></li>
        <?php 
      }?>
      
      </ul>
      </div>
  </div>
</nav>
  