@extends('layouts.layout')
@section('title') My stays  @stop
@section('content')
<br><br><br><br>
<div class="container">
		@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif


		@if (is_null($OldBooking))
            <div class="form-group" style="text-align: center">
                <h1><label>You Haven't Stayed yet</label></h1>
            </div>
		@endif
        @if (!is_null($OldBooking))
        <div class="form-group" style="text-align: center">
                <h1><label>Your Stays</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>Bill</th>
				</tr>
				@foreach($OldBooking as $row)

				<tr>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>	
					<td><form method="post" action="{!! url('viewbill') !!}">
                            @csrf
                            <input type="hidden" name="bookingId" value="{{$row->id}}">
						<button type="submit">View bill</button>
					</form>
					</td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif

		@if (is_null($booking))
            <div class="form-group" style="text-align: center">
                <h1><label>You don't have any new bookings</label></h1>
            </div>
		@endif
        @if (!is_null($booking))
        <div class="form-group" style="text-align: center">
                <h1><label>Currently Booked</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>Cancel</th>
				</tr>
				@foreach($booking as $row)

				<tr>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>	
					<td><form method="post" action="{!! url('/booking/delete',[$row->id]) !!}">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="if (!confirm('Are you sure to cancel this Booking?')) { return false }">Cancel</button>
                        </form></td>
				</tr>
				@endforeach	
            </table>
		</div>
                @endif

		@if (is_null($staying))
            <div class="form-group" style="text-align: center">
                <h1><label>You aren't checked in yet</label></h1>
            </div>
		@endif
        @if (!is_null($staying))
        <div class="form-group" style="text-align: center">
                <h1><label>staying</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>expences</th>
				</tr>
				@foreach($staying as $row)

				<tr>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>	
					<td>
						<a href="/myorders"><button >expences</button></a>
					</td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif


          <a href="/reservation"><button type="button" class="btn btn-primary btn-block">Search Available Rooms</button></a>
</div>