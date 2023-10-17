<?php

use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [SupportController::class, 'index'])
        ->name('support.index');

    Route::get('/create', [SupportController::class, 'create'])
        ->name('support.create');

    Route::post('/store', [SupportController::class, 'store'])
        ->name('support.store');

    Route::get('/show/{id}', [SupportController::class, 'show'])
        ->name('support.show');

    Route::get('/edit/{id}', [SupportController::class, 'edit'])
        ->name('support.edit');

    Route::put('/update/{id}', [SupportController::class, 'update'])
        ->name('support.update');

    Route::delete('/delete/{id}', [SupportController::class, 'delete'])
        ->name('support.delete');