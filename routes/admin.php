<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;

Route::get('', function () {
    return view('admin.dashboard.index');
});

Route::resource('users', UsersController::class)->names('admin.users');
