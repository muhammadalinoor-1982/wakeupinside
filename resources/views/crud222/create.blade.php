@extends('layout2.master')
@section('content')
    <form action="{{route('crud222.store')}}" method="post" enctype="multipart/form-data">
        @csrf
@include('layout2._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-sm btn-success">Create</button>
            </div>
        </div>
    </form>

@endsection