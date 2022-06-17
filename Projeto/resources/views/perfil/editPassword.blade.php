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
    <form method="POST" action="{{ route('updatePassword') }}" id="change_password_form" class="form-group"
        enctype="multipart/form-data">
        @csrf
        <!--<input type="hidden" name="user_id">-->
        <div class="container rounded bg-white mt-5 mb-5">
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
                            <div class="col-md-12"><label class="labels">Password Atual
                                </label><input type="password" name="old_password" id="old_password" class="form-control">
                                @if ($errors->any('old_password'))
                                    <span class="text-danger">{{$errors->first('old_password')}}</span>
                                @endif
                            </div>
                            <br>
                            <div class="col-md-12"><label class="labels">Nova Password</label><input type="password"
                                    name="new_password" id="new_password" class="form-control">
                                    @if ($errors->any('new_password'))
                                    <span class="text-danger">{{$errors->first('new_password')}}</span>
                                @endif
                                </div><br>
                            <div class="col-md-12"><label class="labels">Confirmar Password</label><input type="password"
                                    name="confirm_password" id="confirm_password" class="form-control">
                                    @if ($errors->any('confirm_password'))
                                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                                @endif
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
