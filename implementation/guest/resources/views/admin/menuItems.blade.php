@extends('layouts.adminlayout')
@section('title') Menu  @stop
@section('content')
<div class="container">
<div class="row">
	<div class="col-md-12">
		<br /><br><br><br>
		@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif

		<div align="right">
			<a href="/itemForm" class="btn btn-primary">Add</a>
			<br />
			<br />

		
		@if (is_null($items))
            <div class="form-group" style="text-align: center">
                <h1><label>No items in the menu</label></h1>
            </div>
		@endif
        @if (!is_null($items))
        <div class="form-group" style="text-align: center">
                <h1><label>Menu Items</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
				<tr>
					<th>Item no</th>
					<th>Items</th>
					<th>Unit cost</th>
					<th>Item Type</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach($items as $row)

				<tr>
					<td>{{$row->id}}</td>
					<td>{{$row->items}}</td>
					<td><form method="post" action="{!! url('/menu/edit',[$row->id]) !!}">
                            @csrf
                         <input type="number" name="price" value="{{$row->unitCost}}">
						</td>
					<td>{{$row->itemType}}</td>
					<td>
					<button type="submit" onclick="if (!confirm('Are you sure to update this item?')) { return false }">Update</button>
                        </form>
					</td>
					<td><form method="post" action="{!! url('/menu/delete',[$row->id]) !!}">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" onclick="if (!confirm('Are you sure to remove this item?')) { return false }">Remove</button>
                        </form></td>
				</tr>

				@endforeach	
		</table>
	</div>
	 @endif
</div>

</div>
</div>