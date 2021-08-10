<?php
include('connection.php');
if(isset($_POST['received'])){
  $updateid=$_POST['updateid'];
    $updatequery="update `transactions` set status=1 where id='$updateid'";
    
    if(mysqli_query($conn,$updatequery)){
    	echo "<script>alert('status updated')</script>";
    	echo "<script>location.href='transaction.php'</script>";
    }
    
  }

?>