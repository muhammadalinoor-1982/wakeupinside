@extends('basic.layout_crud.master')
@section('content')
    <form action="{{route('crud.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('basic.layout_crud._form')
        <div class="form-group">
            <div class="col-sm-6">
                <button class="btn btn-sm btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection