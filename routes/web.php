<?php

use App\Http\Controllers\AdminDashboardController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\HomepageController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', [HomepageController::class, 'homepage'])
    ->name('/');


//require __DIR__.'/auth.php';

Route::prefix('auth')->group(base_path('routes/auth.php'));

Route::prefix('modules')->group(base_path('routes/modules.php'));
Route::prefix('version')->group(base_path('routes/versions.php'));
Route::prefix('invoices')->group(base_path('routes/invoices.php'));
Route::prefix('platforms')->group(base_path('routes/platforms.php'));
Route::prefix('categories')->group(base_path('routes/categories.php'));
Route::prefix('reviews')->group(base_path('routes/reviews.php'));
Route::prefix('support')->group(base_path('routes/support.php'));
Route::prefix('customers')->group(base_path('routes/customers.php'));
Route::prefix('employees')->group(base_path('routes/employees.php'));
Route::prefix('admin')->group(base_path('routes/admin.php'));
Route::prefix('orders')->group(base_path('routes/orders.php'));

Route::prefix('cart')->group(base_path('routes/cart.php'));
Route::prefix('wishlist')->group(base_path('routes/wishlist.php'));
Route::prefix('stripe')->group(base_path('routes/stripe.php'));
Route::prefix('contact')->group(base_path('routes/contact.php'));
