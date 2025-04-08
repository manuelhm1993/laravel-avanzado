@extends('layouts.admin')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
        <li class="breadcrumb-item">Categorías</li>
        <li class="breadcrumb-item active">Crear</li>
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
    <h2>Crear categoría</h2>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" id="create-category-form" action="{{ route('admin.categorias.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="name">Nombre</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" type="text" name="name" placeholder="Nombre de la categoría" value="{{ old('name') }}">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" form="create-category-form">
                        Crear
                    </button>
                    <button class="btn btn-sm btn-danger" type="reset" form="create-category-form">
                        Limpiar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
