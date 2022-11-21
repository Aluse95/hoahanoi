<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsAdController;
use App\Http\Controllers\Admin\UserAdController;
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

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('product', [ProductsController::class, 'index'])->name('product');
    Route::get('product/add', [ProductsController::class, 'getAdd'])->name('product.add');
    Route::post('product/add', [ProductsController::class, 'postAdd']);
    Route::get('product/edit/{id}', [ProductsController::class, 'getEdit'])->name('product.edit');
    Route::post('product/edit/{id}', [ProductsController::class, 'postEdit']);
    Route::get('product/del/{id}', [ProductsController::class, 'del'])->name('product.del');
    Route::post('product/del', [ProductsController::class, 'multiDel']);

    Route::get('cat', [CatController::class, 'index'])->name('cat');
    Route::get('cat/add', [CatController::class, 'getAdd'])->name('cat.add');
    Route::post('cat/add', [CatController::class, 'postAdd']);
    Route::get('cat/edit/{id}', [CatController::class, 'getEdit'])->name('cat.edit');
    Route::post('cat/edit/{id}', [CatController::class, 'postEdit']);
    Route::get('cat/del/{id}', [CatController::class, 'del'])->name('cat.del');
    Route::post('cat/del', [CatController::class, 'multiDel']);

    Route::get('order', [OrdersController::class, 'index'])->name('order');
    Route::get('order/add', [OrdersController::class, 'getAdd'])->name('order.add');
    Route::post('order/add', [OrdersController::class, 'postAdd']);
    Route::get('order/edit/{id}', [OrdersController::class, 'getEdit'])->name('order.edit');
    Route::post('order/edit/{id}', [OrdersController::class, 'postEdit']);
    Route::get('order/del/{id}', [OrdersController::class, 'del'])->name('order.del');
    Route::post('order/del', [OrdersController::class, 'multiDel']);
    Route::get('order/complete', [OrdersController::class, 'complete']);

    Route::get('news', [NewsAdController::class, 'index'])->name('news');
    Route::get('news/add', [NewsAdController::class, 'getAdd'])->name('news.add');
    Route::post('news/add', [NewsAdController::class, 'postAdd']);
    Route::get('news/edit/{id}', [NewsAdController::class, 'getEdit'])->name('news.edit');
    Route::post('news/edit/{id}', [NewsAdController::class, 'postEdit']);
    Route::get('news/del/{id}', [NewsAdController::class, 'del'])->name('news.del');
    Route::post('news/del', [NewsAdController::class, 'multiDel']);

    Route::get('user', [UserAdController::class, 'index'])->name('user');
    Route::get('user/add', [UserAdController::class, 'getAdd'])->name('user.add');
    Route::post('user/add', [UserAdController::class, 'postAdd']);
    Route::get('user/edit/{id}', [UserAdController::class, 'getEdit'])->name('user.edit');
    Route::post('user/edit/{id}', [UserAdController::class, 'postEdit']);
    Route::get('user/del/{id}', [UserAdController::class, 'del'])->name('user.del');
    Route::post('user/del', [UserAdController::class, 'multiDel']);

    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/add', [AdminController::class, 'getAdd'])->name('admin.add');
    Route::post('admin/add', [AdminController::class, 'postAdd']);
    Route::get('admin/edit/{id}', [AdminController::class, 'getEdit'])->name('admin.edit');
    Route::post('admin/edit/{id}', [AdminController::class, 'postEdit']);
    Route::get('admin/del/{id}', [AdminController::class, 'del'])->name('admin.del');
});




