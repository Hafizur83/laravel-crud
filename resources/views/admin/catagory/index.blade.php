@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Laravel CRUD</h4>
                    <a class="btn btn-success" href="{{route('post.index')}}">Post </a>
                    <a class="btn btn-primary" href="{{route('catagory.create')}}">Add New</a>
                    
                </div>

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Catagory Name</th>
                        <th scope="col">Slug</th>
                        <th width="20%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key=>$row)

                        <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{$row->cat_name}}</td>
                        <td>{{$row->slug}}</td>
                        <td>
                            <a href="{{route('catagory.show',$row->id)}}" class='btn btn-sm btn-primary'><i class="fa fa-eye"></i></a> |
                            <a href="{{route('catagory.edit',$row->id)}}" class='btn btn-sm btn-secondary'><i class="fa fa-edit"></i></a> |
                            <form id="delete-form-{{ $row->id }}" class="d-inline" action="{{ route('catagory.destroy',$row->id) }}" method="post">@csrf @method('delete')
                                <button onclick="destroy({{ $row->id }})" class='btn btn-sm btn-danger' type="button"><i class="fa fa-trash"></i></button>
                            </form>
                            
                        </td>
                        </tr>
                        @endforeach
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