<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'landing'])
    ->name('landing');

Route::resource('products', ProductController::class)
    ->except(['show'])
    ->parameters('products', ProductController::class);




