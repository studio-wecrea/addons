<?php

use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [PlatformController::class, 'index'])
        ->name('platforms.index');

    Route::get('/create', [PlatformController::class, 'create'])
        ->name('platforms.create');

    Route::post('/store', [PlatformController::class, 'store'])
        ->name('platforms.store');

    Route::get('/show/{id}', [PlatformController::class, 'show'])
        ->name('platforms.show');

    Route::get('/edit/{id}', [PlatformController::class, 'edit'])
        ->name('platforms.edit');

    Route::put('/update/{id}', [PlatformController::class, 'update'])
        ->name('platforms.update');

    Route::delete('/delete/{id}', [PlatformController::class, 'delete'])
        ->name('platforms.delete');