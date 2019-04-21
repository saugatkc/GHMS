@extends('layouts.layout')
@section('title') Home  @stop
@section('content')
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
    <P>Welcome to the ancient city of kirtipur. Enjoy the unforgetable historical vaues of Newari cultural, tradations and religion at our guest houst with a breathing view of the himalayas and overlooking the kathmandu valley. Welcome to the atient city of kirtipur.</P><img class="about" src="images/kirtipur.jpg">
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
</div>
