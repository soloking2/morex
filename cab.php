<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/cab.css">
<link rel="stylesheet" href="css/animate.css">
<script>

function emptyElement(x){
	x.value = "";
}
function register(){
	var surname = _("surname").value;
	var first = _("first").value;
	var phone = _("phone").value;
	var pwd = _("password").value;
	var p2 = _("repeat_pwd").value;
	var e = _("email").value;
	var license = _("license").value;
	var file = _("file").value;
	var msg = _("msg");
	if(surname == "" || first == "" || phone == "" || pwd == "" || p2 == "" || e == "" || license == ""){
		msg.innerHTML = "Please fill all the fields";
	} else if(pwd != p2){
		msg.innerHTML = "Your password fields do not match";
	} else if(pwd.length < 8){
		msg.innerHTML = "Your password should be more than 8 characters";
	}
	// else{
		// _("send").style.display = "none";
		// msg.innerHTML = '<span class="fa fa-spinner"></span>Please wait ... ';
		// var ajax = ajaxObj("POST", "php/login.inc.php");
		// ajax.onreadystatechange = function(){
			// if(ajaxReturn(ajax) == true){
				// if(ajax.responseText == "Please enter required information"){
					// message.innerHTML = "Registration Unsuccessful, please try again";
					// _("s").style.display = "block";
				// } else {
					// window.location = "driver_dash.php?id"+ajax.responseText;
				// }
			// }
		// }
		// ajax.send("surname="+surname+"&first="+first+"&phone="+phone+"&pwd="+pwd+"&e="+e+"license="+license+"&file="+file);
	// }
// }


}
</script>
<title>Get A Cab</title>
</head>
<body>
<div class="wrapper">
<div id="myNav" class="navbar navbar-default" role="navigation">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<a href="#" class="navbar-brand"><img src="img/morex.png"> </a>
					</div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">HOME</a></li>
					<li><a href="#" type="button" class="btn btn-default" style="color:black;">BECOME A DRIVER</a></li>				
				</ul>
			</div>
				
		</div>
	</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="intro">
				<h4>MOREX TECHNOLOGY <br />TREATS DRIVERS <br />BETTER, DRIVERS <br />TREAT YOU BETTER.</h4>
				<p>Join to enjoy 20% off all rides in the <br />North-East Region of Nigeria.</p>
			</div>
			<div id="ride" class="col-lg-5 col-sm-offset-5">
					<a href="customer.php" type="button" class="btn btn-primary">Take a Ride</a>
					<a href="#driver" type="button" class="btn btn-primary">Become a Driver</a>
			</div>
			<div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
			<div class="but wow pulse" data-wow-duration="1.4s" data-wow-iteration="infinite">
				<a href="#cont"><i class="fa fa-arrow-down"></i></a>
			</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Services-->
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="services">
				<h2>THE SOCIALLY RESPONSIBLE WAY TO RIDE</h2>
				<p>We built Morex Technology because we know when people are treated better, <br /> they provide better service. Happy Drivers, Happy Riders.</p>
			</div>
			<div class="service">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<p><i class="fa fa-diamond"></i></p>
						<h3>Only the Best</h3>
						<h4>Morex Technology Only accept the Best Drivers around Anambra state.</h4>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<p><i class="fa fa-gift"></i></p>
						<h3>Discount</h3>
						<h4>Competitive pricing and better discount</h4>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<p><i class="fa fa-star-o"></i></p>
						<h3>Rating</h3>
						<h4>We have drivers our customers rate well. </h4>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<p><i class="fa fa-times-rectangle"></i></p>
						<h3>Here For You</h3>
						<h4>24/7 Live, Phone, Email and Text Support</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Services-->
<!-- Services Continue-->
<div class="cont" id="cont">
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="checkout">
				<h2>Cab In A Click</h2>
				<p>Morex Technology cab service is a few steps away!. Enjoy the offer.</p>
			</div>
			<div class="check">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							<span class="fa fa-headphones"></span>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
							<h4>A way To Go</h4>
							<p>Morex Technology offers a best-in-class cab service across the East to make the way to reach destination with no hassles. 
							For the convenience of our passengers, we make our presence online and let our customers book cabs instantly and reach their destinations easily. 
							With the help of our cab management software, we pave a way to uplift the on-demand transportation in our locale.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							<span class="fa fa-key"></span>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
							<h4>Everywhere All The Time</h4>
							<p>Your all-time, reliable cab company to get into and get through places where you are destined to go. 
							In and around the Eastern part of Nigeria, Morex Technology would be your day-to-day travel partner to go for places in a feasible time and affordable price. You don’t have to wave your hands to get cab anymore. 
							Morex Technology is here in Anambra to get the booking done from anywhere to go everywhere.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							<span class="fa fa-globe"></span>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
							<h4>Convenience at Low Cost</h4>
							<p>As a mission to make your travels simple, easy, and comfortable, we, Morex Technology, provide our passengers with an utmost convenience while booking a cab or travelling through it. 
							While providing a luxury service to our customers, 
							Morex Technology made it affordable for Nigerians to reach their destination with a one-of-a-kind cab service.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End of Services-->
