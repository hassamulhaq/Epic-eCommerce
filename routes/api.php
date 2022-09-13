<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')
    ->middleware('auth:sanctum')
    ->group(function () {
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
        Route::get('/types', [ProductsController::class, 'index'])->name('products.types');
        Route::get('/collections', [ProductsController::class, 'index'])->name('collections');
    });
