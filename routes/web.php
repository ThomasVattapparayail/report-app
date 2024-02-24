<?php

use Illuminate\Support\Facades\Route; 
use App\Models\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products =Product::All();
    return view('welcome',compact('products'));
});


Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'front'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'view'])->name('products');

Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');

Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class,'edit'])->name('products.edit');

Route::put('/products/{product}', [App\Http\Controllers\ProductController::class,'update'])->name('products.update');

Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class,'destroy'])->name('products.destroy');