<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/index', [EmployeeController::class, 'index'])
->name('employees.index');

Route::get('/create', [EmployeeController::class, 'create'])
->name('employees.create');

Route::post('/store', [EmployeeController::class, 'store'])
->name('employees.store');

Route::get('/show/{id}', [EmployeeController::class, 'show'])
->name('employees.show');

Route::get('/edit/{id}', [EmployeeController::class, 'edit'])
->name('employees.edit');

Route::put('/update/{id}', [EmployeeController::class, 'update'])
->name('employees.update');

Route::delete('/delete/{id}', [EmployeeController::class, 'delete'])
->name('employees.delete');