<div class="container">
    <div class="row">
        @forelse ($productos as $producto)
        <div class="col-12 col-sm-3 mb-2 me-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->name }}</h5>
                    <h6>Categoría: {{ $producto->category->name }}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    {{-- El helper action llama al controlador y su método --}}
                    <a href="{{ action([App\Http\Controllers\ProductController::class, 'show'], $producto) }}" class="btn btn-primary">Ver detalle</a>

                    {{-- El helper route genera la url de una ruta nombrada --}}
                    {{-- <a href="{{ route('productos.show', $producto) }}" class="btn btn-primary">Ver detalle</a> --}}
                </div>
            </div>
        </div>
        @empty
            <div class="alert alert-danger" role="alert">
                Sin existencia
            </div>
        @endforelse
    </div>
</div>