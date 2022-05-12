@extends('layout')

@section('content')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Precos</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.precos.update', ['Precos'=>$precos->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Preco_un_catalogo</label>
                            <input type="number" class="form-control" name="preco_un_catalogo" id="preco_un_catalogo" value="{{$precos->preco_un_catalogo}}"/>
                             @error('preco_un_catalogo')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Preco_un_proprio</label>
                            <input type="number" class="form-control" name="preco_un_proprio" id="preco_un_proprio" value="{{$precos->preco_un_proprio}}"/>
                             @error('preco_un_proprio')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Preco_un_catalogo_desconto</label>
                            <input type="number" class="form-control" name="preco_un_catalogo_desconto" id="preco_un_catalogo_desconto" value="{{$precos->preco_un_catalogo_desconto}}"/>
                             @error('preco_un_catalogo_desconto')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Preco_un_proprio_desconto</label>
                            <input type="number" class="form-control" name="preco_un_proprio_desconto" id="preco_un_proprio_desconto" value="{{$precos->preco_un_proprio_desconto}}"/>
                             @error('preco_un_proprio_desconto')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Quantidade desconto</label>
                            <input type="number" class="form-control" name="quantidade_desconto" id="quantidade_desconto" value="{{$precos->quantidade_desconto}}"/>
                             @error('quantidade_desconto')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{route('admin.precos')}}" class="btn btn-secondary">cancel</a>
                        </div>
                    </form>
                </div>
            </div>

@endsection
