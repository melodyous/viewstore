<?php

use App\Http\Controllers\HomeCategoryController;
use App\Http\Controllers\HomeOrderController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\PageController;
use App\Models\Category;
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

Route::get('/', [PageController::class, 'index'])->name('login')->middleware('guest'); // route halaman login
Route::get('/home', [PageController::class, 'home'])->middleware('auth'); // route halaman home
Route::get('/home/info', [PageController::class, 'info'])->middleware('auth'); // route halaman info


// route login
Route::post('/', [PageController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [PageController::class, 'logout']);


// resource CRUD products
Route::resource('/home/products', HomeProductController::class)->middleware('auth');

// resource CRUD orders
Route::resource('/home/orders', HomeOrderController::class)->middleware('auth');

// get data ajax
Route::get('/findProductName', [HomeOrderController::class, 'findProductName'])->middleware('auth');
Route::get('/findPrice', [HomeOrderController::class, 'findPrice'])->middleware('auth');

// resource CRUD user
Route::resource('/home/users', HomeUserController::class)->middleware('auth');

// resource CRUD category
Route::resource('/home/categories', HomeCategoryController::class)->middleware('auth');

