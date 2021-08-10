<?php
include('connection.php');
session_start();
if(isset($_POST['submit']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $checkquery="SELECT * FROM `users` WHERE password='$password' and email='$email'";
  $result2=mysqli_query($conn, $checkquery);
    
    $count = mysqli_num_rows($result2);
    if($count==1)
    {
      $row1 = mysqli_fetch_row($result2);
      $_SESSION['id']=$row1[0];
      $_SESSION['user']=$row1[1];
      $_SESSION['roomid']=$row1[2];
      $_SESSION['username']=$row1[5];
      echo "<script>location.href='transaction.php'</script>";
    }
    else{
      echo "<script>alert('not valid')</script>";
      echo "<script>location.href='login.php'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<?php
include('head.php');
?>
<body>
<?php
include('nav2.php');
?>
<section>
  <div class="container-fluid text-center">    
  <div class="row content" id="tab1">
    <div class="col-sm-4" >

    </div>
    <div class="col-sm-4">
      <div class="card">
          <h2 style="color:#ff73ab;font-size: 20px">LOGIN</h2>
  <form action="#" method="POST" >
    <div class="form-group">
      <!-- <label for="email">Email</label> -->
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <!-- <div class="form-group"> -->
      <!-- <label >RoomId</label> -->
      <!-- <input type="text" class="form-control" id="roomid" placeholder="Enter RoomId" name="roomid">
    </div> -->
    <div class="form-group">
      <!-- <label >Security Code</label> -->
      <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    
    <button type="submit" class="submit-btn" name="submit">Login</button>
  </form>
   </div> 
    </div>
    <div class="col-sm-4" >
    </div>
   
    </div>
  </div>

</section>
<?php
include('footer.php');
?>
</body>
</html>
