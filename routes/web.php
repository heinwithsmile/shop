<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

// Route::group(['prefix'=>'admin'],function () {
//     Route::get('/', [AdminController::class, 'index'])->name('index');
 
//     Route::get('/customer/profile', function () {
//         // Uses first & second middleware...
//     });
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::get('/admin', [AdminController::class, 'index']);