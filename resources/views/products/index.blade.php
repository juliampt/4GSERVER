<!-- resources/views/products/index.blade.php -->
<x-layout title="Productos">
    <div class="container my-4">
        <h1 class="my-4">Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Crear Nuevo Producto</a>
        
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{ $product->price }}</p>
                            <p class="card-text"><strong>Categoría:</strong> {{ optional($product->category)->name ?? 'No category' }}</p>
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Añadir al Carrito</button>
                            </form>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning mt-2">Editar</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
