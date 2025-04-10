@auth
    {{-- Si el usuario está logeado, no se le mostrará el login, se redigirá al dashboard --}}
    <script> window.location.href="{{ route('admin.dashboard') }}"; </script>
@endauth

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <p class="text-muted">Formulario de login</p>
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Ingrese su correo">
                            </div>
                            <div class="input-group mb-4">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Ingrese su contraseña">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" id="login" type="button">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" id="forgot" type="button">¿Olvidó su
                                        contraseña?</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Crear cuenta</h2>
                                <p>Si no tienes una cuenta, puedes crearla fácilmente aquí</p>
                                <button class="btn btn-primary active mt-3" id="register"
                                    type="button">Registrarme</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const login = async (url, parameters) => {
            try {
                const res = await fetch(url, parameters);

                if (!res.ok) {
                    throw new Error(`Error ${res.status}`);
                }

                const data = await res.json();

                if (data.success) {
                    window.location.href = data.redirect; // Redirige al dashboard u otra ruta
                } 
                else {
                    console.log('Login fallido. Verifica tus credenciales.');
                }

            } catch (error) {
                console.error('Error al hacer login:', error);
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.querySelectorAll('input');
            const data = {};

            document.addEventListener('click', (e) => {
                if(e.target.id == 'login')
                {
                    loginForm.forEach(element => {
                        data[element.name] = element.value;

                        if(element.name != '_token') element.value = '';
                    });

                    const parameters = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': data._token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    };

                    const url = "{{ route('admin.logear') }}";

                    login(url, parameters);
                }
            });
        });
    </script>
@endpush