<!-- Become a Driver-->
<div class="driver" id="driver">
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="become">
								<h2>Become a Driver</h2>
								<form method="POST" id="registerForm" action="php/login.inc.php" enctype="multipart/form-data">
									<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<div class="form-group">
										<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" autofocus>
									</div>
									<div class="form-group">
										<input type="text" name="make" id="make" class="form-control" placeholder="Vehicle Make">
									</div>
									<div class="form-group">
										<input type="text" name="model" id="model" class="form-control" placeholder="Vehicle Model">
									</div>
									<div class="form-group">
										<input type="text" name="license" id="license" class="form-control" placeholder="License Plate">
									</div>
									<div class="form-group">
										<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<input type="password" name="password" id="password" class="form-control" placeholder="Password">
										</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<input type="password" name="repeat_pwd" id="repeat_pwd" class="form-control" placeholder="Confirm Password">
									</div>
									</div>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus>
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
									</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<div class="box"><img src="img/Male.png"></div>
										<div class="form-group">
											<input type="file" name="file" id="file" />
										</div>
									</div>
									</div>
									
									<div class="form-group">
										<button type="submit" name="send" id="send" onclick="register()" class="btn btn-success form-control col-lg-6 col-sm-offset-2">SEND</button>
										<span id="msg"></span>
									</div>
									<div class="col-lg-10 col-md-offset-2 log">
										<h4>OR <a href="login.php">Click Here </a>to Login</h4>
									</div>
								</form>
							
					</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="how">
						<h1>BECOME</h1>
						<h1>A DRIVER</h1>
						<div class="criteria">
						<li>Got a car? Turn it into a money machine. Morex Technology matches drivers with passengers who request rides through our web app, and passengers pay with cash.
						We are now open to partnerships with individuals who want to put their car and driver under our platform to be used for cab business.</li>
						
						<li>Fill in your details, and your vehicle details also, like Make, Model, Year and color of interior and exterior of the car. </li>
						<li>Also vehicle documents must be complete and up to date. Someone from Morex Technology will physically inspect the car before approval.</li>
						<li>Once all the above requirements are met, the driver will be verified, get his account activated to be able to start using the platform and also 
						get an ‘on-the-road’ real life orientation on how the platform works.</li>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Compliant-->
<!-- End of Compliant-->
<div id="footer" class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h4>Contact us</h4>
						<div class="row">
							<div class="con">
							<form id="contactForm" method="POST" action="php/admin.inc.php">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group input-group-md wow fadeInUp" data-wow-delay="0.8s">
									<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="hidden"></i></span>
									<input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="full name">
								</div>
								<div class="input-group input-group-md wow fadeInUp" data-wow-delay="1.2s">
									<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="hidden"></i></span>
									<input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="email address">
								</div>
								<div class="input-group input-group-md wow fadeInUp" data-wow-delay="1.6s">
									<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="hidden"></i></span>
									<input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="phone number">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<div class="input-group wow fadeInUp" data-wow-delay="2.0s">
									<textarea name="area" id="area" cols="80" rows="6" class="form-control"></textarea>
								</div>
								<button type="button" class="btn btn-lg wow fadeInUp" data-wow-delay="2.4s">SEND MESSAGE</button>
							</div>
						</form>
					</div>
					</div>
					<p style="text-align:center; font-size:18px; padding:25px;">Morex Technology &copy; <?php echo date("Y");?></p>
				</div>
				
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<h4>Quick Links</h4>
						<a href="cab.php"><i class="fa fa-square-o" aria-hidden="true"></i> Get A Cab</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Hire</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Sales</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Hotel Services</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Accessories</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Truck Hire</a>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<h4>HELP & INFO</h4>
						<li>If you have lost any item please use our contact us compliant form</li>
						<li>If you missed your appointment, use our contact us compliant form</li>
						<li>Do you have any Questions with regards to our services, you can feel free to contact us</li>
						<hr />
						<div class="reach">
						<p><i class="fa fa-home" aria-hidden="true"></i> Regina Caeli Awka Anambra State</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> okparapeter@gmail.com</p>
						<p><i class="fa fa-phone" aria-hidden="true"></i> +2347069338241</p>
						<p><i class="fa fa-globe" aria-hidden="true"></i> www.morextech.org</p>
						</div>
				</div>
			</div>
	</div>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.js"></script>
</body>
</html>