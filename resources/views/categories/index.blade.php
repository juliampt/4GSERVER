<!-- resources/views/categories/index.blade.php -->
<x-layout title="Categorías">
    <h1 class="my-4">Categorías</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Crear Nueva Categoría</a>
    
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}
                <div class="btn-group" role="group">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
