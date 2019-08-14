<?php
include_once 'php/login_session.php';
if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
	header("Location: login.php");
	exit();
}

$profile_pics = "";

$query = "SELECT * FROM `drivers` WHERE `id`=? LIMIT 1";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$driver = $stmt->get_result();
while($driver_run = $driver->fetch_assoc()){
	$driver_id = $driver_run['id'];
	$fullname = $driver_run['fullname'];
	$make = $driver_run['make'];
	$model = $driver_run['model'];
	$license = $driver_run['license'];
	$passport = $driver_run['passport'];
	$email = $driver_run['email'];
	$phone = $driver_run['phone'];
	$date = date_create($driver_run['date_added']);
}
$profile_pics = '<img src="uploads/'.$driver_id.'/'.$passport.'" alt="'.$fullname.'">';
if($passport == NULL){
	$profile_pics = '<img src="img/Male.png" alt="'.$fullname.'">';
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/driver_dash.css">
<link rel="stylesheet" href="css/animate.css">
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
<title><?php echo $fullname."'s Dashboard";?></title>
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
					<li role="presentation"><a href="php/logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
	<div class="dashboard">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<ul class="nav navbar-nav">
						<li><a href="driver_dash.php">Dashboard</a></li>
						<li><a href="#">Notifications</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="col-lg-4 col-md-4">
				<div class="photo">
					<?php echo $profile_pics;?>
				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="ins">
					<h5><b>Welcome <?php echo $fullname;?> </b></h5>
				</div>
				<hr/ >
				<div class="require">
					<h4><b>Personal Information:</b></h4>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Vehicle Make:</label>
						<input type="text" value="<?php echo $make;?>" class="form-control"/>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Vehicle Model:</label>
						<input type="text" value="<?php echo $model;?>" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Vehicle License:</label>
						<input type="text" value="<?php echo $license;?>" class="form-control"/>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Driver's Email:</label>
						<input type="text" value="<?php echo $email;?>" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label for="name">Driver's Phone:</label>
						<input type="text" value="<?php echo $phone;?>" class="form-control"/>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label for="name">Date Registered:</label>
						<input type="text" value="<?php echo date_format($date, "F d, Y");?>" class="form-control"/>
						</div>
					</div>
					</div>
					
			</div>
		</div>
	</div>
</div>
</div>

<!--Footer -->
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
				</div>
				
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<h4>Quick Links</h4>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Get A Cab</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Hire</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Sales</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Hotel Services</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Accessories</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Truck Hire</a>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<h4>Stay Connected</h4>
						<i class="social fa fa-facebook" aria-hidden="true"></i>
						<i class="social fa fa-twitter" aria-hidden="true"></i>
						<i class="social fa fa-linkedin" aria-hidden="true"></i>
						<i class="social fa fa-pinterest" aria-hidden="true"></i>
						<i class="social fa fa-youtube" aria-hidden="true"></i>
						<i class="social fa fa-github" aria-hidden="true"></i><br>
						<form id="subscribe" method="POST" action="php/admin.inc.php">
						<input type="email" name="email" placeholder="subscribe for updates" /><button class="btn btn-success">SUBSCRIBE</button>
						</form>
						<div class="reach">
						<p><i class="fa fa-home" aria-hidden="true"></i> Regina Caeli Awka Anambra State</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> okparapeter@gmail.com</p>
						<p><i class="fa fa-phone" aria-hidden="true"></i> +2347069338241</p>
						<p><i class="fa fa-globe" aria-hidden="true"></i> www.morextech.org</p>
						</div>
				</div>
				
			</div>
		</div>
		<p style="text-align:center; font-size:18px; padding:25px;">Morex Technology &copy; <?php echo date("Y");?></p>
	</div>
	<!-- End of Footer-->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.js"></script>
</body>
</html>
</body>
</html>