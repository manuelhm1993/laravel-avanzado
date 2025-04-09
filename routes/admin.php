<?php

use App\Http\Controllers\Admin\AdminController;
use App\Utilities\Admin;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/login', 'login')->name('login.in')->withoutMiddleware(['admin-login']);
});

Route::resources(Admin::$resources['resources'], Admin::$resources['options']);