<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register/post', [AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/login/post', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/comment/{product_id}/{user_id}', [CommentController::class, 'addComment'])->name('addComment');

Route::get('/{product}', [HomeController::class, 'productDetail'])->name('detail');
