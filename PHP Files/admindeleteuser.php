<?php 
$a=$_REQUEST['a'];
include_once("connect.php");
$data=mysqli_query($con,"delete from newregister where id='$a'")or die(mysqli_error($con));
header("location:adminshowuser.php");
?>