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
			@if (is_null($users))
            <div class="form-group" style="text-align: center">
                <h1><label>No user registred</label></h1>
            </div>
		@endif
        @if (!is_null($users))
        <div class="form-group" style="text-align: center">
                <h1><label>Users</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Id</th>
					<th>UserName</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				@foreach($users as $row)

				<tr>
					<td>{{$row->id}}</td>
					<td>{{$row->userName}}</td>
					<td>{{$row->name}}</td>
					<td>{{$row->email}}</td>
					<td>{{$row->phone}}</td>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif
</div>