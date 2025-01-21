<?php

use App\Http\Controllers\CategoryController;  // categories
use App\Http\Controllers\ProductController;  // products
use App\Http\Controllers\CartController; // cart

use Illuminate\Support\Facades\Route;  //categories //products // cart
use App\Http\Controllers\PostController; 

Route::resource('categories', CategoryController::class);  // Categories
Route::resource('products', ProductController::class);  // products
Route::get('cart', [CartController::class, 'index'])->name('cart.index');  // cart
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add'); // cart add
Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove'); //cart remove

Route::get('/posts', [PostController::class, 'index']); 
Route::get('/', function () { 
    return view('welcome');
});