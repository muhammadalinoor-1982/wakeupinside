@extends('layout2.master')
@section('content')
    <a href="{{route('crud222.create')}}" class="btn btn-sm btn-primary">Create New</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>SL#</th>
            <th>Name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>gender</th>
            <th>status</th>
            <th>User Type</th>
            <th>Create By</th>
            <th>Updated By</th>
            <th>Deleted By</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($crud222s as $crud222)
        <tr>
            <td>{{$serial++}}</td>
            <td>{{$crud222->name}}</td>
            <td>{{$crud222->email}}</td>
            <td>{{$crud222->phone}}</td>
            <td>{{$crud222->address}}</td>
            <td>{{ucfirst($crud222->gender)}}</td>
            <td>{{ucfirst($crud222->status)}}</td>
            <td>{{ucfirst($crud222->user_type)}}</td>
            <td>{{$crud222->created_by}}</td>
            <td>{{$crud222->updated_by}}</td>
            <td>{{$crud222->deleted_by}}</td>
            <td>
                @if($crud222->deleted_at == null)
                <a class="btn btn-sm btn-success" href="{{route('crud222.edit',$crud222->id)}}">Update</a>
                    <form action="{{route('crud222.destroy',$crud222->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-warning" onclick="return confirm(' Are You Sure to Delete it')">Delete</button>
                    </form>
                @else
                    <form action="{{route('crud222.restore',$crud222->id)}}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-primary" onclick="return confirm(' Are You Sure to restore it')">Restore</button>
                    </form>
                    <form action="{{route('crud222.delete',$crud222->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm(' Are You Sure to Permanently Delete it')">P_Delete</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
