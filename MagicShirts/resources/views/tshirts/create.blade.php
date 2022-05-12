@extends('layout')
@section('title','Nova Tshirts')
@section('content')
    <form method="POST" action="{{route('admin.tshirts.store')}}" class="form-group">
        @csrf
        @include('tshirts.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.tshirts.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
