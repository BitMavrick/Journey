<?php

use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DefaultController::class, 'index'])->name('index');
Route::get('/product', [DefaultController::class, 'product'])->name('product');
