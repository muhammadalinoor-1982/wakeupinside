
@extends('layout.master')
@section('content')
    <form action="{{route('crud111.store')}}" method="post">
        @csrf
        @include('layout._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection