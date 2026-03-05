<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
});
Route::view('login', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class)->middleware('guest');
Route::get('logout', LogoutController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
