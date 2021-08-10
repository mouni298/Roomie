<?php
include('connection.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$roomid=$_POST['roomid'];
$seccode=$_POST['seccode'];

if($conn)
{
	$checkquery="SELECT * FROM `users` WHERE roomid='$roomid' and email='$email'";
	$result2=mysqli_query($conn, $checkquery);
	// $row1 = mysqli_fetch_array($result2, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result2);
   
    if(!($count>0))
    {
    	$query="SELECT `seccode` FROM `users` WHERE roomid='$roomid'";
		$result=mysqli_query($conn, $query);
		while($row=mysqli_fetch_row($result))
		{
			$seccode1=$row[0];
		}
		if($seccode==$seccode1)
		{
			//echo "valid user";
			$query1="INSERT INTO `users`(`email`, `roomid`, `seccode`,`username`,`password`) VALUES ('$email','$roomid','$seccode','$username','$password')";
			$result1=mysqli_query($conn, $query1);
			if($result1)
			{
				$_SESSION['user']=$email;
				echo "<script>alert('successfully joined .please login')</script>";
				echo "<script>location.href='login.php'</script>";
				
			}
			else
			{
				echo "<script>alert('Data Error!try after some time')</script>";
				echo "<script>location.href='index.php#tab1'</script>";
    			
			}
		}
		else
		{
			echo "<script>alert('Invalid Code or roomid')</script>";
			echo "<script>location.href='index.php#tab1'</script>";
		}
    }
    else{
    	echo "<script>alert('already registered with this mail')</script>";
    	echo "<script>location.href='index.php#tab1'</script>";
    }
	
mysqli_close($conn);
}
else
{
	echo "not connected";
}
?>