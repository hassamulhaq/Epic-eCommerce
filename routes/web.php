<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\ProductsController;
use \App\Http\Controllers\MediaController;
use \App\Http\Controllers\CollectionsController;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\WishlistController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\CheckoutsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/old/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('old.dashboard');




Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

Route::get('/dashboard-preview/', [DashboardController::class, 'preview'])->name('previewdashboard');


Route::prefix('admin')
   ->name('admin.')
   ->middleware('auth')
   ->group(function () {
       Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
       Route::get('/widgets', [DashboardController::class, 'index'])->name('widgets');

       Route::prefix('menu')
           ->name('menu.')
           ->group(function () {
               Route::get('/{selected_menu?}', [MenuController::class, 'index'])->name('index');
               Route::post('/create', [MenuController::class, 'create'])->name('create');
               Route::get('/edit', [MenuController::class, 'edit'])->name('edit');
               Route::delete('/delete', [MenuController::class, 'destroy'])->name('delete');
           });

       Route::prefix('products')
           ->name('products.')
           ->group(function () {
               Route::get('/', [ProductsController::class, 'index'])->name('index');
               Route::get('/create', [ProductsController::class, 'create'])->name('create');
               Route::post('/store', [ProductsController::class, 'store'])->name('store');
               Route::get('/show/{id}', [ProductsController::class, 'show'])->name('show');
               Route::get('/edit/{product}', [ProductsController::class, 'edit'])->name('edit');
               Route::put('/update', [ProductsController::class, 'update'])->name('update');
               Route::delete('/delete/{product}', [ProductsController::class, 'destroy'])->name('delete');
               Route::post('unique-slug', [ProductsController::class, 'uniqueSlug'])->name('unique-slug');
           });

       Route::prefix('categories')
           ->name('categories.')
           ->group(function () {
               Route::get('/', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('index');
               Route::post('/store', [\App\Http\Controllers\CategoriesController::class, 'store'])->name('store');
               Route::delete('/delete/{id}', [\App\Http\Controllers\CategoriesController::class, 'destroy'])->name('delete');
               Route::post('/unique-slug', [CategoriesController::class, 'uniqueSlug'])->name('unique-slug');
           });


       Route::prefix('collections')
           ->name('collections.')
           ->group(function () {
               Route::get('/', [CollectionsController::class, 'index'])->name('index');
               Route::post('/store', [CollectionsController::class, 'store'])->name('store');
               Route::delete('/delete/{id}', [CollectionsController::class, 'destroy'])->name('delete');
               Route::post('/unique-slug', [CollectionsController::class, 'uniqueSlug'])->name('unique-slug');
           });



       //Route::get('/collections', [ProductsController::class, 'index'])->name('collections');

       Route::post('upload-media', MediaController::class)->name('upload-media');
  });


Route::get('shop', [ShopController::class, 'index'])->name('shop');


Route::prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/{product:slug}', [ProductsController::class, 'singleProduct'])->name('product:slug');
    });


// customers
Route::prefix('customer')
    ->name('customer.')
    ->middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('/get', [AuthController::class, 'get'])->name('get-profile');
        Route::put('/profile', [AuthController::class, 'update'])->name('profile-update');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        /**
         * Customer wishlist routes.
         */
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('index');
        Route::post('/wishlist/{product:id}', [WishlistController::class, 'addOrRemove'])->name('wishlist.add-or-remove');
        Route::post('/wishlist/{product_id}/move-to-cart', [WishlistController::class, 'moveToCart'])->name('wishlist.move-to-cart');
    });


// customers
Route::prefix('customer')
    ->name('customer.')
    ->middleware(['web'])
    ->group(function () {

        /**
         * Add to cart.
         */
        Route::prefix('cart')
            ->name('cart.')
            ->group( function () {
                //Route::get('/', [CartController::class, 'cart'])->name('index');
                Route::post('/', [CartController::class, 'addToCart'])->name('add-to-cart');
                Route::delete('/remove-to-cart', [CartController::class, 'removeToCart'])->name('remove-to-cart');
            });
    });

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CheckoutsController::class, 'index'])->name('checkout');

require __DIR__.'/auth.php';
