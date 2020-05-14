@extends('layout.master')
@section('content')
    <form action="{{route('crud111.update', $crud111->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('layout._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-sm btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection