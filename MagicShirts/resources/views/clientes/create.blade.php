@extends('layout')
@section('title','Nova Clientes')
@section('content')
    <form method="POST" action="{{route('admin.clientess.store')}}" class="form-group">
        @csrf
        @include('clientess.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.clientess.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
