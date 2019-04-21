@extends('layouts.adminlayout')
@section('title') Add Item  @stop
@section('content')
<br><br><br><br>
 <div class="container">
        <h2> Add Items In Menu</h2>
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
                <form action="/itemForm" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="item">Items</label>
                        <input type="text" class="form-control" placeholder="Item" name="item">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="unitCost">Unit Cost</label>
                        <input type="number" min="1" class="form-control" placeholder="Unit Cost" name="unitCost">
                    </div>
                    <br>

               <div class="form-group">
                <label for="ItemType">Item Type</label>
                   <select class="form-control{{ $errors->has('ItemType') ? ' is-invalid' : '' }}" value="{{ old('ItemType') }}" name="ItemType" required>
                   <option value=""> Select Item Type</option>
                   <option  value="Food">Food</option>
                   <option  value="Drinks">Drinks</option>
                   <option  value="Other">Other</option>
                 </select>
               </div>
                 <br>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
