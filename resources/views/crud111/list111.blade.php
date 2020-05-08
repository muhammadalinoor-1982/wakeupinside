@extends('layout.master')
@section('content')
    <a href="{{route('crud111.create')}}" class="btn btn-primary">Add New</a>
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
                <td>
                    <a class="btn btn-success" href="{{ route('crud111.edit',$crud111->id) }}">Edit</a>
                    <form method="post" action="{{ route('crud111.destroy',$crud111->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you confirm to delete this user')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection