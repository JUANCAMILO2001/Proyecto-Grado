<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\GoogleAuthController;
use App\Http\Controllers\Admin\RedirectController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/login-google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/google-callback', [GoogleAuthController::class, 'handleGoogleCallback']);

Route::get('/products',[ProductsController::class, 'index'])->name('products');
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');


Route::get('/redirect',[RedirectController::class, 'dashboard']);
