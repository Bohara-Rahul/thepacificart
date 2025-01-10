<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

// Front Contoller related routes
Route::get("/", [FrontController::class, 'index'])->name('front.index');
Route::get("/about", [FrontController::class, 'about'])->name("front.about");

// Admin Controller related routes
Route::get("/admin", [AdminAuthController::class, 'login'])->name('admin_login');
Route::get("/admin/dashboard", [AdminDashboardController::class, 'index'])->name('admin_dashboard');
