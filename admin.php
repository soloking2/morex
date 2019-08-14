<?php
include_once 'admin_log.php';
if(!isset($_SESSION['admin'])){
	header("location: admin_check.php");
	exit();
}
?>
<?php
$check2 = mysqli_query($con, "SELECT COUNT(id) FROM `customers`");
$query2 = mysqli_fetch_row($check2);
$checkTotal = $query2[0];

$query = mysqli_query($con, "SELECT COUNT(id) FROM `drivers`");
$query_run = mysqli_fetch_row($query);
$total = $query_run[0];

$rpp = 5;
$last = ceil($total/$rpp);
if($last < 1){
	$last = 1;
}
$pagenum = 1;
if(isset($_GET['page'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
}	
	if($pagenum < 1){
		$pagenum = 1;
	} else if($pagenum > $last){
		$pagenum = $last;
	}
	$limit = 'LIMIT '. ($pagenum - 1) * $rpp .',' .$rpp;
	$query = "SELECT * FROM `drivers` ORDER BY id ASC $limit";
	$query_run = mysqli_query($con,$query);
	
	$textline = "<b>$total</b>";
	$textline1 = "Page <b>$pagenum</b> of <b>$last</b>";
	
	$paginationCtrls = '';
	if($last != 1){
		if($pagenum > 1){
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$previous.'">Previous</a> &nbsp; &nbsp; ';
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0){
					$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$i.'">'.$i.'</a> &nbsp; ';
				}
			}
		}
		$paginationCtrls .= ''.$pagenum.' &nbsp;';
		for($i = $pagenum+1; $i <= $last; $i++){
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$i.'">'.$i.'</a> &nbsp;';
			if($i >= $pagenum+4){
				break;
			}
		}
		if($pagenum != $last){
			$next = $pagenum + 1;
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$next.'">Next</a> &nbsp; &nbsp; ';
		}
	}
		
	$list = '';
	while($row = mysqli_fetch_array($query_run, MYSQLI_ASSOC)){
		$id = $row["id"];
		$fullname = $row["fullname"];
		$make = $row["make"];
		$model = $row["model"];
		$phone = $row["phone"];
		$email = $row["email"];
		$passport = $row["passport"];
		$date_registered = date_create($row["date_added"]);
		$format = date_format($date_registered, "F d, Y");
		$list .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="pic col-lg-4 col-md-4"><img src="uploads/'.$id.'/'.$passport.'"></div>
		<div class="col-lg-8 col-md-8">
		<h4>'.$fullname.'</h4>
		<p>Cab make is '.$make.'</p>
		<p>Cab model is '.$model.'</p>
		<p>Driver\'s contact number: '.$phone.'</p>
		<p>Driver\'s contact email: '.$email.'</p>
		<p>Date registered: '.$format.'</p>
		<a href="admin_msg.php?id='.$id.'">Send Message</a></div></div>';
	}
mysqli_close($con);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/animate.css">

<title>Admin Dashboard</title>
<style>
	body{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#pagination_controls{
	font-size:27px;
}
#pagination_controls a{
	color:#067;
}
#heading{
	text-decoration:none;
}
#pagination_controls > a:visited{
	color:#06F;
}
</style>
</head>
<body>
<div id="myNavbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-7 col-md-7">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			
			<a href="#" class="navbar-brand">Dashboard</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Settings</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="#">Help</a></li>
				</ul>
			</div>
		</div>
		
		
	<div class="col-lg-5 col-md-5 hidden-xs">
		<div class="pull-right">
			<form class="form-inline" action="" method="post">
				<div class="row">
				<div class="form-group col-lg-7 col-md-7">
					<input type="search" name="search" id="search" class="form-control"  placeholder="search">
				</div>
				<div class="col-lg-4 col-sm-offset-1">
				<button type="submit" class="btn btn-success" name="search" value="search">search</button>
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
 </div>	
</div>

<div class="section">
	<div class="container-fluid">
		<div class="row">
		<div class="col-lg-3 col-md-3">
			<div class="sidebar">
			<ul class="nav nav-pills nav-stacked navbar-static">
				<li>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<img src="img/peter.png" alt="avatar" width="75" height="75">
					</div>
					<div class="col-lg-8 col-md-8">
						<h5 class="wow flipOutX" data-wow-iteration="infinite" style="color:rgba(0,0,0, .5); font-size:14px;"> <?php echo $name;?></h5>
						<p><?php echo "Welcome Administrator";?></p>
						<hr>
					</div>
				</div>
				</li>
				<li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
				<li><a href="#"><i class="fa fa-hand-o-right"></i>Messages</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" ariahaspopup="true" role="button" aria-expanded="false"><i class="fa fa-user"></i>Messenger
				<span class="caret pull-right"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-plus"></i>Compose mail</a></li>
						<li><a href="#"><i class="fa fa-inbox"></i>Inbox</a></li>
						<li><a href="#"><i class="fa fa-inbox"></i>Sent mail</a></li>
					</ul>
				</li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
			</ul>
			
		</div>
		</div>
		<div class="col-lg-9 col-md-9">
			<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div style="background:#ccc; color:#FFF; text-align:center;">
						<h4><?php echo $textline;?></h4>
						<h4><span class="fa fa-cab"></span> Drivers</h4>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div style="background:#ccc; color:#FFF; text-align:center;">
						<h4><?php echo $checkTotal;?></h4>
						<h4><span class="fa fa-cab"></span> Customers</h4>
						</div>
					</div>
				</div>
					<p><?php echo $textline1; ?></p>
					<?php echo $list; ?>
					<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>
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
						<div class="row">
							<div class="con">
							<h2>Admin Homepage</h2>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/wow.min.js"></script>
	<script>
	new WOW().init();
	</script>

</body>
</html>
