@extends('layout')
@section('title','Nova Pages')
@section('content')
    <form method="POST" action="{{route('admin.pages.store')}}" class="form-group">
        @csrf
        @include('pages.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.pages.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
