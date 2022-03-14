@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Laravel CRUD</h4>
                    <a class="btn btn-success" href="{{route('catagory.index')}}">Catagory </a>
                    <a class="btn btn-primary" href="{{route('post.create')}}">Add New</a>
                </div>

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">SN</th>
                        <th width="30%" scope="col">Title</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date</th>
                        <th width="17%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $key=>$row)
                        <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{Str::limit($row->title,60)}}</td>
                        <td>{{$row->catagories->cat_name}}</td>
                        <td><img width="80px" src="{{ asset('image/'.$row->image) }}" alt="image"></td>
                        <td>@if ($row->status == 'Published')
                            <span class="badge bg-success">{{$row->status}}</span>
                        @else
                        <span class="badge bg-warning text-dark">{{$row->status}}</span>
                        @endif
                            
                        </td>
                        <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('post.show',$row->id)}}" class='btn btn-sm btn-primary'><i class="fa fa-eye"></i></a> |
                            <a href="{{route('post.edit',$row->id)}}" class='btn btn-sm btn-secondary'><i class="fa fa-edit"></i></a> |
                            <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{ route('post.destroy',$row->id) }}" method="post">@csrf @method('delete')
                                <button onclick="destroy({{ $row->id }})" class='btn btn-sm btn-danger' type="button"><i class="fa fa-trash"></i></button>
                            </form>
                            
                        </td>
                        </tr>
                        @empty
                        <h6>No data available</h6>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    function destroy(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();

                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } }) 

    }



</script>
@endsection