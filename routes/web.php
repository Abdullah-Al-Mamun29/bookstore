<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'home'])->name('home');
Route::post('/add-to-cart', [BookController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [BookController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/delete/{id}', [BookController::class, 'deleteCartItem'])->name('cart.delete');
Route::get('/checkout', [BookController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [BookController::class, 'placeOrder'])->name('order.place');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.product.store');
    Route::get('/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
});