<?php


use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('count', [WishlistController::class, 'count'])->name('wishlist.count');
Route::get('index', [WishlistController::class, 'index'])->name('wishlist.index');
Route::delete('destroy{id}', [WishlistController::class, 'destroyModule'])->name('wishlist.destroy');
Route::apiResource('store', WishlistController::class);