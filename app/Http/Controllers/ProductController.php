<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Asegúrate de importar el modelo Category
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para mostrar todos los productos
    public function index()
    {
        // Obtener todos los productos
        $products = Product::all();

        // Pasar los productos a la vista 'products.index'
        return view('products.index', compact('products'));
    }

    // Método para mostrar un producto específico (opcional)
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        return view('products.show', compact('product'));
    }

    // Otros métodos para crear, editar y eliminar productos...

    // Método para crear un nuevo producto
    public function create()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('products.create', compact('categories')); // Pasar las categorías a la vista
    }

    // Método para guardar un nuevo producto
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        $categories = Category::all(); // Obtener todas las categorías
        return view('products.edit', compact('product', 'categories')); // Pasar las categorías a la vista
    }

    // Método para actualizar un producto
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Método para eliminar un producto
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
