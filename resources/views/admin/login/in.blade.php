@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <p class="text-muted">Formulario de login</p>
                            <form action="{{ route('admin.logear') }}" method="post" id="form-login">
                                @csrf
                                <div class="input-group mb-3">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Ingrese su correo">
                                </div>
                                <div class="input-group mb-4">
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese su contraseña">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" id="login" type="submit">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-link px-0" id="forgot" type="button">¿Olvidó su contraseña?</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Crear cuenta</h2>
                                <p>Si no tienes una cuenta, puedes crearla fácilmente aquí</p>
                                <button class="btn btn-primary active mt-3" id="register" type="button">Registrarme</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection