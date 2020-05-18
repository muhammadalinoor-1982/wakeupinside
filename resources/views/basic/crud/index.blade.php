@extends('basic.layout_crud.master')
@section('content')
    <a href="{{route('crud.create')}}" class="btn btn-sm btn-primary">Add New</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SL#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Status</th>
            <th>User Type</th>
            <th>Created By</th>
            <th>Updated By</th>
            <th>Deleted By</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cruds as $crud)
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $crud->name }}</td>
                <td>{{ $crud->email }}</td>
                <td>{{ $crud->phone }}</td>
                <td>{{ $crud->address }}</td>
                <td>{{ ucfirst($crud->gender) }}</td>
                <td>{{ ucfirst($crud->status) }}</td>
                <td>{{ ucfirst($crud->user_type) }}</td>
                <td>{{ $crud->created_by }}</td>
                <td>{{ $crud->updated_by }}</td>
                <td>{{ $crud->deleted_by }}</td>
                <td><img src="{{asset(isset($crud->image)?$crud->image:'images/crud/no_image.png')}}" width="100%"></td>
                <td>
                    @if($crud->deleted_at == null)
                        <a class="btn btn-sm btn-success" href="{{ route('crud.edit',$crud->id) }}">Edit</a>
                        <form  action="{{ route('crud.destroy',$crud->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-warning" onclick="return confirm('Are you confirm to delete this user')">Delete</button>
                        </form>
                    @else
                        <form  action="{{ route('crud.restore',$crud->id) }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-success" onclick="return confirm('Are you confirm to restore this user')">Restore</button>
                        </form>
                        <form  action="{{ route('crud.delete',$crud->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you confirm to permanently delete this user')">P_Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection