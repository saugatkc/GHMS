@extends('layouts.layout')
@section('title') contact us  @stop
@section('content')
<br><br><br><br>
<div class="container">
	<h1><i class="fas fa-home"></i><font face="Kristen ITC" size="10"><b>Trisa Guest House</b></font></h1>
	<br>
		@if($message=Session::get('success'))
		<div class="alert alert-success">
		<p>{{$message}}</p>
		</div>
		@endif
	<br>
			<div class="row">
			<div class="row col-md-4">
			<font face="Kristen ITC" size="4px">
			<p><b>Address:</b>&nbsp;Kirtipur,kathmandu,Nepal<br><br>
			<b>Mobile:</b>&nbsp;+9779851070381<br><br>
			<b>Phone:</b>&nbsp;014335159<br><br>
			<b>Email:</b>&nbsp;Trisaguesthouse@gmail.com</p>
			</font>
			</div>
			
			<div class="col-md-6 ">
                <form action="/message" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" placeholder="Enter Message" name="message" rows="3">
                </textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
			</div>
			</div>

      <div class="mapouter mt-5"><h4 class="text-white font-weight-bold">Our location</h4><div class="gmap_canvas"><iframe width="1080" height="239" id="gmap_canvas" src="https://maps.google.com/maps?q=kritipur%2C%20homestay%20nepal&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Copyright: <a href="https://www.jetzt-drucken-lassen.de">Trisa Guest House</a></div><style>.mapouter{position:relative;text-align:right;height:239px;width:1080px;}.gmap_canvas {overflow:hidden;background:none!important;height:239px;width:1080px;}</style></div>

		</div>
