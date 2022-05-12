@extends('layout')
@section('title','Nova Encomendas')
@section('content')
    <form method="POST" action="{{route('admin.encomendass.store')}}" class="form-group">
        @csrf
        @include('encomendass.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.encomendass.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
