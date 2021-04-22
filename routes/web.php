<?php

use App\Http\Controllers\CustomerController;
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

    Route::prefix('{id}')->group(function () {
        Route::get('/', [CustomerController::class, 'show'])
            ->name('customers.show');

        Route::put('/', [CustomerController::class, 'update'])
            ->name('customers.update');

        Route::delete('/', [CustomerController::class, 'destroy'])
            ->name('customers.destroy');
    });
});
