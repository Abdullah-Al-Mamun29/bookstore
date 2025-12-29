<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/home', [BookController::class, 'home'])->name('home');

Route::get('/shop', [BookController::class, 'shop'])->name('shop');
Route::get('/testimonial', [BookController::class, 'testimonial'])->name('testimonial');
Route::get('/category/{id}', [BookController::class, 'category'])->name('category.show');
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::get('/cart', [BookController::class, 'viewCart'])->name('cart.index');
Route::post('/add-to-cart', [BookController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [BookController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/delete/{id}', [BookController::class, 'deleteCartItem'])->name('cart.delete');
Route::get('/cart/empty', [BookController::class, 'emptyCart'])->name('cart.clear');

Route::get('/checkout', [BookController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [BookController::class, 'placeOrder'])->name('order.place');

Route::get('/about', [BookController::class, 'about'])->name('about');
Route::get('/contact', [BookController::class, 'contact'])->name('contact');
Route::post('/contact', [BookController::class, 'sendContact'])->name('contact.send');
Route::post('/subscribe', [BookController::class, 'subscribe'])->name('subscribe');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/orders', [UserController::class, 'orders'])->name('user.orders');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.product.store');
    Route::post('/products/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.product.update');
    Route::get('/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');

    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('admin.category.store');
    Route::get('/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');

    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/orders/update', [AdminController::class, 'updateOrder'])->name('admin.order.update');
    Route::get('/orders/delete/{id}', [AdminController::class, 'deleteOrder'])->name('admin.order.delete');

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

    Route::get('/messages', [AdminController::class, 'messages'])->name('admin.messages');
    Route::get('/messages/delete/{id}', [AdminController::class, 'deleteMessage'])->name('admin.message.delete');

    Route::get('/reviews', [AdminController::class, 'reviews'])->name('admin.reviews');
    Route::get('/reviews/delete/{id}', [AdminController::class, 'deleteReview'])->name('admin.review.delete');
    Route::get('/add-review', [BookController::class, 'addReview'])->name('add.review');
    Route::post('/store-review', [BookController::class, 'storeReview'])->name('store.review');
});