
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
    if(isset($_POST['view']))
    {
      $spec=$_POST['spec'];
      $specname=$_POST['specname'];
      $query="select t.fromid,u.email,t.amount,t.time_date,t.purpose,t.status,t.id from transactions t,users u where u.id=t.fromid and t.toid='$id' and t.fromid='$spec'";
      $result=mysqli_query($conn,$query);
      $count=mysqli_num_rows($result);
      $query1="select t.fromid,u.email,t.amount,t.time_date,t.purpose,t.status from transactions t,users u where u.id=t.fromid and t.fromid='$id' and t.toid='$spec'";
      $result1=mysqli_query($conn,$query1);
      $count1=mysqli_num_rows($result1);
    }
    
    ?>
    

    </div>
    <div class="col-sm-3 text-center">
      <div class="button-box">
          <div id="btn"></div>
          <button type="button" class="toggle-btn" onclick="from()" style="font-size:18px">From <br>person</button>
          <button type="button"  class="toggle-btn" onclick="to()" style="font-size:18px">To<br>person</button>
    </div> 
        <div class="card"  id="from">
          <h3>From <?php echo $specname ?></h3>
          <?php 
          while($row=mysqli_fetch_row($result)){?>
          <div class="card1">
            <table width="100%">
              <tr>
                <td>
                  <h5><b>Dated</b> </h5>
                  <?php 
                  $pieces = explode(" ", $row[3]);
                  echo $pieces[0]."<br>";
                  // echo $pieces[1]."<br>";
                   ?>

                </td>
                <td>
                  <?php
                  if($row[5]==0)
                  {
                  echo "<h3 style=\"color:red\"> $row[2] Rs</h3>";
                  }
                  elseif($row[5]==1){
                    echo "<h3 style=\"color:green\"> $row[2] Rs</h3>";
                  }
                ?>
                </td>
              </tr>
              <tr>
                <td>
                  <h5><b>purpose</b> </h5>
                  <?php 
                  echo $row[4]."<br>" 
                  ?>
                </td>
                <td>
            <!-- <button></button> -->
                </td>
              </tr>
              <tr>
                <td>
                  <h5><b>status</b> </h5>
                  <?php 
                  if($row[5]==0)
                  {
                    echo "Not Received";
                  }
                  elseif($row[5]==1){
                    echo "received";
                  }
                  else{
                    echo "balanced";
                  }

                   ?>
              
                </td>
                <td>
                  <?php 
                  if($row[5]==0)
                  {
                    ?><form action="updateid.php" method="POST">
                      <input type="number" style="display:none" value="<?php echo $row[6] ?>" name="updateid" readonly>
                    <?php
                     echo "<button name=\"received\">Received</button>";
                  }
                  
                  ?>
                </form>
                </td>
              </tr>
        </table>
      </div>
      <?php   
        }
      ?>
          
    </div>
    <!-----end of card part1------>
 <div class="card" id="to">
          <h3>To <?php echo $specname ?></h3>
          <?php 
          while($row=mysqli_fetch_row($result1)){?>
          <div class="card1">
            <table width="100%">
              <tr>
                <td>
                  <h5><b>Dated</b> </h5>
                  <?php 
                  $pieces = explode(" ", $row[3]);
                  echo $pieces[0]."<br>";
                  // echo $pieces[1]."<br>";
                   ?>

                </td>
                <td>
                  <?php
                  if($row[5]==0)
                  {
                  echo "<h3 style=\"color:red\"> $row[2] Rs</h3>";
                  }
                  elseif($row[5]==1){
                    echo "<h3 style=\"color:green\"> $row[2] Rs</h3>";
                  }
                ?>
                </td>
              </tr>
              <tr>
                <td>
                  <h5><b>purpose</b> </h5>
                  <?php 
                  echo $row[4]."<br>" 
                  ?>
                </td>
                <td>
            <!-- <button></button> -->
                </td>
              </tr>
              <tr>
                <td>
                  <h5><b>status</b> </h5>
                  <?php 
                  if($row[5]==0)
                  {
                    echo "You have to pay";
                  }
                  elseif($row[5]==1){
                    echo "paid";
                  }
                  else{
                    echo "balanced";
                  }

                   ?>
              
                </td>
                <td>
                  
                </td>
              </tr>
        </table>
      </div>
      <?php   
        }
      ?>
          
    </div>
    <!-----end of card part1------>
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
        var x=document.getElementById("from");
        var y=document.getElementById("to");
        var z=document.getElementById("btn");
        y.style.display="none";
        function to(){
            x.style.display="none"
            y.style.display="block"
            z.style.left="160px";
   
           
        }
        function from(){
            y.style.display="none"
            x.style.display="block"
          z.style.left="0px";
        }
        </script>

</body>
</html>
