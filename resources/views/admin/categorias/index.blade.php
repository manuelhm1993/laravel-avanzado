@extends('layouts.admin')

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
    <li class="breadcrumb-item">Categorías</li>
    <li class="breadcrumb-item active">Listar</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#">
                <i class="icon-speech"></i>
            </a>
            <a class="btn" href="./"><i class="icon-graph"></i>  Dashboard</a>
            <a class="btn" href="#"><i class="icon-settings"></i>  Settings</a>
        </div>
    </li>
</ol>
@endsection

@section('content')
    <h2>Lista de categorías</h2>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha de creación</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->name }}</td>
                            <td>{{ $categoria->created_at->format('Y-m-d - h:m:s:a') }}</td>
                            <td><span class="badge badge-success">Active</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection