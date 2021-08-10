
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="color:#ff73ab;font-size: 30px">Roomiee</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        if(!isset($_SESSION['user'])){
        ?>
        <li><a href="index.php" style="color:black;font-size: 20px">Home</a></li>
        <!-- <li><a href="index.php#tab1" style="color:black;font-size: 20px">Create/Join</a></li> -->
        <?php 
      }
        else{
        ?>
        <li><a href="splitamount.php" style="color:black;font-size: 20px">Split Amount</a></li>
        <li><a href="transaction.php" style="color:black;font-size: 20px">All transactions</a></li>
      <?php } ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(!isset($_SESSION['user'])){
        ?>
        <li><a href="login.php" style="color:black;font-size:20px"><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
        <?php 
      }
        else{
        ?>
        <li><a href="logout.php" style="color:black;font-size:20px"><span class="glyphicon glyphicon-log-out" ></span> Logout</a></li>
      <?php }?>
      </ul>
    </div>
  </div>
</nav>