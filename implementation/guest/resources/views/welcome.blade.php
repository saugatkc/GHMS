<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>index</title>
        <link href="{!! url('bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{!! url('bootstrap/fontawesome/css/all.min.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! url('styl.css') !!}">
        <script src="{!! url('bootstrap/js/jquery.min.js') !!}"></script>
        <script src="{!! url('bootstrap/js/bootstrap.min.js') !!}"></script>
    </head>
    <style>
        body{
    background: url(images/background5.jpg);
    background-size: 100%;
}
    </style>
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
          <a class="nav-link active " href="{!! url('home') !!}"><p class=text><h5>Home</h5></p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{!! url('aboutUs') !!}"><p class=text><h5>About us</h5></p></a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="{!! url('contactUs') !!}"><p class=text><h5>Contact</h5></p></a>
        </li>  
        <li class="nav-items">
          <a class="nav-link" href="{!! url('reservation') !!}"><p class=text><h5>Reservation</h5></p></a>
        </li> 
          
      </ul>
    </div> 
    <a href="{!! url('login') !!}">
    <button class="btn btn-success" > Login
    </button>
    </a>
    
  </nav>
    </div>
    <br><br><br>
    <div class="container">
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
    <b><P>Welcome to the ancient city of kirtipur. Enjoy the unforgetable historical vaues of Newari cultural, tradations and religion at our guest houst with a breathing view of the himalayas and overlooking the kathmandu valley. Welcome to the atient city of kirtipur.</P></b>
    <img class="about" src="images/kirtipur.jpg">
    <p>
      <h3>Our facilities </h3>
    </p>
    <p>
      <b>
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
    </b>

  </div>
</div>
<footer class="page-footer pt-4">
    <div class="container">
       <div class="row">
       
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="address">
                         <li>
                           <h2>Contact Us</h2>  
                          </li>                            
                         <li>
                           <p><i class="fas fa-envelope"></i>Trisaguesthouse@gmail.com</p>  
                          </li>    
                          <li>
                            <p><i class="fas fa-phone"></i>+9779849037243</p>
                          </li>    
                          <li>
                            <p><i class="fas fa-map-marker-alt"></i>PangaDobato, Kirtipur, Kathmandu, Nepal</p>
                          </li>
                     </ul>
                </div>         
           
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <ul class="social">
                            <li>
                             <h2>Social</h2>
                            </li>                          
                            <li>
                             <a href="https://facebook.com"><i class="fab fa-facebook mr-4 fa-2x"></i>Facebook</a>
                            </li>
                              
                            <li>
                              <a href="https://Instagram.com"><i class="fab fa-instagram mr-4 fa-2x"></i></i>Instagram</a>
                            </li>
                                
                            <li>
                              <a href="https://linkedin.com"><i class="fab fa-linkedin mr-4 fa-2x"></i>Linkedin</a>
                            </li>
                               
                            <li>
                              <a href="https://twitter.com"><i class="fab fa-tumblr mr-4 fa-2x"></i>Twitter</a>
                            </li>
                    </ul>
                </div>
        </div> 
      <div class="footer-copyright text-muted text-center py-2">
        <p id="ftr">
        © 2019 All rights reserved
      </p>
      </div>
    </div>
 </footer>
    </div>
  </div>
</div>


</body>
</html>