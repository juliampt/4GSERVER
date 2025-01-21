<?php

use App\Http\Controllers\CategoryController;  // categories
use App\Http\Controllers\ProductController;  // products
use App\Http\Controllers\CartController; // cart
use Illuminate\Support\Facades\Route;  // categories, products, cart
use App\Http\Controllers\PostController; 
use App\Http\Controllers\ProfileController;

// Rutas personalizadas
Route::resource('categories', CategoryController::class);  // Categories
Route::resource('products', ProductController::class);  // products
Route::get('cart', [CartController::class, 'index'])->name('cart.index');  // cart
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add'); // cart add
Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove'); // cart remove

Route::get('/posts', [PostController::class, 'index']); 

// Rutas de bienvenida y dashboard
Route::get('/', function () { 
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
