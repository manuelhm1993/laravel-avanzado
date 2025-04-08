<?php

use App\Http\Controllers\Admin\AdminController;
use App\Utilities\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', AdminController::class)->name('dashboard');

Route::resources(Admin::$resources['resources'], Admin::$resources['options']);