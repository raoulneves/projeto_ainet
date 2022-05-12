@extends('layout')

@section('content')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tshirts</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.tshirts.update', ['Tshirts'=>$tshirts->id])}}" method="POST">
                        @csrf
                        @method('PATCH')


                        <div class="form-group">
                            <label>Cor_codigo</label>
                            <input type="text" class="form-control" name="cor_codigo" id="cor_codigo" value="{{$tshirts->cor_codigo}}"/>
                            @error('cor_codigo')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tamanho</label>
                            <select class="form-control" name="tamanho" id="tamanho">
                                <option value="XS" @if($tshirts->tipo == 'XS') selected @endif>XS</option>
                                <option value="S" @if($tshirts->tipo == 'S') selected @endif>S</option>
                                <option value="M" @if($tshirts->tipo == 'M') selected @endif>M</option>
                                <option value="L" @if($tshirts->tipo == 'L') selected @endif>L</option>
                                <option value="XL" @if($tshirts->tipo == 'XL') selected @endif>XL</option>
                            </select>
                            @error('tamanho')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Quatidade</label>
                            <input type="text" class="form-control" name="quantidade" id="quantidade" value="{{$tshirts->quantidade}}"/>
                            @error('quantidade')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Preco_Uni</label>
                            <input type="number" class="form-control" name="preco_un" id="preco_un" value="{{$tshirts->preco_un}}"/>
                             @error('preco_un')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Subtotal</label>
                            <input type="number" class="form-control" name="subtotal" id="subtotal" readonly value="{{$tshirts->subtotal}}"/>
                            @error('subtotal')
                                <div class="text-danger small">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{route('admin.tshirts')}}" class="btn btn-secondary">cancel</a>
                        </div>
                    </form>
                </div>
            </div>

@endsection
