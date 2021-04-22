<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('customers')->group(function () {

    Route::get('/', [CustomerController::class, 'index'])
        ->name('customers.index');

    Route::post('/', [CustomerController::class, 'store'])
        ->name('customers.store');

    Route::get('/count', [CustomerController::class, 'count'])
        ->name('customers.count');

    Route::prefix('{id}')->group(function () {

        Route::get('/', [CustomerController::class, 'show'])
            ->name('customers.show');

        Route::put('/', [CustomerController::class, 'update'])
            ->name('customers.update');

        Route::delete('/', [CustomerController::class, 'destroy'])
            ->name('customers.destroy');
    });
});

Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');

    Route::post('/', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/count', [ProductController::class, 'count'])
        ->name('products.count');

    Route::prefix('{id}')->group(function () {

        Route::get('/', [ProductController::class, 'show'])
            ->name('products.show');

        Route::put('/', [ProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });
});
