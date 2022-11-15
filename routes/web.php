<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('cart', [OrderController::class, 'index']);
Route::post('cart/add',[OrderController::class, 'add']);
Route::post('cart/update',[OrderController::class, 'update']);
Route::get('cart/del/{id}',[OrderController::class, 'delete']);

Route::get('news', [ProductController::class, 'news']);
Route::get('intro', [NewsController::class, 'intro']);
Route::get('contact', [NewsController::class, 'contact']);

Route::get('login', [UserController::class, 'login'] );
Route::post('login', [UserController::class, 'postLogin'] );
Route::get('register', [UserController::class, 'register'] );
Route::post('register', [UserController::class, 'postRegister'] );

Route::post('comment/add', [CommentController::class, 'add']);
Route::post('comment/reply', [CommentController::class, 'reply']);
// Route::get('news/{news_alias?}', [NewsController::class, 'detail']);

Route::get('{cat_alias?}', [ProductController::class, 'category']);

// Route::get('san-pham/{product_alias?}', [ProductController::class, 'detail']);









