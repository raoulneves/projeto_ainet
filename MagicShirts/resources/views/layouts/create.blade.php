@extends('layout')
@section('title','Nova Layouts')
@section('content')
    <form method="POST" action="{{route('admin.layouts.store')}}" class="form-group">
        @csrf
        @include('layouts.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.layouts.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
