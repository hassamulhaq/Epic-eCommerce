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
               Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
               Route::put('/update', [ProductsController::class, 'update'])->name('update');
               Route::delete('/delete', [ProductsController::class, 'destroy'])->name('delete');
           });

       Route::get('/categories', [ProductsController::class, 'index'])->name('categories');
       Route::get('/collections', [ProductsController::class, 'index'])->name('collections');

       Route::post('upload-media')->name('upload-media');
  });


require __DIR__.'/auth.php';
