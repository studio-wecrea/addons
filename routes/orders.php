<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/cart', [OrderController::class, 'cart'])
        ->name('orders.cart');

Route::get('/shopping-cart', [OrderController::class, 'shoppingCart'])
        ->name('orders.shopping-cart');

Route::get('/wishlist', [OrderController::class, 'wishlist'])
        ->name('orders.wishlist');

Route::get('/stripe', [OrderController::class, 'stripe'])
        ->name('orders.stripe');

Route::get('/history', [OrderController::class, 'history'])
        ->name('orders.history');