@extends('layouts.app')

@section('content')
    <h1>Producto: {{ $producto->name }}</h1>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3 mb-2 me-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->name }}</h5>
                        <h6>Categoría: {{ $producto->category->name }}</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection