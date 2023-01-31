<?php

use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [VersionController::class, 'index'])
        ->name('versions.index');

    Route::get('/create', [VersionController::class, 'create'])
        ->name('versions.create');

    Route::post('/store', [VersionController::class, 'store'])
        ->name('versions.store');

    Route::get('/show/{id}', [VersionController::class, 'show'])
        ->name('versions.show');

    Route::get('/edit/{id}', [VersionController::class, 'edit'])
        ->name('versions.edit');

    Route::put('/update/{id}', [VersionController::class, 'update'])
        ->name('versions.update');

    Route::delete('/delete/{id}', [VersionController::class, 'delete'])
        ->name('versions.delete');