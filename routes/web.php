<?php

use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

// Front Contoller related routes
Route::get("/", [FrontController::class, 'index'])->name('front.index');
Route::get("/about", [FrontController::class, 'about'])->name("front.about");
