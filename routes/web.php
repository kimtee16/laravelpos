<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders', 'App\Http\Controllers\OrderController');
Route::resource('/products', 'App\Http\Controllers\ProductController');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/customers', 'App\Http\Controllers\CustomerController');
Route::resource('/transactions', 'App\Http\Controllers\TransactionController');