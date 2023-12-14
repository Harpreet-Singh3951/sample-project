<?php 
$aa=$_REQUEST['a'];
$hint="";
	include_once("connect.php");
	$data=mysqli_query($con,"select * from addpackage ")or die(mysqli_error($con));
	while($ss=mysqli_fetch_assoc($data)){
		if(strtolower($aa)==strtolower(substr($ss['name'],0,strlen($aa)))){
			if($hint==""){
				$hint="<div class=col-md-4>
						<div class=price-box animate-box>
							<h2 class=pricing-plan pricing-plan-offer>".$ss['name']."</h2>
							<div class=price><sup class=currency>Rs</sup>".$ss['price']."<small>For ".$ss['duration']."</small></div>
							<p>".$ss['description']."</p>
							<ul class=classes>
								<li class=color>".$ss['bodybuilding']." Body Building</li>
								<li class=color>".$ss['cardio']." Cardio Class</li>
							</ul>
							<a href=login.php?a=".$ss['id']." class=btn btn-default>Apply Plan</a>
						</div>
					</div>";
			}
			else{
				$hint.="<div class=col-md-4>
						<div class=price-box animate-box>
							<h2 class=pricing-plan pricing-plan-offer>".$ss['name']."</h2>
							<div class=price><sup class=currency>Rs</sup>".$ss['price']."<small>For ".$ss['duration']."</small></div>
							<p>".$ss['description']."</p>
							<ul class=classes>
								<li class=color>".$ss['bodybuilding']." Body Building</li>
								<li class=color>".$ss['cardio']." Cardio Class</li>
							</ul>
							<a href=login.php?a=".$ss['id']." class=btn btn-default>Apply Plan</a>
							</div>
					</div>";
			}
		}
	}
	if($hint==""){
		$msg="<h2 style='color: gray;'>OOPS! There is no plan related to your search...</h2>";
	}
	else{
		$msg=$hint;
	}
echo $msg;
?>