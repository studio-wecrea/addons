<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/index', [InvoiceController::class, 'index'])
        ->name('invoices.index');

    Route::get('/create', [InvoiceController::class, 'create'])
        ->name('invoices.create');

    Route::post('/store', [InvoiceController::class, 'store'])
        ->name('invoices.store');

    Route::get('/show/{id}', [InvoiceController::class, 'show'])
        ->name('invoices.show');

    Route::get('/edit/{id}', [InvoiceController::class, 'edit'])
        ->name('versions.edit');

    Route::put('/update/{id}', [InvoiceController::class, 'update'])
        ->name('invoices.update');

    Route::delete('/delete/{id}', [InvoiceController::class, 'delete'])
        ->name('invoices.delete');