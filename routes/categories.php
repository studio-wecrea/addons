<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



    Route::get('/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/store', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/show/{id}', [CategoryController::class, 'show'])
        ->name('categories.show');

    Route::get('/edit/{id}', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/update/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])
        ->name('categories.delete');
