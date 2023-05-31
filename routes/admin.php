<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;



Route::get('dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('users', UsersController::class)->names('admin.users');
Route::resource('products', ProductsController::class)->names('admin.products');
