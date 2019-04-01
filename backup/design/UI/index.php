<?php
if(isset($_POST['btnLogin']))
{
  $uname=$_POST['username'];
  $pass=$_POST['password'];

      if($uname=="admin")
      {
        header('location:adminroom.php');
      }
      else
      {
        header('location:home.php');
      }
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  	<head>
   	 	<meta charset="utf-8">
    	<title>index</title>
    	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	    <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="styl.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
  	</head>
<body>
	<div >
	 <div id="navi">
	<nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top">
    <a class="navbar-brand" href="#">
    <h1><i> Trisa Guest House</i></h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav menu">
        <li class="nav-item">
          <a class="nav-link active " href=#><p class=text><h5>Home</h5></p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=#><p class=text><h5>About us</h5></p></a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href=#><p class=text><h5>Contact</h5></p></a>
        </li>  
        <li class="nav-items">
          <a class="nav-link" href=#><p class=text><h5>Reservation</h5></p></a>
        </li> 
          
      </ul>
    </div> 

    <button class="btn btn-success"  id="btnLogin" data-target="#modalLogin" data-toggle="modal"> Login
    </button>
    
  </nav>
	</div>
	<div>
    <img class="mySlides" src="images/1.jpg">
    <img class="mySlides" src="images/2.jpg">
    <img class="mySlides" src="images/3.jpg">
    <img class="mySlides" src="images/4.jpg">
    <img class="mySlides" src="images/5.jpg">

    <script type="text/javascript">
      var slideIndex = 0;
      carousel();

      function carousel() {
         var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > x.length) {slideIndex = 1} 
        x[slideIndex-1].style.display = "block"; 
        setTimeout(carousel, 2000); // Change image every 5 seconds
      }
    </script>
  </div>
  <div width=20%>
    <P><U><h1> WELCOME TO TRISA GUEST HOUSE</h1></U><b></b></P>
    <P>Welcome to the ancient city of kirtipur. Enjoy the unforgetable historical vaues of Newari cultural, tradations and religion at our guest houst with a breathing view of the himalayas and overlooking the kathmandu valley. Welcome to the atient city of kirtipur.</P>
    <img class="about" src="images/kirtipur.jpg">
    <p>
      <h3>Our facilities </h3>
    </p>
    <p>
      <ul>
                            
                         <li>
                           <p>Room service</p>  
                          </li>    
                          <li>
                            <p>Free Wifi</p>
                          </li>    
                          <li>
                            <p>24 hrs front desk</p>
                          </li>
                          <li>
                            <p>24 hrs security</p>
                          </li>
                          <li>
                            <p>Resturant</p>
                          </li>
                          <li>
                            <p>Newspaper</p>
                          </li>
                     </ul>
    </p>

  </div>
	<footer class="page-footer pt-4">
    <div class="container">
       <div class="row">
       
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="address">
                         <span>Address</span>    
                         <li>
                           <p>PastimeSports@gmail.com</p>  
                          </li>    
                          <li>
                            <p>+9779849037243</p>
                          </li>    
                          <li>
                            <p>Kirtipur, Kathmandu</p>
                          </li>
                     </ul>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="goto">
                         <span>Goto</span>    
                         <li>
                            <a href="#">Home</a>
                          </li>
                               
                          <li>
                             <a href="#">Sport</a>
                          </li>
                               
                          <li>
                            <a href="#">About</a>
                          </li>  
                          <li>
                             <a href="#">Forum </a>
                          </li>     
                          <li>
                            <a href="#">Donation</a>
                         </li>
                         <li>
                            <a href="#">Event</a>
                         </li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="goto">
                        <a data-target="#modalNews" data-toggle="modal"><h3 id="news">Newsletter<br></h3></a>
                    </ul>
                </div>
           
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <ul class="social">
                       <span>Social</span>    
                            <li>
                             <a href="https://facebook.com"><i class="fab fa-facebook mr-4 fa-2x"></i></a>
                            </li>
                              
                            <li>
                              <a href="https://github.com"><i class="fab fa-github mr-4 fa-2x"></i></a>
                            </li>
                                
                            <li>
                              <a href="https://linkedin.com"><i class="fab fa-linkedin mr-4 fa-2x"></i></a>
                            </li>
                               
                            <li>
                              <a href="https://twitter.com"><i class="fab fa-tumblr mr-4 fa-2x"></i></a>
                            </li>
                    </ul>
                </div>
        </div> 
      <div class="footer-copyright text-muted text-center py-2">
        <p id="ftr">
        © 2018 Copyright:<a href="Index.php"> PastimeSports.com</a>
      </p>
      </div>
    </div>
 </footer>
    </div>
  </div>
</div>







<div class="modal fade " id="modalLogin">
  <div class="modal-dialog modal-dialog-center modal-sm">
    <div class="modal-content ">
     <div class="modal-header">
      <h3 class="text-info " id="titleLogin"> LOGIN </h3>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
        <div class="modal-body">
          <form method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-alt"></i> </span>
              </div>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i> </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

        <button class="btn btn-primary btn-sm" name="btnLogin" type="submit">LOGIN</button>
        <a class="text-center text-primary mt-2" id="linkSignup" data-target="#modalSignup" data-toggle="modal">Create a new account</a>
        </form>
        <br>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $("#linkSignup").click(function(){
        $("#modalLogin").modal("hide");
        $("#modalSignup").modal("show");
    });

     $("#linkLogin").click(function(){
      $("#modalSignup").modal("hide");
      $("#modalLogin").modal("show");
    });
  });
</script>

<div class="modal fade" id="modalSignup">
  <div class="modal-dialog modal-dialog-center modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="text-center text-danger" id="titleSignup"> SignUp </h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="scrollSignup">
          <form method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
              </div>
              <input type="text" id="inputFullname" name="fullname" class="form-control" placeholder="Full Name" required>
            </div>
            <br>
            <div class="form-group row">
              <label class="col-sm-2 font-weight-bold text-secondary">Gender: </label>
              <div class="col-sm-10">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="optMale" value="Male">
                      <label class="form-check-label" for="optMale">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="optFemale" value="Female">
                      <label class="form-check-label" for="optFemale">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="optOthers" value="Others">
                      <label class="form-check-label" for="optOthers">Others</label>
                  </div>
              </div>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i> </span>
              </div>
              <input type="text" id="inputAddress" name="postalAddress" class="form-control" placeholder="Postal Address" required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i> </span>
              </div>
              <input type="text" id="inputPostalCode" name="postalCode" class="form-control" placeholder="Postal Code" required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i> </span>
              </div>
              <input type="date" id="inputDob" name="dob" class="form-control"  required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-envelope"></i></span>
              </div>
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-alt"></i> </span>
              </div>
              <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i> </span>
              </div>
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i> </span>
              </div>
              <input type="password" id="inputRetype" name="retype" class="form-control" placeholder="Re-type Password" required>
            </div>
            <br>
            <button class="btn btn-primary btn-lg mx-3" name="btnSignup" type="submit">Sign Up</button>
            <a class="text-center text-primary mt-2" id="linkLogin" data-target="#modalLogin" data-toggle="modal">I already have an account</a>
          </form>
        </div>
    </div>
  </div>
</div>

</body>
</html>