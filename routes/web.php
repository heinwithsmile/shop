<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ----------- Admin Routes -------------- */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('users', CustomerController::class);
    // Route::controller(ProductController::class)->group(function () {
    //     Route::get('/products', 'index');
    //     Route::get('/products/{id}', 'show');
    //     Route::post('/product', 'store');
    // });
    Route::resource('product', ProductController::class);
});