<?php 
$a=$_REQUEST['a'];
include_once("connect.php");
$data=mysqli_query($con,"select * from newregister where id='$a'")or die(mysqli_error($con));
if(mysqli_num_rows($data)>0){
	while($ss=mysqli_fetch_assoc($data)){
		$status=$ss['status'];
		if($status=="deactivate"){
			$status="activate";
		}
		else{
			$status="deactivate";
		}
	}
}
	mysqli_query($con,"update newregister set status='$status' where id='$a'")or die(mysqli_error($con));
header("location:adminshowuser.php");
?>