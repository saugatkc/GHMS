@extends('layouts.adminlayout')
@section('title') curently staying  @stop
@section('content')
<br><br><br><br>
<div class="container">
				@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif
		
			@if (is_null($booking))
            <div class="form-group" style="text-align: center">
                <h1><label>No Bookings</label></h1>
            </div>
		@endif
        @if (!is_null($booking))
        <div class="form-group" style="text-align: center">
                <h1><label>Bookings</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>UserName</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>Check In</th>
					<th>Cancel</th>
				</tr>
				@foreach($booking as $row)

				<tr>
					<td>{{$row->userName}}</td>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>
					<td><form method="post" action="{!! url('/booking/checkIn',[$row->id]) !!}">
                            @csrf
                            <button type="submit" onclick="if (!confirm('Are you sure to checkIn this guest?')) { return false }">Check In</button>
                        </form></td>
					<td><form method="post" action="{!! url('/booking/adminDelete',[$row->id]) !!}">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="if (!confirm('Are you sure to cancel this Booking?')) { return false }">Cancel</button>
                        </form></td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif
</div>