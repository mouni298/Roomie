
<!DOCTYPE html>
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
  <div class="row content" id="tab1">
    <div class="col-sm-4" >

    <?php
    $id=$_SESSION['id'];
    $roomid=$_SESSION['roomid'];
    $user=$_SESSION['user'];
    $query="SELECT `id`, `email`,`username` FROM `users` where roomid='$roomid' order by `id`";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    
    ?>
    <!-----inserting equal data to database----->
    <?php
    if(isset($_POST['addequal'])){
      $reason=$_POST['reason'];
      $splamount=$_POST['splamount'];
      $i=0;
      while($row=mysqli_fetch_row($result)){
        
        $query1="INSERT INTO `transactions`(`fromid`, `toid`, `amount`,`purpose`) VALUES ('$row[0]','$id','$splamount','$reason')";
        $resquery=mysqli_query($conn,$query1);
        $i++;
      }
      if($i==$count)
      {
        echo "<script>alert('Successfull')</script>";
        echo "<script>location.href='transaction.php'</script>";
      }
    else
      {
        echo "<script>alert('records entered partially')</script>";
         echo "<script>location.href='transaction.php'</script>";
      }
    }
    ?>
    <!-----end for inserting equal amount------>
    <!------inserting unequal amount----------->
      <?php
    if(isset($_POST['adddiff'])){
      $reason=$_POST['reason'];
      $i=0;
      while($row=mysqli_fetch_row($result)){
        $splamount=$_POST[$row[0]];
        if($splamount!=0)
        {
        $query2="INSERT INTO `transactions`(`fromid`, `toid`, `amount`,`purpose`) VALUES ('$row[0]','$id','$splamount','$reason')";
        $resquery=mysqli_query($conn,$query2);
        }
        $i++;
        
      }
      if($i==$count)
      {
        echo "<script>alert('Successfull')</script>";
         echo "<script>location.href='transaction.php'</script>";
      }
    else
      {
        echo "<script>alert('records entered partially')</script>";
         echo "<script>location.href='transaction.php'</script>";
      }
    }
    ?>


    <!----------end of unequal amount-------------->

    </div>
    <div class="col-sm-3">
          
  
    
    <div class="form-group card">
      <?php  
if($count>1){
  ?>
          <label >split strategy</label><br>
          <label class="radio-inline">
          <input type="radio" name="optradio" id="optradio1" value="equal" onchange="splitamount()">Equally
          </label>
    
          <label class="radio-inline">
            <input type="radio" name="optradio" id="optradio2" value="different" onchange="splitamount()">Different
          </label>
          <br><br>
          <!--------part1----->
          <div class="form-group" id="amount1" style="display:none">
            <label >Enter Amount</label>
            <input type="number" class="form-control" id="amount" oninput="fixamount()" placeholder="Enter amount" name="amount">
          </div>
          <div id="part1" style="display:none">
            <form action="" method="POST">
            <div class="form-group">
              <label >split amount for all</label>
              <input type="number" class="form-control"  placeholder="Enter Amount" id='splamount'  name="splamount" readonly="true">
            </div>
            <div class="form-group">
              <label >Reason</label>
              <input type="text" class="form-control"  id='reason'  name="reason" required>
            </div>
            <button type="submit" class="submit-btn" name="addequal">ADD</button>
          </form>
          </div>
          <!------end of part1------>
          <div id="part2" style="display:none">
          <form action="" method="POST">
            <?php
              while($row=mysqli_fetch_row($result)){
              if($row[1]!=$user){
            ?>
            <div class="form-group">
              <label ><?php echo $row[2] ?></label>
              <input type="number" class="form-control"  placeholder="Enter Amount"  value="0"  name="<?php echo $row[0] ?>">
            </div>
            <?php
              }
             }
            ?>
            <div class="form-group">
              <label >Reason</label>
              <input type="text" class="form-control"  id='reason'  name="reason" required>
            </div>
            <button type="submit" class="submit-btn" name="adddiff">Add</button>
            <input type="number" class="form-control" style="display:none" id="count"  value="<?php echo $count?>" name="count">
          </form>
          </div>
  <!---------end of part2--------->

<?php
}
else{
  echo "No members in your room to split amount .<br>share the roomid and security code to join others";
}
  ?>
    </div>
    
    
  
   
    </div>
    <div class="col-sm-5" >
    </div>
   
    </div>
  </div>
  <?php
include('footer.php');
?>
</section>
<script>
function splitamount(){
  if(document.getElementById('optradio1').checked){
    // document.getElementById('part1').style.display='block';
    document.getElementById('part2').style.display='none';
  // var amount=document.getElementById('amount').value;
  // var count=document.getElementById('count').value;
  document.getElementById('amount1').style.display='block';
  // document.getElementById('splamount').value=(amount/count).toFixed(2);
}
if(document.getElementById('optradio2').checked){
  document.getElementById('part1').style.display='none';
    document.getElementById('part2').style.display='block';
    document.getElementById('amount1').style.display='none';

  }
}
function fixamount(){
  document.getElementById('part1').style.display='block';
  var amount=document.getElementById('amount').value;
  var count=document.getElementById('count').value;
  document.getElementById('splamount').value=(amount/count).toFixed(0);
}


</script>
</body>
</html>
