<?php
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$roomid=$_POST['roomid'];
$seccode=$_POST['seccode'];
$conn= mysqli_connect('localhost','root','','roomiee');
if($conn)
{
	$query1="INSERT INTO `users`(`email`, `roomid`, `seccode`, `adminstatus`,`username`,`password`) VALUES ('$email','$roomid','$seccode',1,'$username','$password')";
	$result=mysqli_query($conn, $query1);
	if($result)
	{
		echo "<script>alert(\" Room created .share roomid and security code to join in your room\")</script>";
		echo "<script>location.href='login.php'</script>";
	}
	else{
		echo "<script>alert('room not created! Try again')</script>";
		echo "<script>location.href='index.php#tab1'</script>";
	}
}
else{
	echo "not connected";
}
?>