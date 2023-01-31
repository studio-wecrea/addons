<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [ModuleController::class, 'index'])
        ->name('modules.index');

    Route::get('/create', [ModuleController::class, 'create'])
        ->name('modules.create');

    Route::post('/store', [ModuleController::class, 'store'])
        ->name('modules.store');

    Route::get('/show/{id}', [ModuleController::class, 'show'])
        ->name('modules.show');

    Route::get('/edit/{id}', [ModuleController::class, 'edit'])
        ->name('modules.edit');

    Route::put('/update/{id}', [ModuleController::class, 'update'])
        ->name('modules.update');

    Route::delete('/delete/{id}', [ModuleController::class, 'delete'])
        ->name('modules.delete');

    Route::get('/cart', [ModuleController::class, 'cart'])
        ->name('modules.cart');

    Route::post('/checkout', [ModuleController::class, 'checkout'])
        ->name('modules.checkout');

    Route::get('/checkout-success', [ModuleController::class, 'success'])
        ->name('modules.checkout-success');

    Route::get('/checkout-cancel', [ModuleController::class, 'cancel'])
        ->name('modules.checkout-cancel');
