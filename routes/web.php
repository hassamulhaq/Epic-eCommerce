<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\ProductsController;

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
});

Route::get('/old/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('old.dashboard');




Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

Route::get('/dashboard-preview/', [DashboardController::class, 'preview'])->name('previewdashboard');

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'menu'], function () {
        Route::get('/{selected_menu?}', [MenuController::class, 'index'])->name('menu.index');
        Route::post('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::get('/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::delete('/delete', [MenuController::class, 'destroy'])->name('menu.delete');
    });
    Route::get('/widgets', [DashboardController::class, 'index'])->name('widget.index');

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductsController::class, 'create'])->name('product.create');
        Route::get('/store', [ProductsController::class, 'store'])->name('product.store');
        Route::get('/show/{id}', [ProductsController::class, 'show'])->name('product.show');
        Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('product.edit');
        Route::get('/update', [ProductsController::class, 'update'])->name('product.update');
        Route::get('/delete', [ProductsController::class, 'destroy'])->name('product.delete');

        Route::get('/categories', [ProductsController::class, 'index'])->name('products.categories');
        Route::get('/collections', [ProductsController::class, 'index'])->name('products.collections');
    });
});


require __DIR__.'/auth.php';
