@extends('layout')
@section('title','Nova Precos')
@section('content')
    <form method="POST" action="{{route('admin.precos.store')}}" class="form-group">
        @csrf
        @include('precos.partials.create-edit')
        <div class="form-group text-right">
                <button type="submit" class="btn btn-success" name="ok">Save</button>
                <a href="{{route('admin.precos.create')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
