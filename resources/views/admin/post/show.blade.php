@extends('layouts.layout')
@section('content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th width="20%">#</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                    <td>Title</td>
                    <td>{{ $data->title }}</td>
                   </tr>
                   <tr>
                    <td>Description</td>
                    <td>{{ $data->body }}</td>
                   </tr>
                   <tr>
                    <td>Catgory</td>
                    <td>{{ $data->catagories->cat_name }}</td>
                   </tr>
                   <tr>
                    <td>author</td>
                    <td>{{ $data->author }}</td>
                   </tr>
                   <tr>
                    <td>Image</td>
                    <td><img height="300px" src="{{ asset('image/'.$data->image) }}" alt=""></td>
                   </tr>
                   <tr>
                    <td>Status</td>
                    <td ><div class="badge bg-success">{{ $data->status }}</div></td>
                   </tr>
                   <tr>
                    <td></td>
                    <td><a href="{{url('/post')}}" class="btn btn-secondary">Back</a></td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection