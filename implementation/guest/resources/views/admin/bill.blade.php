@extends('layouts.adminlayout')
@section('title') orders  @stop
@section('content')
<br><br><br><br>
<div class="container" style="border: 2px solid black;">
	<div class="container" id="printableArea">
	<h2><i class="fas fa-home"></i><font face="Kristen ITC">Trisa Guest House</font><br></h2><hr>
	<div class="row">
		<div class="col-lg-7 col-md-3 col-sm-6 col-xs-12">
           <i class="fas fa-envelope"></i>&nbsp;Trisaguesthouse@gmail.com  <br>
           <i class="fas fa-phone"></i>&nbsp;+9779849037243<br>
           <i class="fas fa-map-marker-alt"></i>&nbsp;PangaDobato, Kirtipur, Kathmandu, Nepal<br>			
		</div>
		<div class="col-lg-5 col-md-3 col-sm-6 col-xs-12">
			<b>DateTime</b>:{{$date}}<br>
			<b>Invoice:</b>{{$invoice}}<br>
			@foreach($booking as $book)
			<b>Name:</b>&nbsp;{{$book->name}}<br>
			<b>Check In:</b>&nbsp;{{$book->time_from}}<br>
			<b>Check Out:</b>&nbsp;{{$book->time_from}}<br>
			<b>Room:</b>&nbsp;{{$book->roomNo}}-{{$book->price}}<br>
			@endforeach
		</div>
	</div>
	@if (!is_null($orders))
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

	<div class="text-right col-md-12">
		<b>Room Total:&nbsp;{{$roomprice}}</b><br>
		<b>Final amount:&nbsp;{{$grandTotal}}</b>
	</div>
	<h3><p class="text-center">--Thanks for visit--</p></h3>
</div>
<form>
    <input type="button" value="Print" onClick="printReport()">
</form>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    function printReport()
    {
        var prtContent = document.getElementById("printableArea");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>