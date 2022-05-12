@extends('layout')
@section('title','Nova Estampas')
@section('content')
    <form method="POST" action="{{route('admin.estampas.store')}}" class="form-group">
        @csrf
        @include('estampas.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.estampas.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
