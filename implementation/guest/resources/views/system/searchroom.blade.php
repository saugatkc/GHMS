@extends('layouts.layout')
@section('title') search room @stop
@section('content')
<br><br><br><br>
<div class="container">
  <div class="row">
            <div class="col-md-8">
                <form action="/reservation" method="post" enctype="multipart/form-data">
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

@if (isset($rooms) && is_null($rooms))
            <div class="form-group" style="text-align: center">
                <label>no rooms found</label>
            </div>
        @endif
        @if (!is_null($rooms))
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Room NO</th>
					<th>Room Type</th>
					<th>Room Price</th>
					<th>Room Image</th>
					<th>Description</th>
					<th>Status</th>
                    <th>Your Time</th>
					<th>Book</th>
				</tr>
				@foreach($rooms as $row)

				<tr>
					<td>{{$row->id}}</td>
					<td>{{$row->roomType}}</td>
					<td>{{$row->price}}</td>
					<td>
							<img src="{{$row->image}}"  class="img-fluid image-thumbnail"  style="height:150px; width:200px">
					</td>
					<td>{{$row->description}}</td>
					<td>{{$row->status}}</td>
                    <td>check In: {{$checkIn}}<br>
                    check out: {{$checkOut}}</td>
                    

					<td>
                        <form method="post" action="{{url('/newBooking')}}">
                            @csrf
                            <input type="hidden" name="checkIn" value="{{$checkIn}}">
                            <input type="hidden" name="checkOut" value="{{$checkOut}}">
                            <input type="hidden" name="roomNo" value="{{$row->id}}">
                            <button type="submit" onclick="if (!confirm('Are you sure to book this Room?')) { return false }">Book</button>
                        </form>
					</td>	
				</tr>

				@endforeach	
                @endif
                </tbody>
            </table>
</div>
</div>



                 

