@extends('layouts.layout')
@section('title') My stays  @stop
@section('content')
<br><br><br><br>
<div class="container">
	@if (is_null($items))
            <div class="form-group" style="text-align: center">
                <h1><label>No menu Items</label></h1>
            </div>
		@endif
        @if (!is_null($items))
        <div class="form-group" style="text-align: center">
                <h1><label>Menu Items</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Items</th>
					<th>Unit Cost</th>
					<th>Type</th>
					<th>Quantity</th>
					<th>Order</th>
				</tr>
				@foreach($items as $row)

				<tr>
					<td>{{$row->items}}</td>
					<td>{{$row->unitCost}}</td>
					<td>{{$row->itemType}}</td>
					<form method="post" action="{!! url('placeOrders') !!}">
					<td>
                            @csrf
                            <input type="number" value="1" min="1" name="quantity">	
                            <input type="hidden" name="id" value="{{$row->id}}">

					</td>
					<td><button type="submit"  onclick="if (!confirm('Are you sure to order?')) { return false }">order</button></td>
				</form>
				</tr>
				@endforeach	
            </table>
		</div>	
                @endif

	
</div>