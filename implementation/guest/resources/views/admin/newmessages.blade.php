@extends('layouts.adminlayout')
@section('title') New Messages  @stop
@section('content')
<br><br><br><br>
<div class="container">
				@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif
			@if (is_null($messages))
            <div class="form-group" style="text-align: center">
                <h1><label>No New Messages</label></h1>
            </div>
		@endif
        @if (!is_null($messages))
        <div class="form-group" style="text-align: center">
                <h1><label>New Messages</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Sender Name</th>
					<th>Email</th>
					<th>Message</th>
					<th>Mark Read</th>
					<th>Delete</th>
				</tr>
				@foreach($messages as $row)

				<tr>
					<td>{{$row->senderName}}</td>
					<td>{{$row->email}}</td>
					<td>{{$row->message}}</td>
					<td><form method="post" action="{!! url('/markRead',[$row->id]) !!}">
                            @csrf
                            <button type="submit" onclick="if (!confirm('Are you sure to checkIn this guest?')) { return false }">Mark Read</button>
                        </form></td>
					<td><form method="post" action="{!! url('/messages/delete',[$row->id]) !!}">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="if (!confirm('Are you sure to cancel this Booking?')) { return false }">Delete</button>
                        </form></td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif		
</div>