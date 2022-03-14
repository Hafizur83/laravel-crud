@extends('layouts.layout')
@section('content')



<div class="container mt-3">
<form action="{{route('catagory.update',$data->id)}}" method='post'>
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="cat_id" class="col-form-label">Catagory Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cat_name" id="cat_id" value="{{ $data->cat_name }}">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <input type="submit" class="btn btn-primary" value='Update'>
      <a href="{{url('/catagory')}}" class="btn btn-secondary">Back</a>
    </div>
  </div>
</form>
</div>



@endsection