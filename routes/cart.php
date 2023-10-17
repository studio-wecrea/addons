<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('count', [CartController::class, 'count'])->name('cart.count');
Route::get('increase{id}', [CartController::class, 'increase']);
Route::get('decrease{id}', [CartController::class, 'decrease']);
Route::get('index', [CartController::class, 'index'])->name('cart.index');
Route::delete('destroy{id}', [CartController::class, 'destroyModule'])->name('cart.destroy');
Route::apiResource('store', CartController::class);