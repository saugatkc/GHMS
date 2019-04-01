@extends('layouts.layout')
@section('title') search room @stop
@section('content')

<div class="container">
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
						<a href="{{url('/room/edit',$row->id)}}">Book</a>
					</td>	
				</tr>

				@endforeach	
                @endif
                </tbody>
            </table>
</div>
</div>
