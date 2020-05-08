@extends('layout.master')
@section('content')
    <form action="{{route('crud111.update', $crud111->id)}}" method="post">
        @csrf
        @method('put')
        @include('layout._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection