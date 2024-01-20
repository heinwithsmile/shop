<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/home', 'index');
    Route::get('/shop', 'shop');
});

/* ----------- Admin Routes -------------- */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
});