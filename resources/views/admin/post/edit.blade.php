@extends('layouts.layout')
@section('content')

<div class="container">

  <div class="card card-primary">
  <div class="card-header">
      <h3 class="card-title">Add Post</h3>
  </div>
  <div class="card-body">

  <form action="{{route('post.update',$data->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
      <div class="form-group">
          <label for="name">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $data->title }}">
          @error('title') <div class="text-danger">{{ $message }}</div> @enderror
          
      </div>
      <div class="form-group">
          <label for="body">Description</label>
          <textarea name="body" id="summernote" cols="30" rows="10" class="form-control">{{ $data->title }}</textarea>
          @error('body') <div class="text-danger">{{ $message }}</div> @enderror
      </div>
      <div class="form-group">
          <label for="image">Image</label>
          <input type="hidden" name="oldimg" value="{{ $data->image }}">
          <img width="250px" src="{{ asset('image/'.$data->image) }}" alt="">
          <label class="btn btn-primary"> Add File
              <input type="file" name="image" class="form-control @error('image') is-invalid @enderror d-none">
          </label>
          @error('image')<div class="text-danger">{{ $message }}</div> @enderror
      </div>
      <div class="form-group">
        <label for="catagory">Catagory</label>
            <select name="cat_id" id="catagory" class="form-control @error('cat_id') is-invalid @enderror">
                <option selected disabled>Select Catagory</option>
            @foreach($catagories as $catagory)
                <option value="{{$catagory->id}}" {{ $catagory->id==$data->cat_id ? 'selected' : '' }}> {{ $catagory->cat_name }}</option>
            @endforeach
            </select>
            @error('cat_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
      <div class="form-group">
      <label for="status">Status</label>
          <select name="status" id="status" class="form-control">
              <option value="Published">Published</option>
              <option value="Drafts">Drafts</option>
          </select>
      </div>
      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Update">
          <a href="{{url('/post')}}" class="btn btn-secondary">Back</a>
      </div>
  </form>
  </div>

  </div>




</div>



@endsection