@extends('layouts.layout')
@section('title') orders  @stop
@section('content')
<br><br><br><br>
<div class="container">
		@if($message=Session::get('success'))
		<div class="alert alert-success">
				<p>{{$message}}</p>
		</div>
		@endif

		@if (is_null($orders))
            <div class="form-group" style="text-align: center">
                <h1><label>You Haven't ordered yet</label></h1>
            </div>
		@endif
        @if (!is_null($orders))
        <div class="form-group" style="text-align: center">
                <h1><label>Your orders</label></h1>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Amount</th>
				</tr>
				@foreach($orders as $row)
				<tr>
					<td>{{$row->items}}</td>
					<td>{{$row->quantity}}</td>
					<td>{{$row->unitCost}}</td>
					<td>{{$row->amount}}</td>	
				</tr>
				@endforeach	
				<tr>
					<td colspan="3"><b>Total Amount</b> </td>
					<td>{{$total}}</td>
				</tr>
            </table>
		</div>	
                @endif
</div>