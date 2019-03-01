@extends('partial.adminLayout')
@section('title') Rooms @stop
@section('content')

 <br>
  <div class="container">
    <h1>admin control room</h1>
  </div>
  <div class="container">
  <div class="form-group">
  <h5><label for="rno">Room No:</label></h5>
  <input type="text" class="form-control" id="rno">
</div>
<br>
<div class="form-group">
      <input type="file" class="form-control-file border" name="image">
    </div>
    <br>
    <div class="form-group">
      <h5><label for="sel1">Room type</label></h5>
      <select class="form-control" id="sel1" name="sellist1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
<div class="form-group">
  <h5><label for="price">Price</label></h5>
  <input type="text" class="form-control" id="price">
</div>
<br>
<div class="form-group">
  <h5><label for="Status">Status</label></h5>
  <input type="text" class="form-control" id="Status">
</div>
<br>
<button type="button" class="btn btn-primary btn-block">Add</button>
<button type="button" class="btn btn-primary btn-block">Update</button>
<br>


  <h5>Rooms</h5>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Room No</th>
        <th>Image</th>
        <th>Room type</th>
        <th>Price(RS) per night</th>
        <th>Status</th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>103</td>
        <td><imgsrc></td>
        <td>Singel</td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
      <tr>
        <td>104</td>
        <td><imgsrc></td>
        <td>Doubel</td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
      <tr>
        <td>105</td>
        <td><imgsrc></td>
        <td>Family</td>
        <td>1000</td>
        <td>Availabel</td>
        <td><button type="button" class="btn btn-secondary">Edit</button><button type="button" class="btn btn-primary btn-block">Delete</button></td>
      </tr>
    </tbody>
  </table>
  
</div>