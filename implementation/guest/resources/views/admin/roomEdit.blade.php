@extends('layouts.layout')
@section('title') edit room  @stop
@section('content')
<br><br><br><br>
 <div class="container">
        <h2> Room control</h2>
        @if(session()->has('success'))
            <div class="alert-success">
                <h1> {!! session()->get('success') !!}</h1>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li> {{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <form action="{!! url('room',$room->id) !!}" method="post" enctype="multipart/form-data">

                    @csrf
                    {!! method_field('put') !!}
           		 <div class="form-group">
              		 <select class="form-control{{ $errors->has('roomType') ? ' is-invalid' : '' }}" value="{{ old('roomType') }}" name="roomType" required>
               		 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="{!! $room->roomType !!}"> {!! $room->roomType !!}</option>
               		 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="singel">singel</option>
                	 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="coupel">coupel</option>
                	 <option class="mbr-text pl-5 mbr-fonts-style display-4" value="family">family</option>
             		 </select>
          		 </div>
                 <br>

                 <div class="form-group">
              		<input type="number" min="500" id="price" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{!! $room->price !!}" placeholder="price" required>
         	     </div>
           		 <br>

                  <div class="form-group">
              		<input type="file" accept=".png, .jpg, .jpeg"  id="uploadImage" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" onchange="PreviewImage();">
              		@if($room->image)
              		old image<br><img src="{!! asset($room->image) !!}" class="img-fluid img-thumbnail"
                                 style="width: 150px; height: 150px">
              		@endif
              		<br>
           				new image<br> <img id="uploadPreview" style="width: 150px; height: 150px;" />
           				 <script type="text/javascript">

             			   function PreviewImage() {
                 		   var oFReader = new FileReader();
                  		  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                  		  oFReader.onload = function (oFREvent) {
                     	   document.getElementById("uploadPreview").src = oFREvent.target.result;
                   			 };
               				 };

          				  </script>
          				 
           		 </div>
          		  <br>


                    <div class="form-group">
                        <label for="email">Description</label>
                        <textarea class="form-control"  placeholder="Enter description" name="description" rows="3">{!! $room->description !!}
                </textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">Status</label>
                        <input type="text" class="form-control" value="{!! $room->status !!}" placeholder="status" name="status">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

  <!--   <script>
      var msg = '{{Session::get('roomAdded')}}';
      var exist = '{{Session::has('roomAdded')}}';
      if(exist)
      {
        alert(msg);
      }
    </script> -->
