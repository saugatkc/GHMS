@extends('layouts.layout')
@section('title') search room @stop
@section('content')
<br><br><br><br>
<div class="container">
    <font style="color:blue "><b>Notice: you should check in between 1PM to 10Pm and check Out between 05AM to 12PM and one night stay compulsory</b></font>
    <br><br>
  <div class="row">
            <div class="col-md-8">
                        @if($message=Session::get('success'))
                        <div class="alert alert-success">
                         <p>{{$message}}</p>
                         </div>
                         @endif
                <form action="/reservation" method="post" enctype="multipart/form-data">
@csrf

                <div class="form-group">
                    <h5><label for="Chkin">Check In date and time:</label></h5>
                    <input type="datetime-local" id="checkIn" name="checkIn" value="" class="form-control{{ $errors->has('checkIn') ? ' is-invalid' : '' }} datetimepicker" value="" placeholder="check In time" required>
                 </div>
                 <br>

                 <div class="form-group">
                    <h5><label for="Chkin">Check Out date and time:</label></h5>
                    <input type="datetime-local" id="checkOut" name="checkOut" class="form-control{{ $errors->has('checkOut') ? ' is-invalid' : '' }}" value="" placeholder="check Out time" required>
                 </div>
                 <br>	

           		 <div class="form-group">
              		 <select class="form-control{{ $errors->has('roomType') ? ' is-invalid' : '' }}" value="{{ old('roomType') }}" name="roomType" required>
               		 <option value=""> Select Room Type</option>
               		 <option  value="single">Single</option>
                	 <option  value="couple">Couple</option>
                	 <option  value="family">Family</option>
             		 </select>
          		 </div>
                 <br>

                  <button type="submit" class="btn btn-primary btn-block">Search</button>
                </form>
 </div>
</div>

        @if (!is_null($rooms))
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Room NO</th>
					<th>Room Type</th>
					<th>Room Price</th>
					<th>Room Image</th>
					<th>Description</th>
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
                    <td>check In: {{$checkIn}}<br>
                    check out: {{$checkOut}}</td>
                    

					<td>
                        <form method="post" action="{{url('/newBooking')}}">
                            @csrf
                            <input type="hidden" name="checkIn" value="{{$checkIn}}">
                            <input type="hidden" name="checkOut" value="{{$checkOut}}">
                            <input type="hidden" name="roomNo" value="{{$row->id}}">
                            <button type="submit"  onclick="if (!confirm('Are you sure to book this Room?')) { return false }">Book</button>
                        </form>
					</td>	
				</tr>
				@endforeach	
                @endif
                
            </table>
            </div>
</div>




            <script src="{{asset('js/app.js')}}"></script>
            <script type="text/javascript">
              $(document).ready(function(){

                  //  var time = moment().format('YYYY-MM-DDTHH:mm:ss');
                  // $('#checkIn').val(time);  
                });
                  $("#checkIn").change(function(){
                    var today = new Date();
                     var month = '' + (today.getMonth() + 1);
                    var  day = '' + today.getDate();
                    var  year = today.getFullYear();

                  if (month.length < 2) month = '0' + month;
                  if (day.length < 2) day = '0' + day;


                    var getDate = $("#checkIn").val();
                    var inputDate = new Date(getDate);
                    var month1 = '' + (inputDate.getMonth() + 1);
                    var  day1 = '' + inputDate.getDate();
                    var  year1 = inputDate.getFullYear();
                    var hour1 = inputDate.getHours();

                    if (month1.length < 2) month1 = '0' + month1;
                  if (day1.length < 2) day1 = '0' + day1;

                    var date1 = month1+'-'+day1+'-'+year1;

                    var date = month+'-'+day+'-'+year;

                    if(date1 < date)
                    {
                      alert('Please select valid date');
                      $('#checkIn').val(year+'-'+month+'-'+day);
                    }

                    else{
                        if(hour1>13 && hour1<22)
                        {
                            $('#checkIn').val();
                        }
                        else
                        {
                            alert('Please select time between 2PM to 10PM');
                            $('#checkIn').val(year+'-'+month+'-'+day);
                        }
                      
                    }
                });

                  $("#checkOut").change(function(){

                     var getDate = $("#checkIn").val();
                    var inputDate = new Date(getDate);
                    var month1 = '' + (inputDate.getMonth() + 1);
                    var  day1 = '' + inputDate.getDate();
                    var  year1 = inputDate.getFullYear();
               

                    if (month1.length < 2) month1 = '0' + month1;
                  if (day1.length < 2) day1 = '0' + day1;

                    var date1 = month1+'-'+day1+'-'+year1;

                    var getDate1 = $("#checkOut").val();
                    var inputDate1 = new Date(getDate1);
                    var month2 = '' + (inputDate1.getMonth() + 1);
                    var  day2 = '' + inputDate1.getDate();
                    var  year2 = inputDate1.getFullYear();
                    var hour2 = inputDate1.getHours();
                  

                    if (month2.length < 2) month2 = '0' + month2;
                  if (day2.length < 2) day2 = '0' + day2;

                    var date2 = month2+'-'+day2+'-'+year2;

                   
                    if(date2 <= date1)
                    {
                      alert('check out date is not valid');
                      $('#checkOut').val(year2+'-'+month2+'-'+day2);
                    }

                    else{
                        if(hour2>4 && hour2<12)
                        {
                            $('#checkOut').val();
                        }
                        else
                        {
                            alert('Please select time between 5AM to 12PM');
                            $('#checkOut').val(year2+'-'+month2+'-'+day2);
                        }
                    }
                });
              
              
            </script>
