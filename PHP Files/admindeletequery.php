<?php 
ob_start(); 
session_start();
if(!(isset($_SESSION['admin']))){
	header("location:login.php");
}
$a=$_REQUEST['a'];
include_once("connect.php");
$data=mysqli_query($con,"delete from askqueryadmin where id='$a'")or die(mysqli_error($con));
header("location:adminallrequest.php");
?>