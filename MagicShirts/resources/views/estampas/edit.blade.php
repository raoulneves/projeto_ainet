@extends('layout')

@section('content')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Estampas</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.estampas.update', ['Estampas'=>$estampas->id])}}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" class="form-control" name="cliente_id" id="cliente_id" value="{{$estampas->cliente_id}}"/>
                            @error('cliente_id')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" class="form-control" name="categoria_id" id="categoria_id" value="{{$estampas->categoria_id}}"/>
                            @error('categoria_id')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$estampas->nome}}"/>
                            @error('name')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Descricao</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" value="{{$estampas->descricao}}"/>
                            @error('descricao')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="text" class="form-control" name="imagem_url" id="imagem_url" value="{{$estampas->imagem_url}}"/>
                            @error('imagem_url')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Info_Extra</label>
                            <input type="text" class="form-control" name="informacao_extra" id="informacao_extra" value="{{$estampas->informacao_extra}}"/>
                            @error('informacao_extra')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{route('admin.estampas')}}" class="btn btn-secondary">cancel</a>
                        </div>
                    </form>
                </div>
            </div>

@endsection
