<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::paginate(9);
    return view('index', compact('products'));
});

Route::get('index', function () {
    $products = Product::paginate(9);
    return view('index', compact('products'));
})->name('index')->middleware('guest');

Route::view('login', 'auth.login')->name('login')->middleware('guest');

Route::post('login', LoginController::class)->middleware('guest');
Route::get('logout', LogoutController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
