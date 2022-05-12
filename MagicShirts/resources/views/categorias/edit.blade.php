@extends('layout')

@section('content')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categorias.update', ['Categorias'=>$categoria->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="{{$categoria->name}}"/>
                            @error('nome')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{route('admin.categorias')}}" class="btn btn-secondary">cancel</a>
                        </div>
                    </form>
                </div>
            </div>

@endsection
