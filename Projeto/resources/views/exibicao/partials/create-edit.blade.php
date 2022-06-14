<div class="form-group">
    <label for="inputTitulo">Titulo</label>
    <input type="text" class="form-control" name="titulo" id="inputTitulo" value="{{old('titulo', $filme->titulo)}}" >
    @error('titulo')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputGenero">Genero</label>
    <input type="text" class="form-control" name="genero" id="inputGenero" value="{{old('genero', $filme->genero_code)}}" >
    @error('genero')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputFoto">Upload da foto</label>
    <input type="file" class="form-control" name="foto" id="inputFoto">
    @error('foto')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>
