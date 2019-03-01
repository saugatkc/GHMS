<!DOCTYPE html>
<html lang="en" dir="ltr">
  	<head>
   	 	<meta charset="utf-8">
    	<title>contactus</title>
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	    <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="styl.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
  	</head>
<body>
	<div >
	 <div id="navi">
	<?php
	include_once ('header.php');
	?> 
	</div>

		<div class="container">
			<h1>Contact Us</h1><br><br>
			<div class="row">
			<div class="row col-md-4 contact1">
			<p><b>Address:</b>Kirtipur,kathmandu,Nepal<br><br>
			<b>Mobile:</b>+9779851070381<br><br>
			<b>Phone:</b>014335159<br><br>
			<b>Email:</b>Trisaguesthouse@gmail.com</p>
			</div>
			<div class="row col-md-4 about1 contact2">
				<div class="form-group">
  				<label for="email">Email:</label>
  				<input type="text" class="form-control" id="email">
  				<label for="comment">Message:</label>
  				<textarea class="form-control" rows="5" id="comment"></textarea><br>
  				<button type="button" class="btn btn-secondary">Send</button>
			</div>
			</div>
		</div>



<div id="googleMap" style="height:400px;width:100%;"></div>
<h5>Location</h5>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(51.383488899999996, -2.0318729593399247);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi3p-QIbcRA0z6vDNx7RdrmoOy4rzWPQU&callback=myMap"></script>
	</div><br>
		
	
	<div>
	<?php
	include_once ('footer.php');
	?>
	</div>

	
</body>
</html>