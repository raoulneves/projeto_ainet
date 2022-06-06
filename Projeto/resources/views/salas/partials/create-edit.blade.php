<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="nome" id="inputNome" value="{{old('nome', $sala->nome)}}" >
    @error('titulo')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

