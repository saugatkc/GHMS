<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Package</title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="styl.css">
   <script src="bootstrap/js/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <div>
  <nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top">
    <a class="navbar-brand" href="#">
    <h1><i> Trisa Guest House</i></h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav menu">
        <li class="nav-item">
          <a class="nav-link active " href="adminroom.php"><p class=text><h3>Room</h3></p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpackage.php"><p class=text><h3>Package</h3></p></a>
        </li> 
      </ul>
      
    </div>
    
    <h6><i>Welcome Admin</i></h6>
    <br>
    <a href="index.php">
    <button class="btn "> Logout 
    </button> 
    </a>
  </nav>
  <br>
  </div>
  <br>
  <div class="container">
    <h1>admin control room</h1>
  </div>
  <div class="container">
  <div class="form-group">
  <h5><label for="pid">Package ID:</label></h5>
  <input type="text" class="form-control" id="pid">
</div>
<br>
<div class="form-group">
  <h5><label for="package">package</label></h5>
  <input type="text" class="form-control" id="package">
</div>
<br>
<div class="form-group">
  <h5><label for="price">Price</label></h5>
  <input type="text" class="form-control" id="price">
</div>
<br>

<button type="button" class="btn btn-primary btn-block">Add</button>
<button type="button" class="btn btn-primary btn-block">Update</button>
<br>


  <h5>Rooms</h5>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>package ID</th>
        <th>package</th>
        <th>Price(RS) </th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>103</td>
        <td>Lunch</td>
        <td>200</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
      <tr>
        <td>104</td>
        <td>Lunch and dinner</td>
        <td>500</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
      <tr>
        <td>105</td>
        <td>Breakfast, Lunch and dinner </td>
        <td>1000</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
    </tbody>
  </table>
  
</div>
  
</body>
</html>