<?php

use App\Http\Controllers\Admin\AdminController;
use App\Utilities\Admin;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function () {
    Route::get('/login', 'login')->name('login.in')->withoutMiddleware(['admin-login']);
    Route::post('/logear', 'logear')->name('logear')->withoutMiddleware(['admin-login']);
    
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/', 'dashboard')->name('dashboard');
});

Route::resources(Admin::$resources['resources'], Admin::$resources['options']);