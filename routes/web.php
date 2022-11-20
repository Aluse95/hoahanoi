<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('cart', [OrderController::class, 'index']);
Route::post('cart/add',[OrderController::class, 'add']);
Route::post('cart/update',[OrderController::class, 'update']);
Route::get('cart/del/{id}',[OrderController::class, 'delete']);

Route::get('payment',[OrderController::class, 'detail']);
Route::post('payment',[OrderController::class, 'order']);
Route::get('discount',[OrderController::class, 'discount']);

Route::get('news', [ProductController::class, 'news']);
Route::get('intro', [NewsController::class, 'intro']);
Route::get('contact', [NewsController::class, 'contact']);

Route::get('login', [UserController::class, 'login'] );
Route::post('login', [UserController::class, 'postLogin'] );
Route::get('register', [UserController::class, 'register'] );
Route::post('register', [UserController::class, 'postRegister'] );

Route::post('comment/add', [CommentController::class, 'add']);
Route::post('comment/reply', [CommentController::class, 'reply']);

Route::get('search', [ProductController::class, 'search']);
// Route::get('news/{news_alias?}', [NewsController::class, 'detail']);

Route::get('{cat_alias?}', [ProductController::class, 'category']);

// Route::get('san-pham/{product_alias?}', [ProductController::class, 'detail']);

// Trang dành cho Admin

Route::prefix('admin')->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('admin.home');

    Route::get('product', [ProductsController::class, 'index'])->name('admin.product');
    Route::get('product/add', [ProductsController::class, 'getAdd'])->name('admin.product.add');
    Route::post('product/add', [ProductsController::class, 'postAdd']);
    Route::get('product/edit/{id}', [ProductsController::class, 'getEdit'])->name('admin.product.edit');
    Route::post('product/edit/{id}', [ProductsController::class, 'postEdit']);
    Route::get('product/del/{id}', [ProductsController::class, 'del'])->name('admin.product.del');
    Route::post('product/del', [ProductsController::class, 'multiDel']);

    Route::get('cat', [CatController::class, 'index'])->name('admin.cat');
    Route::get('cat/add', [CatController::class, 'getAdd'])->name('admin.cat.add');
    Route::post('cat/add', [CatController::class, 'postAdd']);
    Route::get('cat/edit/{id}', [CatController::class, 'getEdit'])->name('admin.cat.edit');
    Route::post('cat/edit/{id}', [CatController::class, 'postEdit']);
    Route::get('cat/del/{id}', [CatController::class, 'del'])->name('admin.cat.del');
    Route::post('cat/del', [CatController::class, 'multiDel']);
});




