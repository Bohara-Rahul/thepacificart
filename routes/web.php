<?php

use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\AdminPendingArtistController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSlidersController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Product\PhotoController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Front Contoller related routes
Route::get("/", [FrontController::class, 'index'])->name('front.home');
Route::get("/gallery", [FrontController::class, 'gallery'])->name("front.gallery");
Route::get("/categories", [FrontController::class, 'categories'])->name("front.categories");
Route::get("/artists", [FrontController::class, 'artists'])->name("front.artists");
Route::get("/artists/{artist}", [FrontController::class, 'artist_detail'])->name("front.artist_detail");
Route::get("/about-us", [FrontController::class, 'about'])->name("front.about-us");
Route::get("/whats-new", [FrontController::class, 'whats_new'])->name("front.whats-new");
Route::get("/blog", [FrontController::class, 'blog'])->name("front.blog");
Route::get("/custom-art", [FrontController::class, 'custom_art'])->name("front.custom_art");
Route::get("/artist-application", [FrontController::class, 'artist_application'])->name("front.artist_application");
Route::get("/refund-policy", [FrontController::class, 'refund_policy'])->name("front.refund_policy");
Route::get("/terms-conditions", [FrontController::class, 'terms_conditions'])->name("front.terms_conditions");
Route::get("/wishlist/{product_id}", [FrontController::class, 'add_to_wishlist'])->name("front.add_to_wishlist");
Route::get("/wishlist/remove/{product_id}", [FrontController::class, 'remove_from_wishlist'])->name("front.remove_from_wishlist");

// Product related routes
Route::get('/arts/{slug}', [ProductController::class, 'product_detail'])->name('product_detail');
Route::get('/categories/{slug}', [CategoryController::class, 'category_detail'])->name('category_detail');

// User Controller related routes
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'register_submit'])->name('user.register_submit');
Route::get('register-verify/{token}/{email}', [UserController::class, 'register_verify'])->name('user.register-verify');
Route::get("/login", [UserController::class, 'login'])->name('user.login');
Route::post("/login", [UserController::class, 'login_submit'])->name('user.login_submit');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('mustBeLoggedIn');
Route::get("/dashboard", [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('mustBeLoggedIn');

// Admin Auth Controller related routes
Route::prefix('admin')->group(function () {
  Route::get('/', function () {
    return redirect('/admin/login');
  });
  Route::get("/login", [AdminAuthController::class, 'login'])->name('admin_login');
  Route::post("/login", [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
  Route::post("/logout", [AdminAuthController::class, 'logout'])->name('admin_logout');
});

// Admin Dashboard Controller 
Route::middleware('can:visitAdminPages')->prefix('admin')->group(function () {
  Route::get("/dashboard", [AdminDashboardController::class, 'index'])->name('admin_dashboard');

  // Product Related Routes
  Route::get("/products", [AdminProductController::class, 'index'])->name('admin_products');
  Route::get("/products/create", [AdminProductController::class, 'create'])->name('admin_products_create');
  Route::post("/products/create", [AdminProductController::class, 'create_submit'])->name('admin_products_create_submit');
  Route::get('/products/edit/{id}', [AdminProductController::class, 'edit'])->name('admin_products_edit');
  Route::put('/products/edit/{id}', [AdminProductController::class, 'edit_submit'])->name('admin_products_edit_submit');
  Route::get('/products/delete/{id}', [AdminProductController::class, 'delete'])->name('admin_products_delete');

  // Blog Related Routes
  Route::get("/blogs", [AdminBlogController::class, 'index'])->name('admin_blogs');
  Route::get("/blogs/create", [AdminBlogController::class, 'create'])->name('admin_blogs_create');
  Route::post("/blogs/create", [AdminBlogController::class, 'create_submit'])->name('admin_blogs_create_submit');
  Route::get('/blogs/edit/{slug}', [AdminBlogController::class, 'edit'])->name('admin_blogs_edit');
  Route::put('/blogs/edit/{slug}', [AdminBlogController::class, 'edit_submit'])->name('admin_blogs_edit_submit');
  Route::get('/blogs/delete/{slug}', [AdminBlogController::class, 'delete'])->name('admin_blogs_delete');

  // Slider related routes
  Route::get('/sliders', [AdminSlidersController::class, 'index'])->name('admin_sliders_index');
  Route::get('/sliders/create', [AdminSlidersController::class, 'create'])->name('admin_sliders_create');
  Route::post('/sliders/create', [AdminSlidersController::class, 'create_submit'])->name('admin_sliders_create_submit');
  Route::get('/sliders/delete/{id}', [AdminSlidersController::class, 'delete'])->name('admin_sliders_delete');

  // Hero Section related routes
  Route::get("/hero", [AdminHeroController::class, 'index'])->name('admin_hero_index');
  Route::put("/hero/{id}/update", [AdminHeroController::class, 'edit_submit'])->name('admin_hero_edit_submit');

  // Photo related routes
  Route::delete("/photos/{photo}/delete", [PhotoController::class, 'delete'])->name('admin_photo_delete');

  // Category Related Routes
  Route::get("/categories", [AdminCategoryController::class, 'index'])->name('admin_categories');
  Route::get("/categories/create", [AdminCategoryController::class, 'create'])->name('admin_categories_create');
  Route::post("/categories/create", [AdminCategoryController::class, 'create_submit'])->name('admin_categories_create_submit');
  Route::get('/categories/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_categories_edit');
  Route::post('/categories/edit/{id}', [AdminCategoryController::class, 'edit_submit'])->name('admin_categories_edit_submit');
  Route::get('/categories/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_categories_delete');

  // Admin Section Artist Related Routes
  Route::get('/artists', [AdminArtistController::class, 'index'])->name('admin_artists');
  Route::get('/artists/create', [AdminArtistController::class, 'create'])->name('admin_artist_create');
  Route::post('/artists/create', [AdminArtistController::class, 'create_submit'])->name('admin_artist_create_submit');
  Route::get('/artists/edit/{id}', [AdminArtistController::class, 'edit'])->name('admin_artist_edit');
  Route::post('/artists/edit/{id}', [AdminArtistController::class, 'edit_submit'])->name('admin_artist_edit_submit');
  Route::get('/artists/delete/{id}', [AdminArtistController::class, 'delete'])->name('admin_artist_delete');

  // Pending Artists Related Routes
  Route::get('/pending-artists', [AdminPendingArtistController::class, 'index'])->name('admin_pending_artists');
  Route::get('/pending-artists/{id}', [AdminPendingArtistController::class, 'view'])->name('admin_pending_artists_view');
  Route::post('/pending-artists/approve/{id}', [AdminPendingArtistController::class, 'approve_application'])->name('admin_pending_artists_approve');
  Route::post('/pending-artists/reject/{id}', [AdminPendingArtistController::class, 'reject_application'])->name('admin_pending_artists_reject');
});
