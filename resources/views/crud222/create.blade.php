@extends('layout2.master')
@section('content')
    <form action="{{route('crud222.store')}}" method="post">
        @csrf
@include('layout2._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-success">Create</button>
            </div>
        </div>
    </form>

@endsection