<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $productId)
    {
        $cartItem = CartItem::where('product_id', $productId)->first();
        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index');
    }

    public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    return view('products.show', compact('product'));
}

}
