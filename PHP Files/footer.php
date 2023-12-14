<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 animate-box">
							<h3 class="section-title">About Us</h3>
							<p>BodyForce is a champ in providing its users with absolutely everything a <br>fitness or gym site needs. Due to great success at delivering high-quality facilities and services, BodyForce has consistently achieved exponential growth.</p>
						</div>

						<div class="col-md-4 animate-box">
							<h3 class="section-title">Our Address</h3>
							<ul class="contact-info">
								<li><i class="icon-map-marker"></i>S.C.O. 187-189, Second Floor<br>Karol Marg, Sector 4,<br>Shahabad.</li>
							<!--	<li><i class="icon-phone"></i>+91 9935 2355 98</li>-->
								<li><i class="icon-envelope"></i><a href="#">bodyforcegym@gmail.com</a></li>
								<li><i class="icon-globe2"></i><a href="#">www.bodyforcegym.com</a></li>
							</ul>
						</div>
						<div class="col-md-4 animate-box">
							<h3 class="section-title">Drop us a line</h3>
							<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$a = $_POST['user'];
	$b = $_POST['email'];
    $c = $_POST['message'];
	if($a=="" || $b =="" || $c ==""){}
	else{
	include_once("connect.php");
	mysqli_query($con,"select * from feedback where user='$a' and email='$b'")or die(mysqli_error($con));
	mysqli_query($con,"insert into feedback(user,email,message) values('$a','$b','$c')")
	or die(mysqli_error($con));
	header("location:home.php");
	}
	}
?>
							<form class="contact-form" action="" method="post">
								<div class="form-group">
									<label for="name" class="sr-only">Name</label>
									<input type="name" class="form-control" id="name" placeholder="Name" name="user">
								</div>
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email" name="email">
								</div>
								<div class="form-group">
									<label for="message" class="sr-only">Message</label>
									<textarea class="form-control" id="message" rows="7" placeholder="Message" name="message"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
								</div>
							</form>
						</div>
					</div>
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2010 @ <a href="#">BodyForce</a>. All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	