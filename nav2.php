
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
        if(!isset($_POST['submit'])){
        ?>
        <li><a href="index.php" style="color:black;font-size: 20px">Home</a></li>
        <!-- <li><a href="index.php#tab1" style="color:black;font-size: 20px">Create/Join</a></li> -->
        <?php 
      }
      ?>
      </ul>
    </div>
  </div>
</nav>