<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;



Route::get('/', [ProductController::class, 'index'])->name('Dashboard');
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistration'])->name('register.show');
    Route::post('/register/submit', [AuthController::class, 'submitRegistration'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/createPage', function () {
        return view('products.create');
    })->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('CreateProduk');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('UpdateProduk');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
