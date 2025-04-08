<div class="container">
    <div class="row">
        @forelse ($categorias as $categoria)
        <div class="col-12 col-sm-3 mb-2 me-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->name }}</h5>
                    <p class="card-text">Cantidad de productos: {{ (!is_null($categoria->products)) ? $categoria->products->count() : 0 }}</p>
                    <a href="{{ route('productos.index', ['categoria' => $categoria->name]) }}" class="btn btn-primary">Ver productos</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-danger" role="alert">
            La categoría no existe
        </div>
        @endforelse
    </div>
</div>