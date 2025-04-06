@extends('layouts.app')

@section('content')
    <h1>Home</h1>

    <h3>Categorías</h3>
    <div class="container">
        <div class="row">
            @foreach ($categorias as $categoria)
            <div class="col-12 col-sm-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoria }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <h3>Productos</h3>

    @include('includes.listar-productos')
@endsection