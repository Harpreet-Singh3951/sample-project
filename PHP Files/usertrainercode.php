<?php
ob_start(); 
session_start();
if(!(isset($_SESSION['user']))){
	header("location:login.php");
}
$ss=$_SESSION['user'];
echo $a=$_POST['t1'];
echo $b=$_POST['t2'];

include_once("connect.php");
$data=mysqli_query($con,"select * from joinpackage where id='$a'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		while($ab=mysqli_fetch_assoc($data)){
			$user=$ab['user'];
			$email=$ab['email'];
			$mobile=$ab['mobile'];
			$startdate=$ab['sdate'];
			$enddate=$ab['tdays'];
		}
	}
$ss=$b;
$data=mysqli_query($con,"select * from newtrainer where id='$ss'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		while($aa=mysqli_fetch_assoc($data)){
			$trainer=$aa['user'];
			$traineremail=$aa['email'];
			$fees=$aa['fees'];
			$image=$aa['image'];
		}
	}
	mysqli_query($con,"insert into mytrainer(user,email,mobile,package,strength,cardio,trainer,traineremail,fees,image,status,starting1,ending1,packid) values('$user','$email','$mobile','Details','Strength','Cardio','$trainer','$traineremail','$fees','$image','deactivate','$startdate','$enddate','$a')") or die(mysqli_error($con));
	$padata=mysqli_query($con,"select * from mytrainer where email='$email' and packid='$a'")or die(mysqli_error($con));
	if(mysqli_num_rows($padata)>0){
		while($aas=mysqli_fetch_assoc($padata)){
			$tid=$aas['id'];
		}
	}
	mysqli_query($con,"update joinpackage set tid='$tid' where id='$a'")or die(mysqli_error($con));
	header("location:usermytrainer.php");
	
?>