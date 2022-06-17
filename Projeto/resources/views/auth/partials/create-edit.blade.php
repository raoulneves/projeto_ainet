<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" class="form-control" name="nome" id="inputNome" value="{{old('nome', $user->name)}}" >
    @error('nome')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputGenero">Genero</label>
    <input type="text" class="form-control" name="genero_code" id="inputGenero" value="{{old('genero_code', $filme->genero_code)}}" >
    @error('genero_code')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputAno">Ano</label>
    <input type="text" class="form-control" name="ano" id="inputAno" value="{{old('ano', $filme->ano)}}" >
    @error('ano')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputSumario">Sumário</label>
    <input type="text" class="form-control" name="sumario" id="inputSumario" value="{{old('sumario', $filme->sumario)}}" >
    @error('sumario')
        <div class="small text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="inputTrailer">Trailer</label>
    <input type="text" class="form-control" name="trailer" id="inputTrailer" value="{{old('trailer', $filme->trailer_url)}}" >
    @error('trailer')
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
