@extends('layout')
@section('title','Nova Categoria')
@section('content')
    <form method="POST" action="{{route('admin.categorias.store')}}" class="form-group">
        @csrf
        @include('categorias.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.categorias.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
