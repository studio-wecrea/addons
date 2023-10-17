<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

Route::get('/list', [AdminDashboardController::class, 'list'])
->name('admin.list');

