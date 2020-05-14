@extends('layout.master')
@section('content')
    <a href="{{route('crud111.create')}}" class="btn btn-sm btn-primary">Add New</a>
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
        @foreach($crud111s as $crud111)
            <tr>
                <td>{{ $serial++ }}</td>
                <td>{{ $crud111->name }}</td>
                <td>{{ $crud111->email }}</td>
                <td>{{ $crud111->phone }}</td>
                <td>{{ $crud111->address }}</td>
                <td>{{ ucfirst($crud111->gender) }}</td>
                <td>{{ ucfirst($crud111->status) }}</td>
                <td>{{ ucfirst($crud111->user_type) }}</td>
                <td>{{ $crud111->created_by }}</td>
                <td>{{ $crud111->updated_by }}</td>
                <td>{{ $crud111->deleted_by }}</td>
                <td><img src="{{asset(isset($crud111->image)?$crud111->image:'images/users/no_image.png')}}" width="100%"></td>
                <td>
                    @if($crud111->deleted_at == null)
                        <a class="btn btn-sm btn-success" href="{{ route('crud111.edit',$crud111->id) }}">Edit</a>
                        <form  action="{{ route('crud111.destroy',$crud111->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-warning" onclick="return confirm('Are you confirm to delete this user')">Delete</button>
                        </form>
                    @else
                        <form  action="{{ route('crud111.restore',$crud111->id) }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-success" onclick="return confirm('Are you confirm to restore this user')">Restore</button>
                        </form>
                        <form  action="{{ route('crud111.delete',$crud111->id) }}" method="post">
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