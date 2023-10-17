<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('/index', [ContactController::class, 'index'])
->name('contact.index');