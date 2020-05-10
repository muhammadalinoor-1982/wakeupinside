@extends('layout2.master')
@section('content')
    <a href="{{route('crud222.create')}}" class="btn btn-primary">Create New</a>
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
            <td>{{ucfirst($crud222->gender)}}</td>
            <td>{{ucfirst($crud222->status)}}</td>
            <td>
                <a class="btn btn-success" href="{{route('crud222.edit',$crud222->id)}}">Update</a>
                <form action="{{route('crud222.destroy',$crud222->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" onclick="return confirm(' Are You Sure to Delete it')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
