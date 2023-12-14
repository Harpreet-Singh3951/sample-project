<?php 
ob_start(); 
session_start();
if(!(isset($_SESSION['user']))){
	header("location:login.php");
}
$email=$_SESSION['user'];
$a=$_REQUEST['a'];
include_once("connect.php");
$data=mysqli_query($con,"select * from joinpackage where id='$a'")or die(mysqli_error($con));
if(mysqli_num_rows($data)>0){
	while($ss=mysqli_fetch_assoc($data)){
		$pid=$ss['id'];
		$tid = $ss['tid'];
						
	}
}
mysqli_query($con,"delete from joinpackage where id='$a'")or die(mysqli_error($con));
mysqli_query($con,"delete from mytrainer where id='$tid'")or die(mysqli_error($con));	
mysqli_query($con,"delete from addschedule where user='$email' and pid='$pid'")or die(mysqli_error($con));
mysqli_query($con,"delete from addschedulecardio where user='$email' and pid='$pid'")or die(mysqli_error($con));	
						
header("location:usermypackage.php");
?>