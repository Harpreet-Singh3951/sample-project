<?php 
ob_start(); 
session_start();
if(!(isset($_SESSION['trainer']))){
	header("location:login.php");
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fitness &mdash;</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.html">Body<span>force</span></a></h1>
						<!-- START #fh5co-menu-wrap -->
							<?php include_once("trainermenu.php") ?>
					</div>
				</div>
			</header>		
		</div>
		<!-- end:fh5co-header -->
		<div class="fh5co-parallax" style="background-image: url(images/main/9.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell animate-box">
							<h1 class="text-center">Add Schedule</h1>
							<p>All our dreams can come true if we have the courage to pursue them.</p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end: fh5co-parallax -->
		<!-- end:fh5co-hero -->
		<div id="fh5co-contact">
			<div class="container">
				<?php
if($_SERVER['REQUEST_METHOD']=="POST" && !(isset($_POST['t1']))){
	$a = $_POST['user'];
	$b = $_POST['day'];
    $pid = $_POST['pid'];
    $c = $_POST['exercise1'];
    $d = $_POST['exercise2'];
    $e = $_POST['exercise3'];
    $f = $_POST['exercise4'];
    $g = $_POST['exercise5'];
    $h = $_POST['exercise6'];
    $i = $_POST['exercise7'];
    $tid=$_SESSION['trainer'];
    $bp = $_POST['bp'];
	if($a=="" || $b =="" || $c =="" || $d =="" || $e =="" || $f =="" || $g =="" || $h =="" || $e =="" || $bp ==""){}
	else{
	include_once("connect.php");
	$data=mysqli_query($con,"select * from addschedule where user='$a' and day='$b'")or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0){
		header("location:trainerpackagedetail.php?a=".$a);
	}
	else{
	mysqli_query($con,"insert into addschedule(user,trainerid,day,ex1,ex2,ex3,ex4,ex5,ex6,ex7,pid,bp) values('$a','$tid','$b','$c','$d','$e','$f','$g','$h','$i','$pid','$bp')")
	or die(mysqli_error($con));
	header("location:trainerpackagedetail.php?a=".$a);
	}
	}
	}
?>

				<form action="" method="post">
					<div class="row">
						<div class="col-md-3 animate-box">

						</div>
						<div class="col-md-6 offset-3 animate-box">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<select class="form-control" placeholder="User" name="user">
											<?php
											$aa=$_POST['t1'];
											include_once("connect.php");
					$data=mysqli_query($con,"select * from newregister where email='$aa'")or die(mysqli_error($con));
						if(mysqli_num_rows($data)>0){
							if($ss=mysqli_fetch_assoc($data)){
								echo"<option value=".$ss['email'].">".$ss['user']."</option>";

							}
						}

?>
										</select>
									</div>
								</div>
							
								<div class="col-md-12">
									<div class="form-group">
										<select class="form-control" placeholder="Day" name="day" required>
											<option value="">Select Day</option>
											<option>Monday</option>
											<option>Tuesday</option>
											<option>Wednesday</option>
											<option>Thursday</option>
											<option>Friday</option>
											<option>Saturday</option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<select class="form-control" placeholder="Body Part" name="bp" required>
											<option value="">Body Part</option>
											<option>Shoulder</option>
											<option>Chest</option>
											<option>Back</option>
											<option>Bicep</option>
											<option>Tricep</option>
											<option>Leg</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 1" name="exercise1">
										<input type="hidden" class="form-control" placeholder="Exercise 1" name="pid" value="<?php echo $_POST['t2'] ?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 2" name="exercise2">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 3" name="exercise3">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 4" name="exercise4">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 5" name="exercise5">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 6" name="exercise6">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Exercise 7" name="exercise7">
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Add" class="btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php include_once("footer.php") ?>

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>


