@extends('layouts.layout')
@section('title') Rooms  @stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<br /><br><br><br>
		<h3 align="center">Room Data</h3>
		<br />
		@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif

		<div align="right">
			<a href="/room" class="btn btn-primary">Add</a>
			<br />
			<br />

		
		<table class="table table-bordered">
				<tr>
					<th>Room NO</th>
					<th>Room Type</th>
					<th>Room Price</th>
					<th>Room Image</th>
					<th>Description</th>
					<th>status</th>
					<th>Edit</th>
					<th>Delete</th>
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
					<td>
						<a href="{{url('/room/edit',$row->id)}}">Edit</a>
					</td>
					<td>
						 <form action="{!! url('/rooms/delete',[$row->id]) !!}" method="POST">
                                @csrf
                                {!! method_field('DELETE') !!}
                                <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                            </form>

					</td>
					
					
				
					
							
				</tr>

				@endforeach	
		</table>
	</div>
</div>


</div>