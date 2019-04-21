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
                <h1><label>No Guest</label></h1>
            </div>
		@endif
        @if (!is_null($booking))
        <div class="form-group" style="text-align: center">
                <h1><label>Currently Staying Guests</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>UserName</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>Expences</th>
					<th>Generate bill</th>
				</tr>
				@foreach($booking as $row)

				<tr>
					<td>{{$row->userName}}</td>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>
					<td><form method="post" action="{!! url('orders') !!}">
                            @csrf
                            <input type="hidden" name="bookingId" value="{{$row->id}}">
						<button type="submit">Expences</button>
					</form>
					</td>
					<td><form method="post" action="{!! url('bill') !!}">
                            @csrf
                            <input type="number" name="noOfNights" value="" placeholder="No Of Nights" required="true"><br>
                            <input type="hidden" name="bookingId" value="{{$row->id}}">
						<button type="submit">Generate bill</button>
					</form>
					</td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif
</div>