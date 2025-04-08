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
@endsection