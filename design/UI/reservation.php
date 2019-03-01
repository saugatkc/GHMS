
<!DOCTYPE html>
<html lang="en" dir="ltr">
  	<head>
   	 	<meta charset="utf-8">
    	<title>Reservation</title>
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	    <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="styl.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
  	</head>
  	<body>

	<div >
	<?php
	include_once ('header.php');
	?> 
	</div>
	

	<div>
		<img class="mySlides" src="images/reservation.jpg">
		
	</div>
	<br>


<div class="container">
	<div class="form-group">
  <h5><label for="Chkin">Check In:</label></h5>
  <input type="Date" class="form-control" id="Chkin">
</div>
<div class="form-group">
  <h5><label for="chkout">Check Out:</label></h5>
  <input type="Date" class="form-control" id="chkout">
</div>

  <form action="/action_page.php">
    <div class="form-group">
      <h5><label for="sel1">Package</label></h5>
      <select class="form-control" id="sel1" name="sellist1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
      <br>
      <h5><label for="sel1">Room type</label></h5>
      <select class="form-control" id="sel1" name="sellist1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
  </form>

  <h5>Rooms</h5>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Room No</th>
        <th>Image</th>
        <th>Price(RS) per night</th>
        <th>Status</th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>103</td>
        <td><imgsrc></td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Select</button></td>
      </tr>
      <tr>
        <td>104</td>
        <td><imgsrc></td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Select</button></td>
      </tr>
      <tr>
        <td>105</td>
        <td><imgsrc></td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Select</button></td>
      </tr>
    </tbody>
  </table>
  <form action="/action_page.php">
    <div class="form-group">
      <input type="text" class="form-control" id="usr" name="username">
    </div>
  <button type="button" class="btn btn-primary btn-block">Book</button>
</div>

</form>
<br>
<div>
	<?php
	include_once ('footer.php');
	?>
</div>
</body>
</html>