<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [ReviewController::class, 'index'])
        ->name('reviews.index');

    Route::get('/create', [ReviewController::class, 'create'])
        ->name('reviews.create');

    Route::post('/store', [ReviewController::class, 'store'])
        ->name('reviews.store');

    Route::get('/show/{id}', [ReviewController::class, 'show'])
        ->name('reviews.show');

    Route::get('/edit/{id}', [ReviewController::class, 'edit'])
        ->name('reviews.edit');

    Route::put('/update/{id}', [ReviewController::class, 'update'])
        ->name('reviews.update');

    Route::delete('/delete/{id}', [ReviewController::class, 'delete'])
        ->name('reviews.delete');