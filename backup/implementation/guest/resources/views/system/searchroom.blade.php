@extends('layouts.layout')
@section('title') search room @stop
@section('content')
<div class="container">
  <div class="row">
            <div class="col-md-8">
                <form action="/avirooms" method="post" enctype="multipart/form-data">
@csrf

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
              		 <select class="form-control{{ $errors->has('roomType') ? ' is-invalid' : '' }}" value="{{ old('roomType') }}" name="roomType" required>
               		 <option class="mbr-text pl-5 mbr-fonts-style display-4" value=""> Select Room Type</option>
               		 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="singel">singel</option>
                	 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="coupel">coupel</option>
                	 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="family">family</option>
             		 </select>
          		 </div>
                 <br>

                  <button type="submit" class="btn btn-primary">Search</button>
                </form>
 </div>
</div>
</div>



                 

