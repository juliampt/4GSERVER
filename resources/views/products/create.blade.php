<!-- resources/views/products/create.blade.php -->
<x-layout title="Crear Producto">
    <h1 class="my-4">Crear Nuevo Producto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría:</label>
            <select id="category_id" name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</x-layout>
