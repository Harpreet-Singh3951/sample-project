<?php
ob_start(); 
session_start();
if(!(isset($_SESSION['user']))){
	header("location:login.php");
}
$ab=$_SESSION['user'];
include_once("connect.php");
$data=mysqli_query($con,"select * from newregister where email='$ab'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		while($ab=mysqli_fetch_assoc($data)){
			$user=$ab['user'];
			$email=$ab['email'];
			$mobile=$ab['mobile'];
		}
	}
$aa=$_REQUEST['a'];
$data=mysqli_query($con,"select * from addpackage where id='$aa'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		while($ss=mysqli_fetch_assoc($data)){
			$name=$ss['name'];
			$price=$ss['price'];
			$duration=$ss['duration'];
			$offer=$ss['offer'];
			$pid=$ss['id'];
		}
	}
	$data=mysqli_query($con,"select * from joinpackage where user='$user' and pid='$pid'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		header("location:userallpackage.php?a=1");
	}
	else{
		if($duration=="1 months"){
			$days="30 days";
		}
		else if($duration=="3 months"){
			$days="90 days";
		}
		else if($duration=="6 months"){
			$days="180 days";
		}
		$date=date("Y-m-d");
		$date1=date_create($date);
		date_add($date1,date_interval_create_from_date_string($days));
		$days=date_format($date1,"Y-m-d");
		mysqli_query($con,"insert into joinpackage(user,email,mobile,name,price,duration,offer,strength,cardio,pid,sdate,tdays,status) values('$user','$email','$mobile','$name','$price','$duration','$offer','Strength','Cardio','$pid','$date','$days','active')") or die(mysqli_error($con));
		header("location:usermypackage.php?aa=1");
	}
?>