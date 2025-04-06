@extends('layouts.app')

@section('content')
    <h1>Categorias</h1>

    <div class="container">
        <div class="row">
            @foreach ($categorias as $categoria)
            <div class="col-12 col-sm-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoria->name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection