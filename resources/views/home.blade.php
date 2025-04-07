@extends('layouts.app')

@section('content')
    @foreach ($categorias as $categoria)
        <h2>{{ $categoria->name }}</h2>

        @php
            $productos = $categoria->products;
        @endphp

        @include('includes.listar-productos')
    @endforeach
@endsection