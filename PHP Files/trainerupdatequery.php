<?php 
ob_start(); 
session_start();
if(!(isset($_SESSION['trainer']))){
	header("location:login.php");
}
$a=$_REQUEST['a'];
include_once("connect.php");
$data=mysqli_query($con,"update askquerytrainer set reply='' where id='$a'")or die(mysqli_error($con));
header("location:trainerallrequest.php");
?>