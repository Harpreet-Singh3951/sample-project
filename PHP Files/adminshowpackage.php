<?php 
ob_start(); 
session_start();
if(!(isset($_SESSION['admin']))){
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
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#aa").keyup(function(){
				data=jQuery(this).val();
				$.ajax({
					type:"post",
					url:"aa.php",
					data:{"a":data},
					success:function(data1){
						jQuery("#aa1").html(data1);
					}
				});
			});
		});
	</script>

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
							<?php include_once("adminmenu.php") ?>
					
					</div>
				</div>
			</header>		
		</div>
		<!-- end:fh5co-header -->
		<div class="fh5co-parallax" style="background-image: url(images/main/6.jpg);" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell animate-box">
							<h1 class="text-center">All Packages</h1>
							<p>All progress takes place outside the comfort zone.</p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end: fh5co-parallax -->
		<!-- end:fh5co-hero -->
		<div id="fh5co-pricing-section" class="fh5co-pricing fh5co-lightgray-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section text-center animate-box">
							<h2>Pricing Plan</h2>
							<div class="col-md-offset-12"><input type="text" name="t1" id="aa" placeholder="Search"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="pricing" id="aa1">
						<?php 
						include_once("connect.php");
						$data=mysqli_query($con,"select * from addpackage")or die(mysqli_error($con));
						if(mysqli_num_rows($data)>0){
							while($ss=mysqli_fetch_assoc($data)){
								?>
						<div class="col-md-4 animate-box">
						<div class="price-box animate-box">
							<h2 class="pricing-plan pricing-plan-offer"><?php echo $ss['name'] ?><span style="color: red;">((<?php echo $ss['offer'] ?>))</span>  </h2>
							<div class="price"><sup class="currency">Rs</sup><?php echo $ss['price'] ?><small>For <?php echo $ss['duration'] ?></small></div>
							<p><?php echo $ss['description'] ?></p>
							<ul class="classes">
								<li class="color"><?php echo $ss['bodybuilding'] ?> Body Building</li>
							<!--	<li><?php #echo $ss['yoga'] ?> Yoga Class</li>-->
								<li class="color"><?php echo $ss['cardio'] ?> Cardio Class</li>
							<!--	<li>10 Zumba Classes</li>
								<li class="color">5 Massage</li>
								<li>10 Body Building</li>-->
							</ul>
							<a href="admindeletepackage.php?a=<?php echo $ss['id'] ?>" class="btn btn-sm">Delete Plan</a>
							<a href="adminupdatepackage.php?a=<?php echo $ss['id'] ?>" class="btn btn-sm">Update Plan</a>
						</div>
					</div>
<?php
							}
						}
						else{

						}
		
							?>
				</div>
				</div>
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

