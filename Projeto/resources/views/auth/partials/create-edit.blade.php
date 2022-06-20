<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$users->name}}"/>
    @error('name')
        <div class="text-danger small">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" id="email" value="{{$users->email}}"/>
    @error('email')
        <div class="text-danger small">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label>Tipo</label>
    <select class="form-control" name="tipo" id="tipo">
        <option value="A" @if($users->tipo == 'A') selected @endif>Administrador</option>
        <option value="F" @if($users->tipo == 'F') selected @endif>Funcionario</option>
        <option value="C" @if($users->tipo == 'C') selected @endif>Cliente</option>
    </select>
    @error('tipo')
        <div class="text-danger small">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    <label>Bloqueado</label>
    <select class="form-control" name="bloqueado" id="bloqueado">
        <option value="1" @if($users->bloqueado == '1') selected @endif>Bloqueado</option>
        <option value="0" @if($users->bloqueado == '0') selected @endif>Desbloqueado</option>
    </select>
    @error('bloqueado')
        <div class="text-danger small">{{$message}}</div>
    @enderror
</div>
