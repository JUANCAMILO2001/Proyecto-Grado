<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BillsController;
use App\Http\Controllers\Admin\CocineroController;




Route::get('dashboard',[DashboardController::class, 'index'])->middleware('can:admin.dashboard')->name('admin.dashboard');
Route::resource('users', UsersController::class)->names('admin.users');
Route::resource('products', ProductsController::class)->names('admin.products');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('bills', BillsController::class)->names('admin.bills');

Route::get('charts',[BillsController::class, 'charts'])->name('admin.charts');
Route::get('entregados',[BillsController::class, 'entregadosa'])->name('admin.entregadosa');
Route::get('cocinero',[CocineroController::class, 'index'])->name('admin.cocinero');

