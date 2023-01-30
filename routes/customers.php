<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/index', [CustomerController::class, 'index'])
->name('customers.index');

Route::get('/create', [CustomerController::class, 'create'])
->name('customers.create');

Route::post('/store', [CustomerController::class, 'store'])
->name('customers.store');

Route::get('/show/{id}', [CustomerController::class, 'show'])
->name('customers.show');

Route::get('/account', [CustomerController::class, 'account'])
->name('customers.account');

Route::get('/edit/{id}', [CustomerController::class, 'edit'])
->name('customers.edit');

Route::put('/update/{id}', [CustomerController::class, 'update'])
->name('customers.update');

Route::get('/profile-edit', [CustomerController::class, 'profileEdit'])
->name('customers.profile-edit');

Route::put('/profile-update/{id}', [CustomerController::class, 'profileUpdate'])
->name('customers.profile-update');

Route::get('/address', [CustomerController::class, 'address'])
->name('customers.address');

Route::get('/password', [CustomerController::class, 'password'])
->name('customers.password');

Route::delete('/delete/{id}', [CustomerController::class, 'delete'])
->name('customers.delete');