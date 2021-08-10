<html lang="en">
<?php
session_start();
include('head.php');
include('connection.php');
?>
<body>
<?php

include('nav.php');


if($_SESSION['user'])
{

}
else{
  echo "<script>location.href='login.php'</script>";
}
?>
<section>
  <div class="container-fluid">    
  <div class="row content">
    <div class="col-sm-5" >

    <?php  
    $id=$_SESSION['id'];
    $roomid=$_SESSION['roomid'];
    $user=$_SESSION['user'];
    $query="SELECT `id`, `email`,`username` FROM `users` where roomid='$roomid' and email!='$user' order by `id`";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    ?>
    </div>
    <div class="col-sm-3">
          
  
    
    <div class="card text-center">
      <h3>Roommates</h3>
          <?php 
            if($count>0)
            {
            while($row=mysqli_fetch_row($result)){
            ?>
            <div class="card1">
              <?php 
                echo "<h4>$row[2]</h4>";
              ?>
              <form action="transactionspec.php" method="POST">
                <input type="number" style="display:none" value="<?php echo $row[0]?>" name="spec">
                <input type="text" style="display:none" value="<?php echo $row[2]?>" name="specname">
                <button class="submit-btn" type="submit" name="view">View</button>
              </form>

              
            </div>
            <?php

            }
            }
            else{
              echo "No members in your room .<br>share the roomid and security code to join others";
            }
          ?>
          
    </div>
    

    </div>
    <div class="col-sm-4" >
    </div>
   
    </div>
  </div>
  <?php
include('footer.php');
?>
</section>
<script>

</script>
</body>
</html>
