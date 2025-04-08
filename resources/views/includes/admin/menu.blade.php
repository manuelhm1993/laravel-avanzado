<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="nav-icon la la-lg la-dashboard"></i> Dashboard
        </a>
    </li>
    <li class="nav-title">Administrador</li>

    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
            <i class="nav-icon la la-lg la-tag"></i> Categorías
        </a>
        <ul class="nav-dropdown-items">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categorias.index') }}">
                    <i class="nav-icon la la-lg la-list"></i> Listar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categorias.create') }}">
                    <i class="nav-icon la la-lg la-plus"></i> Crear
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categorias.create') }}">
                    <i class="nav-icon la la-lg la-edit"></i> Editar
                </a>
            </li>
        </ul>
    </li>
</ul>