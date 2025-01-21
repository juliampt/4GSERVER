<!-- resources/views/categories/create.blade.php -->
<x-layout title="Crear Categoría">
    <h1 class="my-4">Crear Nueva Categoría</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</x-layout>
