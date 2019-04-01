@extends('layouts.layout')
@section('title') reservation  @stop
@section('content')

<div>
        <img class="mySlides" src="images/reservation.jpg"/>
        
    </div>
    <br>


@if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li> {{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
 @endif

<div class="container">
  <div class="row">
            <div class="col-md-8">
                <form action="/newBooking" method="post" enctype="multipart/form-data">


@csrf
                <div class="form-group">
                    <h5><label for="userId">User Name:</label></h5>
                    <input type="text" id="userId" name="userId" class="form-control{{ $errors->has('userId') ? ' is-invalid' : '' }}" value="" placeholder="{{ Auth::user()->name }}">
                 </div>
                 <br>

                <div class="form-group">
                    <h5><label for="Chkin">Check In time:</label></h5>
                    <input type="datetime-local" id="checkIn" name="checkIn" class="form-control{{ $errors->has('checkIn') ? ' is-invalid' : '' }} datetimepicker" value="" placeholder="check In time" required>
                 </div>
                 <br>

                 <div class="form-group">
                    <h5><label for="Chkin">Check Out time:</label></h5>
                    <input type="datetime-local" id="checkOut" name="checkOut" class="form-control{{ $errors->has('checkOut') ? ' is-invalid' : '' }}" value="" placeholder="check Out time" required>
                 </div>
                 <br>
                 <div class="form-group">
                    <h5><label for="roomNo">Room No:</label></h5>
                    <input type="text" id="roomNo" name="roomNo" class="form-control{{ $errors->has('roomNo') ? ' is-invalid' : '' }}" value="" placeholder="Room No" required>
                 </div>
                 <br>

              

 
  <button type="submit" class="btn btn-primary">Book</button>
  <button class="btn btn-primary">Cancel Booking</button>

                </form>
 
</div>
</div>
</div>


  <script>
      var msg = '{{Session::get('success')}}';
      var exist = '{{Session::has('success')}}';
      if(exist)
      {
        alert(msg);
      }
    </script>
