<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProducCatetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::prefix('admin')->group(function () {
    Route::resource('product_cate', ProducCatetController::class);
    Route::resource('product', ProductController::class)->except(['show']);
});