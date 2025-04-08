@extends('layouts.app')

@section('content')
    @foreach ($categorias as $categoria)
        <h2>{{ $categoria->name }}</h2>

        @include('includes.listar-productos', ['productos' => $categoria->products])
    @endforeach
@endsection