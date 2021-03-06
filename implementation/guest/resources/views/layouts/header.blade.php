<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title') </title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="styl.css">
   <script src="bootstrap/js/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <style>
        body{
    background: url(images/background5.jpg);
    background-size: 100%;
}
    </style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-info navbar-light fixed-top navi">
            <div class="container">
                 <a class="navbar-brand" href="{!! url('home') !!}">
    <h1><i class="fas fa-home"></i><font face="Kristen ITC">Trisa Guest House</font></h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav menu">
        <li class="nav-item">
          <a class="nav-link active " href="{!! url('home') !!}"><p class=text><h5>Home</h5></p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{!! url('/aboutUs') !!}"><p class=text><h5>About us</h5></p></a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="{!! url('contactUs') !!}"><p class=text><h5>Contact</h5></p></a>
        </li>  
        <li class="nav-items">
          <a class="nav-link" href="{!! url('/reservation') !!}"><p class=text><h5>Reservation</h5></p></a>
        </li> 
        <li class="nav-items">
          <a class="nav-link" href="{!! url('/MyBookings') !!}"><p class=text><h5>My Stays</h5></p></a>
        </li>      
        <li class="nav-items">
          <a class="nav-link" href="{!! url('/menu') !!}"><p class=text><h5>Menu</h5></p></a>
        </li>     
      </ul>
    </div> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>&nbsp{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                       
                    </ul>
                      <i class="fas fa-info-circle"data-target="#modalHelp" data-toggle="modal" ></i>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <div class="modal fade" id="modalHelp">
  <div class="modal-dialog modal-dialog-center modal-lg">
    <div class="modal-content">
      <div class="modal-header">
         &nbsp &nbsp
        <h1 class="text-center text-danger" id="titleSignup"><i class="fas fa-home"></i><font face="Kristen ITC">Trisa Guest House</font></h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="scrollSignup"  style="height: 700px;">
        <embed src="userManual.pdf" type="application/pdf" width="100%" height="99%"/>
        
    </div>
    </div>
  </div>
</div>
</body>
</html>
