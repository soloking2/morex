<?php 
if(isset($_GET["location"])){
	$search = $_GET['location'];
	
	include_once 'php/db.php';
	$query = "SELECT * FROM `job` WHERE location LIKE ?";
	$stmt = $con->prepare($query);
	$stmt->bind_param('s', $look);
	$look = '%' . $search . '%';
	$stmt->execute();
	$result = $stmt->get_result();
	$num = $result->num_rows;
	
	while($row = $result->fetch_assoc()){
		echo $locate = "<option value='".$row['location']."'>".$row['location']."</option>";
	}	
}

?>
<?php
if(isset($_GET["dest"])){
	$destination = $_GET['dest'];
	
	include_once 'php/db.php';
	$sql = "SELECT * FROM `job` WHERE destination LIKE ?";
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $where);
	$where = '%' . $destination . '%';
	$stmt->execute();
	$destinate = $stmt->get_result();
	$num_row = $destinate->num_rows;
	
	while($fetch = $destinate->fetch_assoc()){
		echo $locate = "<option value='".$fetch['destination']."'>".$fetch['destination']."</option>";
	}	
}

?>
<?php
// if(isset($_POST["getResult"]) && isset($_POST['getDest'])){
	// $res = $_POST["getResult"];
	// $des = $_POST["getDest"];
	
	// include_once 'php/db.php';
	// $query = "SELECT * FROM `job` WHERE location = ? AND destination = ?";
	// $stmt = $con->prepare($query);
	// $stmt->bind_param('ss', $res, $des);
	// $stmt->execute();
	// $amt = $stmt->get_result();
	// $num_row = $amt->num_rows;
	
	// $real = $amt->fetch_assoc();
		// echo $amount = "<b>".$real['amount']."</b>";
// }
?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/customer.css">
<link rel="stylesheet" href="css/animate.css">
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
<title>Get A Cab</title>
<script>


</script>
<script>
function search(){
	var locate = document.getElementById("location");
	var result = document.getElementById("result");
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
			if(result.innerHTML = xmlhttp.responseText){
				result.style.display = "block";
				}
				}
		}
		xmlhttp.open('GET', 'customer.php?location='+document.formCustomer.location.value, true);
		xmlhttp.send();
}
function sendRequest(){
	var message = _("message");
	var phone = _("phone").value;
	var name = _("name").value;
	var getResult = _("result").value;
	var getDest = _("destination").value;
	if(getResult == "" || getDest == "" || phone == "" || name == ""){
		message.innerHTML = "Please fill all the fields";
	}else {
		_("send").style.display = "none";
		message.innerHTML = "<span class='fa fa-spinner'></span> Please Wait...";
		var ajax = ajaxObj("POST", "php/customer.inc.php");
		ajax.onreadystatechange = function(){
			if(ajaxReturn(ajax) == true){
				if(ajax.responseText == "Error"){
					_("send").style.display = "block";
				} else{
					window.scrollTo(0,0);
					_("formCustomer").innerHTML = name+", your message have been sent. You will receive a your driver information shortly";
				}
			}
		}
		ajax.send("name="+name+"&phone="+phone+"&getResult="+getResult+"&getDest="+getDest);
	}
}
</script>
<script>
function move(){
	var dest = document.getElementById("dest");
	var destinate = document.getElementById("destination");
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState ==4 && xmlhttp.status ==200){
			if(destinate.innerHTML = xmlhttp.responseText){
				destinate.style.display = "block";
				}
				}
		}
		xmlhttp.open('GET', 'customer.php?dest='+document.formCustomer.dest.value, true);
		xmlhttp.send();
}
</script>
<style>
#result, #destination{
	display:none;
}
#amount{
	clear:both;
}
</style>
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
					<li role="presentation"><a href="cab.php">Get a Cab</a></li>
				</ul>
			</div>			
		</div>
	</div>
	</div>
</div>
</div>

<div class="login">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<form method="POST" name="formCustomer" id="formCustomer" onsubmit="return false;">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="name">Your Current Location:</label>
					<input type="text" name="location" id="location" class="form-control" onkeydown="search();" onmouseleave="this.value=''"/>
				</div>	
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div class="form-group">
						<select id="result" name="getResult" class="form-control"></select>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="text">Destination:</label>
					<input type="text" name="dest" id="dest" class="form-control" onkeyup="move();" onmouseleave="this.value=''"/>
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<select id="destination" name="getDest" class="form-control"></select>
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="name">Full Name</label>
					<input type="text" name="name" id="name" class="form-control" onfocus="this.value=''" placeholder="fullname"/>
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="text">Phone Number</label>
					<input type="text" name="phone" id="phone" class="form-control" onfocus="this.value=''" placeholder="Phone Number"/>
				</div>
				</div>
				<div class="col-lg-5 col-sm-offset-5">
				<div class="form-group">
					<button type="submit" class="btn btn-success" name="send" id="send" onclick="sendRequest();" class="form-control">SEND</button>
				</div>
				<span id="message"></span>
				</div>
			</form>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<?php include_once 'html/map.php';?>
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