@extends('layouts.layout')
@section('content')



<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      <h4>Add New Catagory</h4>
    </div>
    <div class="card-body">
      <form action="{{route('catagory.store')}}" method='post'>
        @csrf
      <div class="form-group">
        <label for="cat_id">Catagory Name</label>
        <input type="text" class="form-control" name="cat_name" id="cat_id" placeholder="Name">
      </div>
    
      <div class="form-group">
        <div class="col-sm-10">
          <input type="submit" class="btn btn-primary" value='Add New'>
          <a href="{{url('/catagory')}}" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>



@endsection