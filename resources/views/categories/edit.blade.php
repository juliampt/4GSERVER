<!-- resources/views/categories/edit.blade.php -->
<x-layout title="Editar Categoría">
    <h1 class="my-4">Editar Categoría</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</x-layout>
