@extends('layout2.master')
@section('content')
    <form action="{{route('crud222.update', $crud222->id)}}" method="post">
        @csrf
        @method('put')
        @include('layout2._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-success">Update</button>
            </div>
        </div>
    </form>
@endsection