<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

// Front Contoller related routes
Route::get("/", [FrontController::class, 'index'])->name('front.home');
Route::get("/about", [FrontController::class, 'about'])->name("front.about");
Route::get("/arts", [FrontController::class, 'arts'])->name("front.arts");
Route::get("/gallery", [FrontController::class, 'gallery'])->name("front.gallery");
Route::get("/blog", [FrontController::class, 'blog'])->name("front.blog");


// Admin Controller related routes
Route::prefix('admin')->group(function () {
  Route::get('/', function () {
    return redirect('/admin/login');
  });
  Route::get("/login", [AdminAuthController::class, 'login'])->name('admin_login');
  Route::post("/login", [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
});


Route::middleware('can:visitAdminPages')->prefix('admin')->group(function () {
  Route::get("/dashboard", [AdminDashboardController::class, 'index'])->name('admin_dashboard');
});
