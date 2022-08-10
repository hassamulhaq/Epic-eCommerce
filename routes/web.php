<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\MenuController;

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
        Route::get('/', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::get('/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::get('/delete', [MenuController::class, 'delete'])->name('menu.delete');
    });
});


require __DIR__.'/auth.php';
