<?php 
ob_start(); 
session_start();
$email=$_SESSION['user'];
if(!(isset($_SESSION['user']))){
	header("location:login.php");
}
$a=$_REQUEST['a'];
include_once("connect.php");
mysqli_query($con,"update joinpackage set tid='' where email='$email' and tid='$a'")or die(mysqli_error($con));
$data=mysqli_query($con,"delete from mytrainer where id='$a'")or die(mysqli_error($con));
header("location:usermytrainer.php");
?>