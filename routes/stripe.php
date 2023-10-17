<?php

use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('checkout', [StripeController::class, 'create'])->name('stripe.checkout');
Route::post('paymentIntent', [StripeController::class, 'paymentIntent'])->name('stripe.paymentIntent');
Route::get('/checkout-success', [StripeController::class, 'success'])
        ->name('stripe.checkout-success');

    Route::get('/checkout-cancel', [StripeController::class, 'cancel'])
        ->name('stripe.checkout-cancel');