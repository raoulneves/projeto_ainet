<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>



@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('updatePassword') }}" id="change_password_form" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="container rounded bg-white mt-5 mb-5">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif


            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                            width="150px" src="{{ Storage::url('fotos/' . auth()->user()->foto_url) }}"><span
                            class="font-weight-bold">{{ auth()->user()->name }}</span><span
                            class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
                </div>
                <div class="col-md-4 border-right">
                    <div class="p-3 py-5">
                        <div class="">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h5>Alterar Password</h5>
                            </div>
                            <br>
                            <div class="col-md-12"><label for="oldPasswordInput" class="labels">Password Atual
                                </label><input type="password" name="old_password" id="oldPasswordInput" class="form-control @error('old_password') is-invalid @enderror" placeholder="Password Atual">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="col-md-12"><label for="newPasswordInput" class="labels">Nova Password</label><input type="password"
                                    name="new_password" id="newPasswordInput" class="form-control @error('new_password') is-invalid @enderror" placeholder="Nova Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>
                            <div class="col-md-12"><label for="confirmNewPasswordInput" class="labels">Confirmar Nova Password</label><input type="password"
                                    name="new_password_confirmation" id="confirmNewPasswordInput" class="form-control" placeholder="Confirmar Nova Password">
                                </div><br>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Guardar</button>
                            <a href="{{ route('alterarPassword') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </form>
@endsection
