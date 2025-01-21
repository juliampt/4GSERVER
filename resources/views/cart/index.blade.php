<!-- resources/views/cart/index.blade.php -->
<x-layout title="Carrito de Compras">
    <h1 class="my-4">Carrito de Compras</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Precio Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $cartItem)
                <tr>
                    <td>
                        @if ($cartItem->product->image)
                            <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                        @endif
                    </td>
                    <td>{{ $cartItem->product->name }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>${{ $cartItem->product->price }}</td>
                    <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $cartItem->product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <h3>Total a Pagar: ${{ $cartItems->sum(function($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        }) }}</h3>
    </div>
</x-layout>
