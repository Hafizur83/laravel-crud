@extends('layouts.layout')
@section('content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Catagry Details
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th  width="20%">#</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                    <td>Catagory Name</td>
                    <td>{{ $data->cat_name }}</td>
                   </tr>
                   <tr>
                    <td></td>
                    <td><a href="{{url('/catagory')}}" class="btn btn-secondary">Back</a></td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection