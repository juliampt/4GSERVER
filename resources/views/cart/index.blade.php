@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
    <h1 class="my-4">Carrito de Compras</h1>
    @if($cartItems->isEmpty())
        <p class="alert alert-info">Tu carrito está vacío.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar uno</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
