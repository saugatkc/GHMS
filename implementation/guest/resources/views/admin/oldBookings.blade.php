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
                <h1><label> No Old stays</label></h1>
            </div>
		@endif
        @if (!is_null($booking))
        <div class="form-group" style="text-align: center">
                <h1><label>Old stays</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>UserName</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room No</th>
					<th>Status</th>
					<th>Bill</th>
				</tr>
				@foreach($booking as $row)

				<tr>
					<td>{{$row->userName}}</td>
					<td>{{$row->time_from}}</td>
					<td>{{$row->time_to}}</td>
					<td>{{$row->roomId}}</td>
					<td>{{$row->Status}}</td>
                    <td><form method="post" action="{!! url('viewbillAdmin') !!}">
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
</div>