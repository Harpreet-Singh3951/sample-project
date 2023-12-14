<?php 
$a1=$_REQUEST['a1'];
include_once("connect.php");
$data=mysqli_query($con,"select * from addschedulecardio where id='$a1'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		while($ss=mysqli_fetch_assoc($data)){
			 $user=$ss['user'];
		}
	}
$data=mysqli_query($con,"delete from addschedulecardio where id='$a1'")or die(mysqli_error($con));
header("location:trainershowschedule2.php?a=".$user);
?>