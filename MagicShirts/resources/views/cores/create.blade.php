@extends('layout')
@section('title','Nova Cores')
@section('content')
    <form method="POST" action="{{route('admin.coress.store')}}" class="form-group">
        @csrf
        @include('coress.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.coress.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
